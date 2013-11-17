<?php
$page_title = "Shows &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';

$query_str = "SELECT artist, a.artist_id, show_date, time, venue, v.venue_id
FROM shows AS s
INNER JOIN artists AS a ON s.artist_id = a.artist_id
INNER JOIN venues AS v ON s.venue_id = v.venue_id
ORDER BY show_date ASC";

$result= @$conn->query($query_str);
//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else {
        
?>
<section>
</br></br>
<aside id="shows_aside">
    <img src="images/bobby.jpg">
</aside>
<article id="shows_article">
    <?php
 while (($result_row = $result->fetch_assoc()) !== NULL) {
     echo "<ul>";
     echo "<li id='date'>".$result_row['show_date']."</li><br />";
     echo "<li id='artist'><a href=artistdetails.php?id=".$result_row['artist_id'].">" . $result_row['artist'] . "</a></li>";
     echo "<li id='venue_name'><a href=venuedetails.php?id=".$result_row['venue_id'].">" . $result_row['venue'] . "</a></li>";
     if($result_row['time']!== NULL){
         echo "<li class='time'>".$result_row['time'];
     }else{
         echo "<li class='time'>No time available</li>";
     }
     echo "<li><a href='shoppingcart.php'><img src='images/ticket.png'></a></li>";
     echo "</ul>";
     echo "<br />";
             
 }
 $result->close();
}
$conn->close();
?>
    <br />
</article>

</section>
<?php
require 'includes/footer.php';
?>