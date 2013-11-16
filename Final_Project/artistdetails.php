<?php
/*
 *  
 */
require_once('includes/database.php');

$artist_id = $_GET['id'];


//select statement
$query_str = "SELECT * FROM artists WHERE artist_id=" . $artist_id;

//execut the query
$result = $conn->query($query_str);

//retrieve the results
$result_row = $result->fetch_assoc();
$artist = $result_row['artist'];
$page_title = "$artist &#124; IndyMusic.com";
require_once 'includes/header.php';
//Handle selection errors
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Damnit Jim I'm a doctor not a wing man";
    $conn->close();
    exit;
} else { //display results in a table
    ?>
<section id="venuedetails_section">
    <br /><br />
    <article id="venueDetailsArticle">
        <h2><?php echo $result_row['artist'] ?></h2>
       <div id="detail_group"><?php echo "<img class='artist_page_image' src='images/artists/".$result_row['image']."'><br>"  ?>
           &nbsp;&nbsp;&nbsp;&nbsp;
       <a href="<?php echo $result_row['website'] ?>">Offical Website</a></div>
       
       <p><?php echo $result_row['desc'] ?></p><br /><br />
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