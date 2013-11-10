<?php
$page_title = "Artists &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';

$query_str = "SELECT * FROM $tblArtists";

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
        
   <section>
       </br></br>
       <aside id="indexAside">
           <?php
        //insert a row into the table for each row of data
        while (($result_row = $result->fetch_assoc()) !== NULL) {
            echo "<ul>";
            echo "<li><a href=artistdetails.php?id=".$result_row['artist_id'].">" . $result_row['artist'] . "</a></h2>";
            if ($result_row['image']!== NULL){
            echo "<br><img src='images/artists/".$result_row['image']."'> ";
            }
           // echo "<li><a href='" . $result_row['website'] ."'>".$result_row['website']."</a</li>";
            echo "</ul>";
  
    }
?>
           
       </aside>
       
       <article id="indexArticle_1">
           
       </article>
       
       <article id="indexArticle_2">
           
       </article>
       </br></br> 
            
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