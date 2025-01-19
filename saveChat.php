<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("sharedAssets/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = $_POST['message'];
    
    
    date_default_timezone_set('Asia/Manila');
    
    
    $dateAndTime = (new DateTime())->format('Y-m-d H:i:s'); 

    $loggedInUserID = $_SESSION['userID'];
    $loggedInUserRole = $_SESSION['role'];

    // Fetch the corresponding receiver's ID 
    if ($loggedInUserRole === 'user') {
        $senderID = $loggedInUserID;
        $stmt = $pdo->prepare("SELECT userID FROM users WHERE role = 'admin' LIMIT 1");
        $stmt->execute();
        $receiverID = $stmt->fetchColumn();
    } else if ($loggedInUserRole === 'admin') {
        $senderID = $loggedInUserID;
        $stmt = $pdo->prepare("SELECT userID FROM users WHERE role = 'user' LIMIT 1");
        $stmt->execute();
        $receiverID = $stmt->fetchColumn();
    } else {
        echo "<div class='p-3 text-danger'>Error: Invalid user role.</div>";
        exit;
    }

    
    if ($receiverID) {
        $stmt = $pdo->prepare("INSERT INTO chats (dateAndTime, senderID, receiverID, message, status, isRead) VALUES (?, ?, ?, ?, 'sent', 0)");
        $stmt->execute([$dateAndTime, $senderID, $receiverID, $message]);
        
        $formattedDate = (new DateTime($dateAndTime))->format('F j, Y, g:i A');
        echo "<div class='p-2'>{$message} <span class='text-muted' style='font-size: 0.8em;'><br>{$formattedDate} SENT</span></div>";
    } else {
        echo "<div class='p-3 text-danger'>Error: Receiver ID could not be determined.</div>";
    }
}
?>