<div id="day-<?php echo date('Ymd', $time); ?>" class="day day-1 day-container">
    <!-- day-1 为今天起第几天 -->
    <div class="day-title">
        <h4 class="day-date-title">今天</h4>
        <time class="day-time"><?php echo date('Y-m-d', $time); ?></time>
    </div>
    <div class="day-content">
        <ul class="posts">
            <?php foreach ($list as $post): ?>
                <li class="post-container">
                    <?php include(__DIR__ . '/post-item.php'); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="posts-more"><a href="#5">查看其余 x 个产品</a></div>
    <!-- 大于 10 条显示，x 替换成：总数 - 10，链接为显示所有链接 -->
    <div class="post-empty">
        <i class="empt-icon glyphicon glyphicon-link"></i>
        <span class="post-empty-text">没有内容</span>
    </div>
</div>