<?php



//defined the class of user
class User extends DB {

    public function get_all() {

        if (!empty($_GET['search'])) {
        $search_query = $this->params['search'];
        $search_query = str_replace('@', '', $search_query);
        $sql_where = "WHERE users.username LIKE '%$search_query%'
                      OR users.firstname LIKE '%$search_query%'
                      OR users.lastname LIKE '%$search_query%' ";

    } else {
        $sql_where = '';
    }

    $sql = "SELECT * FROM users $sql_where";
    $user_results = $this->select($sql);

    foreach($user_results as $key => $user) {
        $user_results[$key]['title'] = $user['firstname'] . " " . $user['lastname'];
    }

    return $user_results;
}


    //get user data from database by ID
    public function get_by_id($user_id) {
            $sql="SELECT * FROM users WHERE id = $user_id";
            $user = $this->select($sql)[0];

            return $user;
    }

    public function exists() {
        if(APP_DEBUG) echo 'execute_return_id()<br>';
        //check database to see if the user exists 
        $username = $this->data["username"];
        $email = $this->data["email"];

        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";

        $user = $this->select($sql);


        return $user;
    } 

    //adds the new user to the database
    //@returns int
    public function add() {
        if(APP_DEBUG) echo 'execute_return_id()<br>';

        $username = $this->data['username'];
        $email = $this->data['email'];
        $firstname = $this->data['firstname'];
        $lastname = $this->data['lastname'];
        $bio = $this->data['bio'];
        $password = password_hash(trim($_POST['password'] ), PASSWORD_DEFAULT );

        $sql = "INSERT INTO 
                        users (username, email, firstname, lastname, bio, password) 
                        VALUES ('$username', '$email', '$firstname', '$lastname', '$bio', '$password')";

        $new_user_id = $this->execute_return_id($sql);

        return $new_user_id;
    }

//edit the current user, @returns null
public function edit() {
    $id = (int)$_SESSION['user_logged_in'];
    $username = $this->data['username'];
    $firstname = $this->data['firstname'];
    $lastname = $this->data['lastname'];
    $password = password_hash(trim($_POST['password'] ), PASSWORD_DEFAULT );
    $password2 = password_hash(trim($_POST['password2'] ), PASSWORD_DEFAULT );
    $bio = $this->data['bio'];

    if( !empty($_FILES['fileToUpload']['name']) ) {

        $util = new Util;
        $file_upload = $util->file_upload();
        $filename = $file_upload['filename'];
        // print_r($file_upload);
        // exit;
        if($file_upload['file_upload_error_status'] == 0 ) {
             //get old image
            $old_profile_image = $this->get_by_id($id)['profile_pic'];
            // print_r($old_profile_image);
            // exit;
            $sql = "UPDATE users SET profile_pic = '$filename' WHERE id = $id";
            $this->execute($sql);


            //delete old image
            if(!empty($old_profile_image) ) {
                if(file_exists(APP_ROOT. "/views" . $old_profile_image) ) {
                    unlink(APP_ROOT. "/views" . $old_profile_image);
                }
            }
        }
    }



          
                
    if(empty($_POST['password'] ) ) {
        $sql = "UPDATE users 
        SET username = '$username', 
            firstname = '$firstname', 
            lastname = '$lastname', 
            bio = '$bio'
            WHERE id = $id ";
    } else {
        $sql = "UPDATE users 
        SET username = '$username', 
            firstname = '$firstname', 
            lastname = '$lastname', 
           
            bio = '$bio'";
            if($_POST['password'] != "" && $_POST['password2'] != "" && $_POST['password'] == $_POST['password2']){
                $sql .= ", password = '$password'";
            }
            $sql .= " WHERE id = $id ";
    } 
     
    $this->execute($sql);       
           
}

    //login()
    //logs in user, @returns null
    
    public function login() {
        $_SESSION = array(); //empties session to start fresh
        $username = $this->data['username'];
       $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username' LIMIT 1";

       $user = $this->select($sql)[0];

      if( password_verify($_POST['password'], $user['password'] ) ) {
        $_SESSION['user_logged_in'] = $user['id'];

        //if remember is set, set the cookie for user_logged_in
        if( !empty($_POST['remember'] ) ) {
                                                                //first number sets the days until cookie expires
            setcookie('user_logged_in', $user['id'], time() + (2 * 24 * 60 * 60), "/");
        }
      } else {
          $_SESSION['login_attempt_msg'] = "<p class='text-danger'>Incorrect username or password.</p>";
          
      }
    }
}


?>