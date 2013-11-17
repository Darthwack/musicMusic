<?php
/*
 *  
 */
require_once('includes/database.php');

$venue_id = $_GET['id'];


//select statement
$query_str = "SELECT * FROM venues WHERE venue_id=" . $venue_id;

$query = "SELECT artist, a.artist_id, show_date, time, venue, v.venue_id
FROM shows AS s
JOIN artists AS a ON s.artist_id = a.artist_id
JOIN venues AS v ON s.venue_id = v.venue_id
WHERE s.venue_id = '$venue_id'
ORDER BY show_date ASC";

//execut the query
$result = $conn->query($query_str);

$result_2 = $conn -> query($query);

//retrieve the results
$result_row = $result->fetch_assoc();
$venue = $result_row['venue'];
$page_title = "$venue &#124; IndyMusic.com";
require_once 'includes/header.php';

//retrieve the second results
//$result_row_2 = $result_2->fetch_assoc();

//Handle selection errors
if (!$result_2) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Damnit Jim I'm a doctor not a wing man";
    $conn->close();
    exit;
}else 
    {
echo "<section id='venuedetails_section'>";
echo "<br /><br />";

echo "<aside id='venue_details_aside'>";
echo "<h2>Upcoming Shows</h2>";
 while (($result_row_2 = $result_2->fetch_assoc()) !== NULL) {
     
     echo "<ul>";
     echo "<li id='date'>".$result_row_2['show_date']."</li><br />";
     echo "<li id='artist'><a href=artistdetails.php?id=".$result_row_2['artist_id'].">" . $result_row_2['artist'] . "</a></li>";
     
     if($result_row_2['time']!== NULL){
         echo "<li class='time'>".$result_row_2['time'];
     }else{
         echo "<li class='time'>No time available</li>";
     }
     echo "<li><a href='shoppingcart.php'><img src='images/ticket.png'></a></li>";
     echo "</ul>";
     echo "<br />";
             
 }
 echo "</aside>";
 $result_2->close();
}
//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Damnit Jim I'm a doctor not a wing man";
    $conn->close();
    exit;
} else { //display results 
    ?>

    </br></br>
    <article id="venueDetailsArticle">
       <h2><?php echo $result_row['venue'] ?></h2>
       <?php echo $result_row['street'] ." ". $result_row['city'] ." ". $result_row['zip'] ?>
       &nbsp;&nbsp;
       <a href="<?php echo $result_row['website'] ?>">Offical Website</a>
       </br></br>
       <?php echo $result_row['map'] ?>
    </article>
</section>
<?php
    // clean up resultsets when we're done with them!
    $result->close();
}


$conn->close();

//include the footer
require_once 'includes/footer.php';
?>