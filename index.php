<?php include('db.php')?>

<?php
    // $sql = "SELECT id, title,  author_id, DATE_FORMAT(created_at, '%e %b %Y') AS fmt_created_at FROM posts ORDER BY created_at DESC";
    $sql = "SELECT *, LEFT(body, 100) AS fmt_body, DATE_FORMAT(created_at, '%e %b, %Y') AS fmt_created_at, posts.id as post_id FROM posts JOIN author ON posts.author_id = author.id ORDER BY created_at DESC";
    $posts = getDataFromDatabase($connection, $sql);

   
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
        <?php
            foreach ($posts as $post) {
        ?>
            <div class="blog-post">
                <a href="single-post.php?post_id=<?php echo ($post['post_id']) ?>" class="blog-post-title"><?php echo($post['title']) ?></a>
                <p class="blog-post-meta"><?php echo($post['fmt_created_at']) ?><a class="<?php if($post['gender'] === 'Male') { echo 'is-male'; } else if(($post['gender'] === 'Female')) { echo 'is-female';} ?>" href="#"> <?php echo($post['first_name']) . ' ' . ($post['last_name']) ?></a></p>
                <p> <?php echo($post['fmt_body']) ?>...</p>
            </div><!-- /.blog-post -->
        <?php
            }    
        ?>   


            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <?php include('template-parts/sidebar.php') ?>
        <!-- /.blog-sidebar -->
    </div><!-- /.row -->
</main><!-- /.container -->

<?php include('template-parts/footer.php') ?>
</body>
</html>
