<?PHP //會用到DB的function在此
    require_once 'conn.php';

    function creat_user($userId, $userPwd){
        global $connection;
        $query = "INSERT INTO users VALUES('$userId', '$userPwd')";
        $result = $connection -> query($query);
        if(!$result) die($connection -> error);
    }

    function if_user_exist($userId){
        global $connection;
        $query = "SELECT * FROM users WHERE userID = '$userId'";
        $result = $connection -> query($query);
        if(!$result) die($connection -> error);
        $rows = $result -> num_rows;
        if($rows == 0){
            return false;
        }else{
            return true;
        }
    }

    function login($userId, $userPwd){
        global $connection;
        $query = "SELECT userPwd FROM users WHERE userID = '$userId'";
        $result = $connection -> query($query);
        if(!$result) die($connection -> error);
        $rows = $result -> num_rows;
        if($rows == 0){
            return false;
        }
        else{
            if(password_verify($userPwd, $result -> fetch_assoc()['userPwd'])){
                return true;
            }
            else{
                return false;
            }
        }
    }