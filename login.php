<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="style.css" type="text/css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f5d4f570c2.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</head>
<body class="login">

  <div class="nav">
    <?PHP 
      include('another_conn.php');

      if(isset($_SESSION['email'])){
        echo "
        <div class='subnav'>
        <i class='fas fa-icicles'></i>
        <a href='posts.php'>View Posts</a>
        <p>Logged in as ".$_SESSION['email']. "</p>
        </div>
        <form action='' method='POST'>
        <input type='submit' name='logout' value='Logout' id='logout'>
      </form>";
        
      } else {
        echo "
        <div class='subnav'>
        <i class='fas fa-icicles'></i>
        <a href='index.php'>Join</a>
        </div>";
      };
      ?>
</div>
<div class="login-page">
    <h1>Fwitter</h1>
  <div class="login-box">
      <h3>Login to your account</h3>
      <form action="" method="POST" id="awesome-form">
        <input type="email" name="email" placeholder="email" id="email" require><br>
        <input type="password" name="password" placeholder="password" id="password" require> <br>
        <input type="submit" name="submit-login" value="submit" id="submit-login">
      </form>
  </div>

  <div class="login-box">
      <h5>Don't have an account?</h5>
    <h6>Create one <a href="index.php">HERE</a>
  </h6>
  </div>
</div>
<?PHP 
  $conn = OpenCon();
  
  if(isset($_POST['logout'])){
    session_destroy();
    header('Location: login.php');
  }
  if(isset($_POST['submit-login'])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      if($email != "" && $password != ""){
        
        // $query = "SELECT name, email FROM users WHERE name = '$name' AND email = '$email'";
        $sql = "SELECT COUNT(*) AS cnt FROM users WHERE email = '$email' AND password = '$password'";

        $response = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($response);
        // $count = mysqli_num_rows($response);
        $count = $row['cnt'];
        
        if($count > 0){
          $_SESSION['email'] = $email;
          
          echo 'Logged In';

          header("Location: posts.php"); 
        CloseCon($conn);

      } else{
        echo "No user with that information";

        
        CloseCon($conn);
      }

    } else {
      echo "Enter Username or Password";
    }
  }

  CloseCon($conn);
  

?>



  <script src="index.js"></script>

</body>
</html>