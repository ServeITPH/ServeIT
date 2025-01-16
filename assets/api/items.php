<?php
header("Content-Type: application/json");
include("../../sharedAssets/connect.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

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
    echo json_encode(['message' => 'Invalid request method']);
    break;
}

function handleGet($pdo)
{
  $sql = "SELECT * FROM items";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($result);
}

function handlePost($pdo, $input)
{
  $sql = "INSERT INTO items(userID, title, description, price, attachment, type, categoryID, shortDescription ) VALUES ( :userID , :title , :description , :price , :attachment , :type , :categoryID , :shortDescription )";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    'userID' => $input['userID'],
    'title' => $input['title'],
    'description' => $input['description'],
    'price' => $input['price'],
    'attachment' => $input['attachment'],
    'type' => $input['type'],
    'categoryID' => $input['categoryID'],
    'shortDescription' =>$input['shortDescription']


  ]);

  echo json_encode(['message' => 'User created successfully']);
}

function handlePut($pdo, $input)
{
  $sql = "UPDATE items 
            SET title = :title, description = :description, price = :price, 
                attachment = :attachment, type = :type, categoryID = :categoryID, shortDescription = :shortDescription,
            WHERE itemID = :itemID";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    'itemID' => $input['itemID'],
    'title' => $input['title'],
    'description' => $input['description'],
    'price' => $input['price'],
    'attachment' => $input['attachment'],
    'type' => $input['type'],
    'categoryID' => $input['categoryID'],
    'shortDescription' => $input['shortDescription']

  ]);
  echo json_encode(['message' => 'User updated successfully']);
}
function handleDelete($pdo, $input)
{
  $sql = "DELETE FROM items WHERE itemID = :itemID";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['itemID' => $input['itemID']]);
  echo json_encode(['message' => 'User deleted successfully']);
}
?>