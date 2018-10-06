<?php

  if(isset($_COOKIE['session_cookie'])) 
  {
      header("location:content.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <title>Login</title>
  </head>
  <body style="background: #D6EAF8">
    <h2 style="text-align: center; margin-top: 100px">CSRF Protection with Synchronizer Token Pattern Demo</h2>

      <form class="modal-content" style="margin: auto;" method="POST"> 
          <div class="container" style="margin-top:20px">
          <label for="username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>      
          <div style="text-align: center;">
            <button style="width:100px; background-color: #117A65; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;" type="submit" id="submit" name="submit">Login</button>
          </div> 
          <h5 style="text-align:center">Username:root&emsp;&ensp;Password:123</h5>
        </div>    
      </form>

  </body>
</html>

<?php
  if(isset($_POST['username'],$_POST['password']))
  {   
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'root' && $password == '123')
    {
     
      session_start();               
      setcookie("sessionCookie", session_id(), time() + (1000 * 60), "/");      
      $_SESSION['csrfToken'] = base64_encode(openssl_random_pseudo_bytes(32));      
      $csrfToken = $_SESSION['csrfToken']."," ;
      $sessionId = session_id();  
      $file = fopen("token.txt", "w") or die("Error");
      fwrite($file, $csrfToken);
      fwrite($file, $sessionId);
      fclose($file); 
      header("location: content.php");
    }
    else
    {
      echo "<script type='text/javascript'>alert('incorrect username or password')</script>";
    }
  }
?>
