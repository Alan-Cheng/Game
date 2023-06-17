<?PHP
    require_once 'database\function.php';

    //register form
    echo <<<_END
    <html>
        <head>
            <title>Form Test</title>
        </head>
        <body>
            <form method="post" action="register.php">
                請輸入帳號:
                <input type="text" name="userId" required>
                請輸入密碼:
                <input type="password" name="userPwd" required>
            <input type="submit">
            </form>
        </body>
    </html>
    _END;
    
    if(isset($_POST['userId']) && isset($_POST['userPwd'])){
        $userId = $_POST['userId'];
        $userPwd = $_POST['userPwd'];

        if(if_user_exist($userId)){
            echo "<script>alert('使用者「'+'$userId'+'」已存在!');window.location.href='register.php';</script>";

        }
        else{
            creat_user($userId, $userPwd);
            echo "<script>alert('使用者「'+'$userId'+'」註冊成功!');window.location.href='index.php';</script>";
        }
    }
?>