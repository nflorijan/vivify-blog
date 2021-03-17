<div class="row">
    <div class="col-sm-8 blog-main">
        <h5>Comments</h5>
        <?php
            $commentsSql = "SELECT * FROM comments WHERE comments.post_id = {$_GET['post_id']}";
            $comments = getDataFromDatabase($connection, $commentsSql);
        ?>
        <ul>
            <?php
            foreach ($comments as $comment) {
            ?>
            <li>
                <span>posted by: <strong><?php echo ($comment['author']) ?></strong> </span>
                <div>
                <?php echo ($comment['text']) ?>
                </div>
                <hr>
            </li>
            <!-- /.comment-post -->
            <?php
            }
            ?>
        </ul>
    </div>
</div>