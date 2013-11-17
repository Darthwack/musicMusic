<?php
$page_title = "Venues &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';

$query_str = "SELECT venue_id, venue, street, city, zip, website FROM venues ORDER BY venue ASC";

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
<section id="venue_section">
</br></br>

<aside id="venueAside">
<?php
        //insert a row into the table for each row of data
        while (($result_row = $result->fetch_assoc()) !== NULL) {
        echo "<div id='venue_set'>";
        echo "<h3 id='venue'><a href=venuedetails.php?id=".$result_row['venue_id'].">" . $result_row['venue'] . "</a></h3>";
        
        echo "<div id=''>" . $result_row['street'] . " " . $result_row['city'] . " " . $result_row['zip'] . "</div>";
        //echo "<div id=''>" . $result_row['map'] . "</div>";
        //echo "<div id=''>" . $result_row['website'] . "</a></div>";
        //echo "</br></br>";
        echo "</div>";
    }
?>    
</aside>



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