<?php
// 在此處從資料庫或其他儲存方式獲取留言

// 假設以簡單的HTML列表形式顯示留言

session_start();



if(isset($_POST['name']) && isset($_POST['message'])) {
  echo 'Message received!';
  $_SESSION['message'][] = [
    'name' => $_POST['name'],
    'message' => $_POST['message']
  ];
}

foreach ($_SESSION['message'] as $message) {
  echo '<p><strong>' . $message['name'] . '</strong>: ' . $message['message'] . '</p>';
}
?>