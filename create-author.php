<?php include('db.php')?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO author (first_name, last_name, gender) VALUES ('$first_name', '$last_name', '$gender')";
    insertIntoDB($connection, $sql);
    header('location: index.php');
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
            <form class="form" method="POST" action="create-author.php">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="first_name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="male">Male</label>
                    <input id="male" name="gender"  type="radio" value="Male">
                </div>
                <div class="form-group">
                    <label for="female">Female</label>
                    <input id="female" name="gender" type="radio" value="Female">
                </div>
                <button class="btn btn-primary">Create Author</button>
            </form>
        </div><!-- /.blog-main -->
        <?php include('template-parts/sidebar.php') ?>
        <!-- /.blog-sidebar -->
    </div><!-- /.row -->
</main><!-- /.container -->

<?php include('template-parts/footer.php') ?>
</body>
</html>