<?php
$sql = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
$comments = getDataFromDatabase($connection, $sql);

if (isset($_GET['post_id'])) {
    $sqlAuthorID = "SELECT author_id FROM comments";
    $getAuthorID = getDataFromSinglePost($connection, $sqlAuthorID);
}
?>
<div>
    <h4>Comments:</h4>
    <ul class="comments-list">
        <?php foreach ($comments as  $comment) { ?>
            <?php
                $sqlCommentAuthor = "SELECT first_name, last_name, gender FROM author WHERE id = '{$comment['author_id']}'";
                $commentAuthor = getDataFromSinglePost($connection, $sqlCommentAuthor);
            ?>
            <li>
                <h5><?php echo ($commentAuthor['first_name']) . ' ' . ($commentAuthor['last_name']) ?></h5>
                <p><?php echo $comment['text'] ?></p>
            </li>
            <hr />
        <?php } ?>
    </ul>
    <h4>Leave a comment:</h4>
    <form class="form" action="single-post.php?post_id=<?php echo $_GET['post_id'] ?>" method="POST">
        <div class="form-group">
            <label for="post">Comment</label>
            <textarea name="comment" class="form-control" id="post" placeholder="Your comment..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>