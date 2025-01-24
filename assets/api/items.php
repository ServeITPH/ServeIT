<?php
header("Content-Type: application/json");
include("../../sharedAssets/connect.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

// FOR CHOOSING REQUEST METHOD
try {
  switch ($method) {
    case 'GET':
      handleGet($pdo);
      break;
    case 'POST':
      handlePost($pdo, $input);
      break;
    case 'PUT':
      handlePut($pdo, $input);
      break;
    case 'DELETE':
      handleDelete($pdo, $input);
      break;
    default:
      http_response_code(405); // Method Not Allowed
      echo json_encode(['message' => 'Invalid request method']);
      break;
  }
} catch (Exception $e) {
  http_response_code(500); // Internal Server Error
  echo json_encode(['error' => 'An unexpected error occurred.']);
  error_log($e->getMessage());
}

// CHECKS IF STRING MEETS REQUIREMENTS
function validateStringLength($string, $fieldName, $maxLength)
{
  // Allow empty strings as valid input for categoryName & shortDescription
  if (strlen(trim($string)) === 0) {
    return null;
  }
  // ERROR IF THE ENTERED VALUE IS NOT A STRING EXCEPT FOR price AND itemID
  if (!is_string($string) || strlen(trim($string)) === 0) {
    return "The {$fieldName} must be a valid string.";
  }
  // ERROR IF USER EXCEEDS CHARACTER LIMITS
  if (strlen($string) > $maxLength) {
    return "The {$fieldName} must not exceed {$maxLength} characters.";
  }
  return null;
}

// DATA VALIDATION FOR USERS
function validateInput($input, $requiredFields)
{
  foreach ($requiredFields as $field) {
    if (empty($input[$field])) {
      return "The field '{$field}' is required.";
    }
  }

  if (isset($input['price']) && !filter_var($input['price'], FILTER_VALIDATE_FLOAT)) {
    return "The price must be a valid number.";
  }

  if (isset($input['itemID']) && !filter_var($input['itemID'], FILTER_VALIDATE_INT)) {
    return "The ItemID must be a valid integer.";
  }

  if (isset($input['title'])) {
    $error = validateStringLength($input['title'], 'title', maxLength: 60);
    if ($error)
      return $error;
  }

  if (isset($input['description'])) {
    $error = validateStringLength($input['description'], 'description', 1500);
    if ($error)
      return $error;
  }

  if (isset($input['shortDescription'])) {
    $error = validateStringLength($input['shortDescription'], 'shortDescription', 200);
    if ($error)
      return $error;
  }

  if (isset($input['type'])) {
    $validTypes = ['product', 'service'];
    if (!in_array($input['type'], $validTypes)) {
      return "The type must be either 'product' or 'service'.";
    }
    $error = validateStringLength($input['type'], 'type', 7);
    if ($error)
      return $error;
  }

  if (isset($input['attachment'])) {
    $error = validateStringLength($input['attachment'], 'attachment', 100);
    if ($error)
      return $error;
  }

  if (isset($input['categoryName'])) {
    $error = validateStringLength($input['categoryName'], 'categoryName', 50);
    if ($error)
      return $error;
  }
  return null;
}

// FUNCTION FOR HANDLE GET
function handleGet($pdo)
{
  try {
    $sql = "SELECT * FROM items";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    http_response_code(200);
    echo json_encode($result);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch item(s).']);
    error_log($e->getMessage());
  }
}

// FUNCTION FOR HANDLE POST
function handlePost($pdo, $inputs)
{
  // MESSAGE FOR ERROR 400 (ERROR HANDLING)
  if ($inputs === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid or missing JSON input']);
    return;
  }

  // Check if inputs are empty or not an array
  if ($inputs === null || !is_array($inputs) || count($inputs) === 0) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Input cannot be empty. At least one item is required.']);
    return;
  }

  // REQUIRED FIELDS FOR HANDLE POST
  $requiredFields = ['title', 'description', 'price', 'attachment', 'type'];

  foreach ($inputs as $input) {
    $error = validateInput($input, $requiredFields);
    if ($error) {
      http_response_code(400); // Bad Request
      echo json_encode(['error' => $error]);
      return;
    }
  }

  try {
    $sql = "INSERT INTO items(title, description, price, attachment, type, categoryName, shortDescription) 
                VALUES (:title, :description, :price, :attachment, :type, :categoryName, :shortDescription)";

    foreach ($inputs as $input) {
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        'title' => htmlspecialchars($input['title']),
        'description' => htmlspecialchars($input['description']),
        'price' => $input['price'],
        'attachment' => htmlspecialchars($input['attachment']),
        'type' => htmlspecialchars($input['type']),
        'categoryName' => isset($input['categoryName']) ? htmlspecialchars($input['categoryName']) : null,
        'shortDescription' => isset($input['shortDescription']) ? htmlspecialchars($input['shortDescription']) : null
      ]);
    }
    http_response_code(201);
    echo json_encode(['message' => 'Item(s) created successfully']);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create item(s).']);
    error_log($e->getMessage());
  }
}


// FUNCTION FOR HANDLE PUT
function handlePut($pdo, $inputs)
{
  // MESSAGE FOR ERROR 400 (ERROR HANDLING)
  if ($inputs === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid or missing JSON input']);
    return;
  }

  // Check if inputs are empty or not an array
  if ($inputs === null || !is_array($inputs) || count($inputs) === 0) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Input cannot be empty. At least one item is required.']);
    return;
  }

  $requiredFields = ['itemID', 'title', 'description', 'price', 'attachment', 'type'];

  foreach ($inputs as $input) {
    $error = validateInput($input, $requiredFields);
    if ($error) {
      http_response_code(400); // Bad Request
      echo json_encode(['error' => $error]);
      return;
    }

    // CheckS if the itemID exists in the database before attempting to update it
    $sqlCheck = "SELECT COUNT(*) FROM items WHERE itemID = :itemID";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->execute(['itemID' => $input['itemID']]);
    $itemCount = $stmtCheck->fetchColumn();

    // If the item doesn't exist, return a 404 Not Found error 
    if ($itemCount == 0) {
      http_response_code(404);
      echo json_encode(['error' => "Item with ID {$input['itemID']} not found."]);
      return;
    }
  }

  try {
    $sql = "UPDATE items 
                 SET title = :title, description = :description, price = :price, 
                     attachment = :attachment, type = :type, categoryName = :categoryName, shortDescription = :shortDescription
                 WHERE itemID = :itemID";

    foreach ($inputs as $input) {
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        'itemID' => $input['itemID'],
        'title' => htmlspecialchars($input['title']),
        'description' => htmlspecialchars($input['description']),
        'price' => $input['price'],
        'attachment' => htmlspecialchars($input['attachment']),
        'type' => htmlspecialchars($input['type']),
        'categoryName' => isset($input['categoryName']) ? htmlspecialchars($input['categoryName']) : null,
        'shortDescription' => isset($input['shortDescription']) ? htmlspecialchars($input['shortDescription']) : null
      ]);
    }
    http_response_code(200);
    echo json_encode(['message' => 'Item(s) updated successfully']);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update item.']);
    error_log($e->getMessage());
  }
}

// FUNCTION FOR HANDLE DELETE
function handleDelete($pdo, $inputs)
{
  if ($inputs === null) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid or missing JSON input']);
    return;
  }
  // Check if inputs are empty or not an array
  if ($inputs === null || !is_array($inputs) || count($inputs) === 0) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Input cannot be empty. At least one item is required.']);
    return;
  }
  try {
    foreach ($inputs as $input) {
      // error for inputting json array
      if (empty((array)$input)) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Input must only be in array of itemID form.']);
        return;
      }
      // Check if the itemID exists in the database before attempting to delete it
      $sqlCheck = "SELECT COUNT(*) FROM items WHERE itemID = :itemID";
      $stmtCheck = $pdo->prepare($sqlCheck);
      $stmtCheck->execute(['itemID' => $input]);

      // Proceed with deletion if the item exists
      $sqlDelete = "DELETE FROM items WHERE itemID = :itemID";
      $stmtDelete = $pdo->prepare($sqlDelete);
      $stmtDelete->execute(['itemID' => $input]);
    }

    // Return success message after deletion
    echo json_encode(['message' => 'Items deleted successfully']);
  } catch (Exception $e) {
    // Return ERROR message FOR ERROR 500
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete items.']);
    error_log($e->getMessage());
  }
}

