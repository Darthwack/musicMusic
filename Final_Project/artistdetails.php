<?php
/*
 *  
 */
require_once('includes/database.php');

$artist_id = $_GET['id'];


//select statement
$query_str = "SELECT * FROM artists WHERE artist_id= '$artist_id'";

$query = "SELECT a.artist_id, show_date, time, venue, v.venue_id
FROM shows AS s
INNER JOIN artists AS a ON s.artist_id = a.artist_id
INNER JOIN venues AS v ON s.venue_id = v.venue_id
WHERE a.artist_id= '$artist_id'
ORDER BY show_date ASC";


//execut the query
$result = $conn->query($query_str);

$result_2 = $conn -> query($query);

//retrieve the results
$result_row = $result->fetch_assoc();
$artist = $result_row['artist'];
$page_title = "$artist &#124; IndyMusic.com";
require_once 'includes/header.php';

//retrieve the second results
$result_row_2 = $result_2->fetch_assoc();

//Handle selection errors
if (!$result_2) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Damnit Jim I'm a doctor not a wing man";
    $conn->close();
    exit;
}else 
    {
echo "<section id='artistdetails_section'>";
echo "<br /><br />";

echo "<aside id='artist_details_aside'>";
echo "<h2>Upcoming Shows</h2>";
 while (($result_row_2 = $result_2->fetch_assoc()) !== NULL) {
     
     echo "<ul>";
     echo "<li id='date'>".$result_row_2['show_date']."</li><br />";
     
     echo "<li id='venue_name'><a href=venuedetails.php?id=".$result_row_2['venue_id'].">" . $result_row_2['venue'] . "</a></li>";
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
} else { //display results in a table
    ?>

    <br /><br />
    <article id="artistDetailsArticle">
        <h2><?php echo $result_row['artist'] ?></h2>
       <div id="detail_group"><?php if($result_row['image']== NULL){
           echo "<img class='artist_detail_image' src='images/band4.jpg'><br>";
           }
           else {
           echo "<img class='artist_detail_image' src='images/artists/".$result_row['image']."'><br>";
           }
           ?>
           &nbsp;&nbsp;&nbsp;&nbsp;
       <a href="<?php echo $result_row['website'] ?>">Offical Website</a></div>
       
       <p><?php if($result_row['desc'] !== NULL) {
           echo $result_row['desc'];
       }
       else {
           echo "<p>We're sorry but we do not currently have any information on
               this artist.</p>";
       }
?></p><br /><br />
    </article>
</section>
<?php
    // clean up resultsets when we're done with them!
    $result->close();
}

// close the connection.
$conn->close();

//include the footer
require_once 'includes/footer.php';
?>