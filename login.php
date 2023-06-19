<?PHP
    require_once 'database\conn.php';
    require_once 'database\function.php';

    if($connection -> connect_error){
        die("登入時資料庫連線失敗: " . $connection -> connect_error);
    }

    $userId = $_POST['userId'];
    $userPwd = $_POST['userPwd'];
    
    //check if user exist
    if(!if_user_exist($userId)){
        echo "<script>alert('使用者「'+'$userId'+'」不存在!');window.location.href='index.php';</script>";
    }

    //check if password correct
    if(!login($userId, $userPwd)){
        echo "<script>alert('密碼錯誤!');window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('登入成功!');window.location.href='./gameApp/app.php';</script>";
    }
?>