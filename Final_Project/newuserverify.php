<?php

/**
 * Author: Kevin Grimley
 * Description: This script creates a new user in the database.
 */
//Set page title
$page_title = "New Account &#124; IndyMusic.com";

//Retrieve the action from the login.php page
$action = $_POST['action'];

//Create a new user
if ($action == "Create") {
    //include code from header.php and database.php
    require_once ('includes/header.php');
    require_once('includes/database.php');
	
    //add your PHP code which retrieves book information from the form in the addbookform.php page.
    $first_name = trim($_POST ['first_name']);
    $last_name = trim($_POST ['last_name']);        
    $email = trim($_POST ['email']);       
    $username = trim($_POST ['username']);
    $password = trim($_POST ['password']);   
    
    //add your PHP code which writes book information into the books table in the database.
    $fields = array('$first_name', '$last_name', '$email', '$username', '$password');
    
    if(empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password)) {
        echo "<h2>User Account</h2>";
        echo "<p>Account was not created. All information must be completed. Please try again.</p>";
        //add the page footer from the footer.php file.
        include ('includes/footer.php');
        exit();
    }
    else {
    $query = "INSERT INTO books VALUES (NULL, '$first_name', '$last_name', '$email', '$username', '$password')";
    
    $result = @$conn -> query($query);
    
    if(!$result) {
        $errno = $conn -> errno;
        $errmsg = $conn -> error;
        echo"Insertion failed with: $errno $errmsg<br/>\n";
        $conn -> close();
        exit;
    }
    echo "<h2>User Account</h2>";
    echo "<p>Congratulations!! You just joined up with the best way to stay current on<br />
          all the greatest live music in Indianapolis.</p>";
    }
	
    //close database connection
    $conn->close();
	
    //add the page footer from the footer.php file.
    include ('includes/footer.php');
}
?>