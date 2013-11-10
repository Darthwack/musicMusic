<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                </br></br></br>
                <form id="searchForm" action="searchbookresults.php" method="get">
                  <input type="text" name="title_words" id="searchBar" placeholder="Where Are You Headed?" size="30" />&nbsp;&nbsp;
                  <input type="submit" name="Submit" id="submit" value="Search" />
                </form>
            </nav>
            
        </header>
