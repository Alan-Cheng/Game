<?PHP
    $dbhost = 'localhost';
    $dbname = 'test';
    $dbuser = 'root';
    $dbpwd = '';

    $connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

    //creat users table if not exist
    $query = "CREATE TABLE IF NOT EXISTS users(
        userID VARCHAR(32) NOT NULL UNIQUE,
        password VARCHAR(32) NOT NULL,
        PRIMARY KEY(userID)
    )";
    $result = $connection -> query($query);
    if(!$result) die($connection -> error);
?>