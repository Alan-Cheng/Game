<?PHP
    session_start();

    if(!isset($_SESSION['userId'])){
        echo "<script>alert('請先登入!');window.location.href='../index.php';</script>";
    }
    else{
        echo "<script>alert('歡迎回來，{$_SESSION['userId']}');</script>";
        echo <<<_END
        <!DOCTYPE html>
        <html>
            <head>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
                <script src="app.js"></script>
                <link rel="stylesheet" href="style.css">
            </head>
                <body>
                    <div class="board">
                        <div class="cell" data-i="0"></div>
                        <div class="cell" data-i="1"></div>
                        <div class="cell" data-i="2"></div>
                        <div class="cell" data-i="3"></div>
                        <div class="cell" data-i="4"></div>
                        <div class="cell" data-i="5"></div>
                        <div class="cell" data-i="6"></div>
                        <div class="cell" data-i="7"></div>
                        <div class="cell" data-i="8"></div>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="msg">
                        <div class="player player1">
                            <div class="mark">&times;</div>
                            <div class="arrow arrow-r"></div>
                        </div>
                        <div class="player player2">
                            <div class="mark">&#9675;</div>
                            <div class="arrow arrow-l"></div>
                        </div>
                        <div class="ss">
                            Press any key to start new game.
                        </div>
                        <div class="ss">
                            <a href="../index.php">登出</a>
                        </div>
                    </div>
                </body>
        </html>
        _END;
        session_destroy();
    }

    // if (!isset($_SESSION['initiated']))
    // {
    // session_regenerate_id();
    // $_SESSION['initiated'] = 1;
    // }
    // if (!isset($_SESSION['count'])) $_SESSION['count'] = 0;
    // else ++$_SESSION['count'];
    // echo $_SESSION['count'];
    // echo ",".session_id();
?>