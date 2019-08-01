<?php
include('another_conn.php');
$conn = OpenCon();

$post = $_POST['post'];
$title = $_POST['title'];
$id = $_POST['id'];

$query = "UPDATE posts SET post = ?, post_title = ? WHERE post_id = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "ssi", $post, $title, $id);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

CloseCon($conn);

?>