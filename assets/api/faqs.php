
<?php
header("Content-Type: application/json");
include("connect.php");

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
  $sql = "SELECT * FROM faqs";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($result);
}

function handlePost($pdo, $input)
{
  $sql = "INSERT INTO `faqs`(`question`, `answer`, `category`) VALUES ( :question , :answer , :category)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    'question' => $input['question'],
    'answer' => $input['answer'],
    'category' => $input['category']
  ]);

  echo json_encode(['message' => 'User created successfully']);
}

function handlePut($pdo, $input)
{
  $sql = "UPDATE faqs SET answer = :status WHERE faqsID = :id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(['answer' => $input['answer'], 'id' => $input['id']]);
  echo json_encode(['message' => 'User updated successfully']);
}

function handleDelete($pdo, $input)
{
  $sql = "DELETE FROM faqs WHERE faqsID = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $input['id']]);
  echo json_encode(['message' => 'User deleted successfully']);
}
?>
