<?PHP
    session_start();
    session_destroy();
    echo <<<_END
    <!DOCTYPE html>
        <html>
            <head>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            </head>
            <body class>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                    <h1 class="text-center mb-4">登入</h1>
                        <form method='POST' action='login.php'>
                            <div class="mb-3">
                            <label for="username" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="username" name="userId" required>
                            </div>
                            <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="userPwd" required>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-success">登入</button>
                            </div>
                            <div class="text-center">
                            <button  class="btn btn-primary" name='註冊' value='註冊' onclick="location.href='register.php'">註冊</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>        
        </body>
        </html>
    _END;
?>