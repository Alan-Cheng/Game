<?PHP
    session_start();

    if(!isset($_SESSION['userId'])){
        echo "<script>alert('請先登入!');window.location.href='../login.php';</script>";
    }

    echo "<script>alert('歡迎回來，{$_SESSION['userId']}');</script>";

    if (!isset($_SESSION['initiated']))
    {
    session_regenerate_id();
    $_SESSION['initiated'] = 1;
    }
    if (!isset($_SESSION['count'])) $_SESSION['count'] = 0;
    else ++$_SESSION['count'];
    echo $_SESSION['count'];
    echo ",".session_id();
?>