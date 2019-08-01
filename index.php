<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="style.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One|Raleway&display=swap" rel="stylesheet"> 
  <script src="https://kit.fontawesome.com/f5d4f570c2.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</head>
<body class="login">

  <div class='nav'>
        <?PHP 
          include('another_conn.php');
          $conn = OpenCon();

          if(isset($_SESSION['email'])){
            echo "
            <div class='subnav'>
            <i class='fas fa-icicles'></i>
            <a href='login.php'>Home</a>
            <p>Logged in as ".$_SESSION['email']. "</p>
            </div>
            <form action='' method='POST'>
            <input type='submit' name='logout' value='Logout' id='logout'>
              </form>";
          } else{
            echo "
            <div class='subnav'>
            <i class='fas fa-icicles'></i>
            <a href='login.php'>Login</a>
            </div>
            ";
          };
          ?> 
  </div>


  <div class="users">
  
  </div>

  <div class="login-box" id="create-box">
      <h3>Create a user</h3>
      <form action="process.php" method="POST" id="awesome-form">
        <input type="text" name="name" placeholder="name" id="name" required> <br>
        <input type="email" name="email" placeholder="email" id="email" required>
        <input type="password" name="password" placeholder="password" id="password" required>
        <p>Female: <input type="radio" name="gender" value="female" class="gender"> Male: <input type="radio" name="gender" class="gender" value="male"> </p>
        <input type="submit" name="submit" value="submit" id="submit">
      </form>
  </div>


  <script src="index.js"></script>

</body>
</html>