<?php
$page_title = "Contact &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $from = 'From: IndyMusic Contact Page'; 
    $to = 'indymusic@kgrimley.webege.com'; 
    $subject = 'IndyMusic Comment';
    
			
    $body = "First Name: $firstname\n Last Name: $lastname\n E-Mail: $email\n Message:\n $comment";

    echo '<section>';
    echo '</br></br>';
    echo '<article id="contact_verify">';
    if ($_POST['submit']) {				 
        if (mail ($to, $subject, $body, $from)) { 
	    echo '<p>Your message has been sent!</p>';
	} else { 
	    echo '<p>Something went wrong, go back and try again!</p>'; 
	} 
    }
    echo '</article>';
    echo '</section>';
require 'includes/footer.php';
?>