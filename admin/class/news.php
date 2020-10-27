<?php

class News
{
    public $id;
    public $title;
    public $image;
    public $conn;

    function __construct($db)
    {

        $this->id = NULL;
        $this->title = NULL;
        $this->conn = $db->Connect();
    }
    function Initialize($title)
    {
        $this->title = $title;
    }


    public function Submit()
    {
        $sql = "INSERT INTO `news` (`title`, `image`)
        VALUES (?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ss', $this->title, $this->image);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `news` WHERE id={$id};";
        $result = $this->conn->query($sql);
        // Execute the query
        return $result;
    }

    public function Update($id)
    {
        $sql = "UPDATE news SET title='$this->title', image='$this->image' WHERE id='$id'";
        $result = $this->conn->query($sql);
        // Execute the update statement
        echo mysqli_error($this->conn);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `news` ORDER BY id;";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            // Return 404 - not found
            return json_encode(array("message" => "No entry found."));
        } else {
            // Get the results in an array
            $users = array();

            while ($row = $result->fetch_assoc()) {
                $user_instance = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'image' => $row['image'],
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}
