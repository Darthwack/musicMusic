<?php

$page_title = "Search Results &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';


if(isset($_GET['search'])){
    $table = $_GET['search'];

}else{
    echo "Please choose either Artist or Venue for your search";
   
    exit();
}
$search = $_GET['title_words'];
if($search == NULL){
   echo "Please enter a search";
   exit();
}else{
    $query_str = "SELECT * FROM $table WHERE ".substr($table, 0, -1)." LIKE '%$search%'";
}
$result = @$conn->query($query_str);
if (!$result) {
    
    $errno = $conn->errno;
    $errmsg = $conn->error;
     echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;    
}else{
    if($result->num_rows == 0){
        echo "Your Search \"$search\" did not match any $table in our inventory";
    }else{       
?>
<h2>Search Results</h2>
<section id="artist_section">
</br></br>

<aside id="artistAside">
<?php
if($table == "Artists"){
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
}else{
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
}
?>
</aside>

</br>

</section>

<?php
    }
}
$conn->close();
require_once 'includes/footer.php';
?>
