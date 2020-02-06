<?php
//DON'T FORGET TO COMMENT THESE 3 LINES OUT AT THE END OF THE PROJECT!!!!!
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if(!isset( $_SESSION ) ) session_start();

// print_r($_COOKIE);

//manages inclusion of all controller and model files

//create a constant variable to hold the path to the root directory 
define('APP_ROOT', substr(__DIR__, 0, strrpos(__DIR__, DIRECTORY_SEPARATOR)) );

//this will alter the app name
define('APP_NAME', 'SkySocial');

//set to false when you no longer need to debug!!!!
define('APP_DEBUG', false);


require_once(APP_ROOT . "/controllers/db.php");
require_once(APP_ROOT . "/controllers/util.php");

//Automatically include all files in the /models folder
spl_autoload_register(function($class){

    // $class = User
    //add any .php file extention with the class name to match, but must be lower case  
    $filename = strtolower($class) . '.php';

    //check if class file exists and is in model folder
    if( file_exists( APP_ROOT . '/models/' . $filename )){
        require_once( APP_ROOT . '/models/' . $filename );
    }
});

if(!empty($_COOKIE['user_logged_in'] ) ) {
    $_SESSION['user_logged_in'] = $_COOKIE['user_logged_in'];

}

if(!empty($_SESSION['user_logged_in'] ) ) {
    $user = new User;
    $current_user = $user->get_by_id( $_SESSION['user_logged_in'] );
    // print_r($current_user);
}
?>
 