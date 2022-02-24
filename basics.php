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
      <header>
        <div class="header">
          <div class="toprightcorner">
            <form class="form-inline" action="includes/signin.php" method="post">
              <label style="color: white;" for="text">Username:</label>
              <input type="text" placeholder="Enter Username" name="usrname" required>
              <label style="color: white;" for="pwd">Password:</label>
              <input type="password" placeholder="Enter Password" name="pswd" required>
              <button type="submit" name="signin-submit">Login</button>
            </form>
          </div>
        </div>
      </header>

      <main>
        <div id="mdiv" class="container" style="margin-top:37px;">
          <h2>Dont you have an account, already?</h2>
          <br/>
          <h2>Sign up</h2>
          <br/>
          <form action="includes/signup.php" method="post">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="***********" name="psw" required>
            <label for="repsw"><b>Re-type Password</b></label>
            <input type="password" placeholder="***********" name="repsw" required>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="example@domain.com" name="email" required>
            <button class="bottomrightcorner" type="submit" name="signup-submit">Signup</button>
          </form>
        </div>


          <div class="topleftcorner">

            <form class="form-inline" action="admin_login.php">
              <input style="padding: 10px 20px;
              background-color: #4CAF50;
              border: 1px solid #ddd;
              color: white;
              cursor: pointer; " type="submit" value="Press here to login as administrator"/>
            </form>
          </div>

      </main>

      <footer>

      </footer>

    </div>
  </body>
</html>
