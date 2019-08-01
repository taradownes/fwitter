<?PHP 

$id = $_POST["id"];
echo " The id $id " ;

include('another_conn.php');
$conn = OpenCon();

$del = "DELETE FROM posts WHERE post_id =$id";

$response = @mysqli_query($conn, $del);

if($response){
  echo "Post was deleted";
} else{
  echo "Post could not be deleted, $del";
  echo mysqli_error();

}

CloseCon($conn);


?>