<?php
$page_title = "Login &#124; IndyMusic.com";
require_once 'includes/header.php';
require_once 'includes/database.php';
?>

   <section>
       </br></br>
       <aside id="loginAside">
           <h2>Create Account</h2>
           <form action="newuserverify.php" method="POST">
               <label>First Name:</label><input type="text" name="first_name" />
               <label>Last Name:</label><input type="text" name="last_name" />
               <label>Email:</label><input type="email" name="email" />
               <label>Username:</label><input type="text" name="username" />
               <label>Password:</label><input type="text" name="password" />
               <label>Confirm Password:</label><input type="text" name="password" /><br /><br />
               <input type="submit" name="submit" value="Create" id="login_create" />
           </form>

       </aside>
            
       <article id="loginArticle">
           <h2>Login</h2>
           <form action="loginverify" method="POST">
                <label>Username:</label><input type='text' name='username' />
                <label>Password:</label><input type='password' name='password' /><br /><br />
                <input type='submit' name='submit' id='login_submit' value='Login' />
           </form>     

       </article>
       </br></br> <br />    
   </section>

<?php
require 'includes/footer.php';
?>