<?php

class DB {

    public $data = array();
    public $params = array();

    function __construct() {
        //Run as soon as DB class is called

        //store all our post $_POST data in the $data variable 
        if( !empty($_POST) ) {
            
            $conn = $this->conn();
            $escPost = array();
            foreach($_POST as $key => $value){
                $escPost[$key] = trim( mysqli_real_escape_string($conn, $value));
            }
            $conn->close();
            $this->data = $escPost;
        }
        
        //store all our post $_POST data in the $data variable 
        if( !empty($_GET) ) {
            
            $conn = $this->conn();
            $escGet = array();
            foreach($_GET as $key => $value){
                $escGet[$key] = trim( mysqli_real_escape_string($conn, $value));
            }
            $conn->close();
            $this->params = $escGet;
        }
    }

    protected function conn() {
       
        // Check Connection
     if ($_SERVER["SERVER_NAME"] == "dev.whelandesigns.com") {
        $servername = "localhost";
        $username = "projectshare";
        $password = "^kbsR293";
        $dbname = "projectshare";
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "projectshare";
}

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }

        return $conn;
    }

    //run a mysql select statment and return the results
    public function select($sql){
        if(APP_DEBUG) echo 'execute_return_id()<br>';
        $conn = $this->conn();
        $result = $conn->query($sql);

        //store xss cleaned data
        //xss = cross site scripting attack
        $xssArr = array();

        if($result->num_rows > 0) {

            $x = 0;

            while($row = $result->fetch_assoc() ) {
                //loop thorugh each column of the current row
                foreach($row as $column => $value){
                    $xssArr[$x][$column] = htmlspecialchars($value, ENT_QUOTES);
                }
                $x++;
            }
        }  else {
            if(APP_DEBUG)$_SESSION['errors'][] = "Error selecting from database: $sql";
        }

        $conn->close();
        return $xssArr;
    }

    public function execute($sql) {
        $conn = $this->conn();
        if($conn->query($sql) !== true ) {
            echo "Your statment: ". $sql . "<br> Error: " .$conn->error;
            die("Error with the SQL statment.");
        }
        $conn->close();
    }
   
    //execute_return_id
    //executes sql query and returns last inserted ID
    //@returns int
    public function execute_return_id($sql) {
        if(APP_DEBUG) echo 'execute_return_id()<br>';
        
        $conn = $this->conn();
        if($conn->query($sql) !== TRUE ){
            echo "Your statment: ". $sql . "<br> Error: " .$conn->error;
            die("Error with the SQL statment.");
        }
        $last_id = $conn->insert_id;

        $conn->close();

        return $last_id;

    }

}

?>