<?php
header("Content-Type: application/json");
include("../../sharedAssets/connect.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

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

  return null;
}

function handleGet($pdo)
{
  try {
    $sql = "SELECT * FROM items";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch items.']);
    error_log($e->getMessage());
  }
}

function handlePost($pdo, $inputs)
{
  if ($inputs === null) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid or missing JSON input']);
    return;
  }

  $requiredFields = ['title', 'description', 'price', 'attachment', 'type', 'categoryName', 'shortDescription'];

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
        'categoryName' => htmlspecialchars($input['categoryName']),
        'shortDescription' => htmlspecialchars($input['shortDescription'])
      ]);
    }
    echo json_encode(['message' => 'Items created successfully']);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create items.']);
    error_log($e->getMessage());
  }
}

function handlePut($pdo, $inputs)
{
  if ($inputs === null) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid or missing JSON input']);
    return;
  }

  $requiredFields = ['itemID', 'title', 'description', 'price', 'attachment', 'type', 'categoryName', 'shortDescription'];

  foreach ($inputs as $input) {
    $error = validateInput($input, $requiredFields);
    if ($error) {
      http_response_code(400); // Bad Request
      echo json_encode(['error' => $error]);
      return;
    }


    // Check if the itemID exists in the database before attempting to delete it
    $sqlCheck = "SELECT COUNT(*) FROM items WHERE itemID = :itemID";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->execute(['itemID' => $input]);
    $itemCount = $stmtCheck->fetchColumn();

    if ($itemCount == 0) {
      // If the item doesn't exist, return a 404 Not Found error
      http_response_code(404); // Not Found
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
        'price' => $input['price'],  // Ensure valid price is passed here
        'attachment' => htmlspecialchars($input['attachment']),
        'type' => htmlspecialchars($input['type']),
        'categoryName' => htmlspecialchars($input['categoryName']),
        'shortDescription' => htmlspecialchars($input['shortDescription'])
      ]);
    }
    echo json_encode(['message' => 'Item updated successfully']);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update item.']);
    error_log($e->getMessage());
  }
}

function handleDelete($pdo, $inputs)
{
  if ($inputs === null) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid or missing JSON input']);
    return;
  }
  try {
    // Loop through each input itemID to handle deletion
    foreach ($inputs as $input) {
      // Check if the itemID exists in the database before attempting to delete it
      $sqlCheck = "SELECT COUNT(*) FROM items WHERE itemID = :itemID";
      $stmtCheck = $pdo->prepare($sqlCheck);
      $stmtCheck->execute(['itemID' => $input]);
      $itemCount = $stmtCheck->fetchColumn();

      if ($itemCount == 0) {
        // If the item doesn't exist, return a 404 Not Found error
        http_response_code(404); // Not Found
        echo json_encode(['error' => "Item with ID {$input} not found."]);
        return;
      }

      // Proceed with deletion if the item exists
      $sqlDelete = "DELETE FROM items WHERE itemID = :itemID";
      $stmtDelete = $pdo->prepare($sqlDelete);
      $stmtDelete->execute(['itemID' => $input]);
    }

    // Return success message after deletion
    echo json_encode(['message' => 'Items deleted successfully']);
  } catch (Exception $e) {
    // Catch any errors and return a 500 Internal Server Error response
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to delete items.']);
    error_log($e->getMessage()); // Log the error message for debugging purposes
  }
}

