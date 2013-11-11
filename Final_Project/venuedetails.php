<?php
/*
 *  
 */



require_once('includes/database.php');

$venue_id = $_GET['id'];


//select statement
$query_str = "SELECT * FROM venues WHERE venue_id=" . $venue_id;

//execut the query
$result = $conn->query($query_str);

//retrieve the results
$result_row = $result->fetch_assoc();
$venue = $result_row['venue_name'];
$page_title = "$venue &#124; IndyMusic.com";
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
    </br></br>
    <article id="venueDetailsArticle">
       <h2><?php echo $result_row['venue_name'] ?></h2>
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

// close the connection.
$conn->close();

//include the footer
require_once 'includes/footer.php';
?>
