<article class="content">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($posts): ?>
                    <ul class="posts">
                        <?php foreach ($posts as $post): ?>
                            <?php include(__DIR__ . '/blocks/post-item.php'); ?>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <div>
                        没有 <?php echo $keyword ?>
                        的搜索结果，<a href="/create?title=<?php echo urlencode($keyword) ?>">创建一个？</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>