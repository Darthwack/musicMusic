<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="Shortcut Icon" href="../images/favicon.ico" />
        <title><?php echo $page_title; ?></title>
        <link type="text/css" rel="stylesheet" href="includes/main.css" />
    </head>
    <body>
        <header>
            <img src="images/header.jpg" alt="Indy Music graphic" />
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shows.php">Shows</a></li>
                    <li><a href="artists.php">Artists</a></li>
                    <li><a href="venues.php">Venues</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <img id="shopping_cart" src="images/shopping_cart.png" />
                <br /><br /><br />
                <form id="searchForm" action="searchresults.php" method="get">
                  <input type="text" name="title_words" id="searchBar" placeholder="Where Are You Headed?" size="30" />&nbsp;&nbsp;
                  <input type="radio" name="Artist" value="Artist" />Artist
                  <input type="radio" name="Venue" value="Venue" />Venue
                  <input type="submit" name="Submit" id="submit" value="Search" />
                </form>
                <a href="">Login</a>
            </nav> 
            
        </header>
