<article class="content">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="posts">
                    <?php foreach ($posts as $post): ?>
                        <?php include(__DIR__ . '/blocks/post-item.php'); ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</article>