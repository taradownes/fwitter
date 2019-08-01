<?PHP 
    $post = $_POST['post'];
    $post_title = $_POST['title'];

    // include('another_conn.php');
    // $conn = OpenCon();

    $user = $_SESSION['email'];
    $sql = "SELECT id FROM users WHERE email = '$user'";

    $response = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($response);
    $result = $row['id'];
    echo "connection opened $post, $post_title, $result";

    $query = "INSERT INTO posts (post, time, post_id, user_id, post_title) VALUES(?, NOW(), NULL, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "sis", $post, $result, $post_title);

    mysqli_stmt_execute($stmt);

    $affected_rows = mysqli_stmt_affected_rows($stmt);

    if($affected_rows > 0){
      echo 'Data Entered';

      mysqli_stmt_close($stmt);

      CloseCon($conn);

    } else{
      echo "Error occured $affected_rows";

    mysqli_stmt_close($stmt);

    CloseCon($conn);

    }

 ?>
 