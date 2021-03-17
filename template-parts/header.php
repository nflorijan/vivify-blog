<?php
$url = $_SERVER['REQUEST_URI'];
$selected = 'active';
?>
<header>
    <div class="blog-masthead">
        <div class="container">
            <nav class="nav">
                <a class="nav-link <?php echo (strpos($url, 'index.php') !== false) ? $selected : '' ?>" href="./index.php">Home</a>
                <a class="nav-link <?php echo (strpos($url, 'create-post.php') !== false) ? $selected : '' ?>" href="./create-post.php">Create Post</a>
                <a class="nav-link <?php echo (strpos($url, 'create-author.php') !== false) ? $selected : '' ?>" href="./create-author.php">Create author</a>
                <a class="nav-link" href="#">Press</a>
                <a class="nav-link" href="#">New hires</a>
                <a class="nav-link" href="#">About</a>
            </nav>
        </div>
    </div>
    
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">The Bootstrap Blog</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
    </div>
</header>