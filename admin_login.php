<?php
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style.css">
 </head>
 <body>
   <div class="bg">
     <main>
       <div id="mdiv" class="container">
         <h2>Please enter administrator credentials</h2>
         <form class="form-inline" action="includes/signin-submit-admin.php" method="post">
           <label for="text">Username:</label>
           <input type="text" placeholder="Enter Username" name="usrname" required>
           <label for="pwd">Password:</label>
           <input type="password" placeholder="Enter Password" name="pswd" required>
           <button type="submit" name="signin-submit-admin">Login</button>
         </form>
       </div>
     </main>
 </body>
</html>
