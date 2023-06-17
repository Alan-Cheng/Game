<?PHP
    echo <<<_END
        <form  method='post' action='login.php'>
            <input type='text' name='userId' placeholder='請輸入ID' required>
            <input type='password' name='userPwd' placeholder='請輸入密碼' required>
            <input type='submit' name='登入' value='登入'>
        </form>
        <input type='button' name='註冊' value='註冊' onclick="location.href='register.php'">
    _END;
?>