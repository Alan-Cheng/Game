<?PHP
    require_once 'database\conn.php';
    require_once 'database\function.php';

    if($connection -> connect_error){
        die("登入時資料庫連線失敗: " . $connection -> connect_error);
    }
    
    //check if user exist
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userId = $_POST['userId'];
        $userPwd = $_POST['userPwd'];

        if(!if_user_exist($userId)){
            echo "<script>alert('使用者「'+'$userId'+'」不存在!');window.location.href='index.php';</script>";
        }

        //check if password correct
        if(!login($userId, $userPwd)){
            echo "<script>alert('密碼錯誤!');window.location.href='index.php';</script>";
        }
        else{
            session_start();
            $_SESSION['userId'] = $userId;
            session_id();
            echo "<script>window.location.href='./gameApp/app.php';</script>";
        }
    }
?>