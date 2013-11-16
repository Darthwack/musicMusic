<?php
$page_title = "Artists &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';

$query_str = "SELECT artist_id, artist, image FROM artists ORDER BY artist ASC";

$result = $conn->query($query_str);

//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { //display results in a table
?>
<section id="artist_section">
</br></br>

<aside id="artistAside">
<?php
        //insert a row into the table for each row of data
        while (($result_row = $result->fetch_assoc()) !== NULL) {
        echo "<div id='image_set'>";
        if ($result_row['image']!== NULL){
           echo "<img class='artist_page_image' src='images/artists/".$result_row['image']."'><br> ";
        }
           else {
              echo "<img class='artist_page_image' src='images/band4.jpg'><br>";
           }
        echo "<div id='artist_line_item'><a href=artistdetails.php?id=".$result_row['artist_id'].">" . $result_row['artist'] . "</a></div>";
        echo "</div>";    
    }
?>    
</aside>

</br>

</section>
<?php
    // clean up resultsets when we're done with them!
    $result->close();
}

// close the connection.
$conn->close();
?>
<?php
require 'includes/footer.php';
?>