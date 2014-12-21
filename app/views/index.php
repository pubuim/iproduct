<article class="content">
    <div class="wrapper">
        <div class="row">
            <div id="posts-container" class="col-lg-12">
                <?php foreach ($posts as $time => $list): ?>
                    <?php include(__DIR__ . '/blocks/post-day.php'); ?>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-12 text-center">
                <button type="button" class="btn btn-loadmore" data-component="LoadMorePosts" data-posts-container="#posts-container" data-posts-start=".day-time:last">
                    加载更多
                </button>
            </div>
        </div>
    </div>
</article>