<?php
$page_title = "Shows &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';

$query_str = "SELECT artist, a.artist_id, show_date, time, venue_name, v.venue_id 
    FROM shows AS s 
    JOIN artists AS a ON s.artist_id = a.artist_id 
    JOIN venues AS v ON s.venue_id = v.venue_id";

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
       <aside id="indexAside">
<?php
 while (($result_row = $result->fetch_assoc()) !== NULL) {
     echo "<ul>";
     echo "<li>".$result_row['show_date']."</li>";
     if($result_row['time']!== NULL){
         echo "<li>".$result_row['time'];
     }else{
         echo "<li>No time available</li>";
     }
     echo "<li><a href=artistdetails.php?id=".$result_row['artist_id'].">" . $result_row['artist'] . "</a></li>";
     echo "<li><a href=venuedetails.php?id=".$result_row['venue_id'].">" . $result_row['venue_name'] . "</a></li>";
     echo "</ul>";
             
 }
 $result->close();
}
$conn->close();
?>           
       </aside>
       
       <article id="indexArticle_1">
           
       </article>
       
       <article id="indexArticle_2">
           
       </article>
       </br></br> 
            
   </section>
        
<?php
require 'includes/footer.php';
?>