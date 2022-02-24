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
          <h2>Please, try again, wrong username or password</h2>
          <form class="form-inline" action="includes/signin.php" method="post">
            <label for="text">Username:</label>
            <input type="text" placeholder="Enter Username" name="usrname">
            <label for="pwd">Password:</label>
            <input type="password" placeholder="Enter Password" name="pswd">
            <button type="submit" name="signin-submit">Login</button>
          </form>
        </div>
      </main>
  </body>
</html>
