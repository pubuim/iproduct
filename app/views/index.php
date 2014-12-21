<article class="content">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($posts as $time => $list): ?>
                    <?php include(__DIR__ . '/blocks/post-day.php'); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</article>