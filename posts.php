<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f5d4f570c2.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  </head>
  <body>
  
    <div class="nav">
        <?PHP 
          include('another_conn.php');
          $conn = OpenCon();

          if(isset($_SESSION['email'])){
            echo "
            <div class='subnav'>
            <i class='fas fa-icicles'></i>
            <a href='login.php'>Home</a>
            <p>Logged in as ".$_SESSION['email']. "</p>
            </div>";
          };
          ?> 
          <form action="" method="POST">
            <input type="submit" name="logout" value="Logout" id="logout">
          </form>
    </div>

    <div class="posts">
      <div class="heading">
        <h3>View all Posts</h3>
        <p id="add-post">Add Post<i class="fas fa-plus"></i></p>
      </div>
      <div class="create-post">
        <form action="create.php" method="POST">
          <input type="text" name="title" placeholder="Post Title" required>
          <textarea name="post" placeholder="Post Content" rows="10" id="post" maxlength="500" required></textarea>
          <input type="submit" name="submit-post" class="submit-post" value="Submit">
        </form>
      </div>
      <?PHP 
          // include('another_conn.php');
        if(!isset($_SESSION['email'])){
          header('Location: login.php');
        }
        if(isset($_POST['logout'])){
          session_destroy();
          header('Location: login.php');
        }

        $query = "SELECT p.post, date_format(p.time, '%M %D, %Y') AS time, p.post_title, p.post_id, u.name FROM posts p LEFT JOIN users u ON p.user_id = u.id ORDER BY time DESC";

        $response = @mysqli_query($conn, $query);

        if($response){

          while($post = mysqli_fetch_array($response)){
          echo "<div class='post' id='". $post['post_id'] ."'>
            <h4 class='post_title'>" . $post['post_title'] . "</h4>
            <p class='post'>" . $post['post'] . "</p>
            <p>" . $post['time'] . "</p>
            <p> Author: " . $post['name'] . "</p>
            <button class='delete' id='". $post['post_id'] ."'>Delete</button>
            <button class='update' name='update' 
            id='". $post['post_id'] ."'>Update</button>
            <div class='update-form' id='update".$post['post_id'] ."' ><form action='create.php' method='POST' ><input type='text' name='title' id='update-title' value='" .$post['post_title'] . "'required></input><textarea name='post' id='update-post' maxlength='500' required>". $post['post']."</textarea><input type='submit' name='submit-update' id='". $post['post_id'] ."' value='Submit' class='submit-post'> </form>
            </div>
            <hr>
          </div>";
          }
        } else {
          echo "cant get db";

          
        }
  
       
      

      
        CloseCon($conn);
      
      ?>
    </div>
    <script src="index.js"></script>
  </body>
</html>