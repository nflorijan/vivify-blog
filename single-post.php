<?php
include('db.php');
if (isset($_GET['post_id'])) {
  $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['post_id']}";
  $singlePost = getDataFromSinglePost($connection, $sql);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_GET['post_id'];
  $content = $_POST['content'];
  $author = $_POST['author'];
  $sqlinsertComment = "INSERT INTO comments (text, author, post_id) VALUES ('$content', '$author', '$id')";
  insertIntoDB($connection, $sqlinsertComment);
  // header('location: single-post.php');
}
?>


<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>
<?php include('template-parts/header.php') ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo($singlePost['title']) ?></h2>
                <p class="blog-post-meta"><?php echo($singlePost['created_at']) ?> <a href="#"> <?php echo($singlePost['author']) ?></a></p>

                <p> <?php echo($singlePost['body']) ?></p>
            </div>
            <?php include('template-parts/comments.php')?>
            <form class="form" method="POST">
                <div class="form-group">
                    <label>Author</label>
                    <input class="form-control" type="text" name="author" required>
                </div>
                <div class="form-group">
                    <label>Leave your comment here:</label>
                    <textarea class="form-control" name="content" required></textarea>
                </div>
                <button class="btn btn-primary 10-bottom">Add comment</button>
            </form>
        </div><!-- /.blog-main -->
        <?php include('template-parts/sidebar.php') ?>
        <!-- /.blog-sidebar -->
    </div><!-- /.row -->
</main><!-- /.container -->
<?php include('template-parts/footer.php') ?>
</body>
</html>
