<?php
require("mysql_connect.php");
$username = $_POST['username'];
$query = "SELECT posts.title, posts.article, posts.added WHERE users.username = '$username' FROM posts JOIN users ON users.id = posts.users_id order by posts.added desc";
$result = mysqli_query($conn, $query);
$output = ['success' => false];
if(!empty(mysqli_num_rows($result))){
    $output = ['success' => true];
    while($row = mysqli_fetch_assoc($result)){
        $output['data'][]=$row;
//            printf('id:' . $row['id'] . ' ' . '<br>' . 'users_id: ' . $row['users_id'] . ' ' . '<br>' . 'title: ' . $row['title'] . ' ' . '<br>' . 'article: ' . $row['article'] . ' ' . '<br>' . 'added: ' . $row['added']);
//            echo '<br><br>';
    }
//    $output = json_encode($data);
//    print_r($data);
//    exit();
}
?>