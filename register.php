<?PHP
    require_once 'database\function.php';

    //register form
    echo <<<_END
    <!DOCTYPE html>
        <html>
            <head>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </head>
            <body>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                    <h1 class="text-center mb-4">註冊新帳戶</h1>
                        <form method="post" action="register.php">
                            <div class="mb-3">
                            <label for="username" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="username" name="userId" required>
                            </div>
                            <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="userPwd" required>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-success">註冊</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>        
        </body>
        </html>
       
    _END;
    
    if(isset($_POST['userId']) && isset($_POST['userPwd'])){
        $userId = $_POST['userId'];
        $userPwd = $_POST['userPwd'];
        $userPwd_hash = password_hash($userPwd, PASSWORD_DEFAULT);

        if(if_user_exist($userId)){
            echo "<script>alert('使用者「'+'$userId'+'」已存在!');window.location.href='register.php';</script>";

        }
        else{
            creat_user($userId, $userPwd_hash);
            echo "<script>alert('使用者「'+'$userId'+'」註冊成功!');window.location.href='index.php';</script>";
        }
    }
?>