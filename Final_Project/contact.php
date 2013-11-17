<?php
$page_title = "Contact &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';
?>
        
   <section>
       </br></br>
       
       <article id="contactArticle">
           <form action="includes/contactform.php" method="post">
               <label>First Name:</label><input type="text" name="first_name" />
               <label>Last Name:</label><input type="text" name="last_name" />
               <label>Email:</label><input type="email" name="email" />
               <label>Username:</label><input type="text" name="username" />
               <label>Comment:</label><textarea rows="10" cols="40" name="comment"></textarea>
               <input type="submit" name="submit" value="send" id="contact_submit" />
           </form>
           
       </article>
       
       </br></br> 
            
   </section>
        
<?php
require 'includes/footer.php';
?>
