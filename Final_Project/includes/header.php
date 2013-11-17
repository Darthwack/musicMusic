<!DOCTYPE html>
<html>
<?php session_start() ?>    
    <!-- 
    This is a class project for school. No copyright infringement is intended. Only fair use for educational purposes.
    Kevin Grimley student at IUPUI 
    -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="Shortcut Icon" href="../images/favicon.png" type="image/x-icon" />
        <title><?php echo $page_title; ?></title>
        <link type="text/css" rel="stylesheet" href="includes/main.css" />
    </head>
    <body>
        <header>
            <img src="images/header.jpg" alt="Indy Music graphic" />
            
            <div id="test">
                
                
                <img id="shopping_cart" src="images/shopping_cart.png" />
                <br /><br />
                <form id="searchForm" action="searchresults.php" method="get">
                  <input type="text" name="title_words" id="searchBar" placeholder="Where Are You Headed?" size="30" />&nbsp;&nbsp;
                  <input type="submit" name="Submit" id="submit" value="Search" /><br />
                  <input type="radio" class="button" name="search" value="Artists" />Artist
                  <input type="radio" class="button" name="search" value="Venues" />Venue
                </form>
                <?php
                if (isset($_SESSION['username'])){
                    echo "Welcome 'username'";
                } 
                else {
                echo "<div id='login_links'>";
                     echo "<a href='login.php'>Login</a>&nbsp;&nbsp;";
                     echo "<a href='login.php'>Create Account</a>";
                echo "</div>";
                }
                 ?>
                <br />
                
             </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shows.php">Shows</a></li>
                    <li><a href="artists.php">Artists</a></li>
                    <li><a href="venues.php">Venues</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul></nav>
        </header>
