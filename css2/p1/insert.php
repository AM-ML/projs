<?php
      $stat = 0;

      include("conn.php");

      $data = json_decode(file_get_contents('php://input'));
      $title = $data -> title;
      $body = $data -> body;
      $author = $data -> author;

      $sql = "INSERT INTO blog
              (blogTitle, blogBody, blogAuthor)
              VALUES ('$title', '$body', '$author')
              ";

      if(mysqli_query($con, $sql))
            $stat = 1;

      echo json_encode($stat);

?>