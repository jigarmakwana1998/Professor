<?php
class Admin
{

    public $conn;

    function __construct($db)
    {
        $this->conn = $db->Connect();
    }

    function checkAdmin($name, $password)
    {
        $sql = "SELECT * FROM `registered_users` WHERE user_name='$name' ;";
        $result = $this->conn->query($sql);
        // logic that return an array containing user info
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $user_instance = array(
                'user_name' => $row['user_name'],
                'password' => $row['password'],
            );
            return $user_instance;
        }
        else {
            return False;
        }
    }
}
