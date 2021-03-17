<?php
include('db.php');
if (isset($_GET['post_id'])) {
  $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['post_id']}";
  $singlePost = getDataFromSinglePost($connection, $sql);
}

if (isset($_GET['post_id'])) {
    $sqlAuthorID = "SELECT author_id FROM posts WHERE posts.id = {$_GET['post_id']}";
    $getAuthorID = getDataFromSinglePost($connection, $sqlAuthorID);
    $sqlAuthor = "SELECT * FROM author WHERE author.id = $getAuthorID[author_id]";
    $getAuthor = getDataFromSinglePost($connection, $sqlAuthor);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlAuthor = "SELECT id FROM author;";
    $authors = getDataFromDatabase($connection, $sqlAuthor);
    
    $random_author = array_rand(array_map(function ($author) {
        return $author['id'];
    }, $authors), 1);

    if ($_POST['comment']) {
        $sql = "INSERT INTO comments (author_id, text, post_id) VALUES ({$authors[$random_author]['id']}, '{$_POST['comment']}', {$_GET['post_id']});";
        $statement = $connection->prepare($sql);
        $statement->execute();
        header("Location: single-post.php?post_id={$_GET['post_id']}");
    }
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
                <p class="blog-post-meta"><?php echo($singlePost['created_at']) ?> <a class="<?php if($getAuthor['gender'] === 'Male') { echo 'is-male'; } else if(($getAuthor['gender'] === 'Female')) { echo 'is-female';} ?>" href="#"> <?php echo ($getAuthor['first_name']) . ' ' . ($getAuthor['last_name'])?></a></p>

                <p> <?php echo($singlePost['body']) ?></p>
            </div>
            <?php include('template-parts/comments.php')?>
        </div><!-- /.blog-main -->
        <?php include('template-parts/sidebar.php') ?>
        <!-- /.blog-sidebar -->
    </div><!-- /.row -->
</main><!-- /.container -->
<?php include('template-parts/footer.php') ?>
</body>
</html>
