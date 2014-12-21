<?php $today = date('Y-m-d'); ?>
<div id="day-<?php echo $time; ?>" class="day day-1 day-container">
    <!-- day-1 为今天起第几天 -->
    <div class="day-title">
        <h4 class="day-date-title"><?php echo $today === $time ? '今天' : $time; ?></h4>
        <time class="day-time"><?php echo $time; ?></time>
    </div>
    <?php if ($list): ?>
        <div class="day-content">
            <ul class="posts">
                <?php foreach ($list as $post): ?>
                    <li class="post-container">
                        <?php include(__DIR__ . '/post-item.php'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php if (count($list) > 10): ?>
            <div class="posts-more"><a href="#5">查看其余 <?php echo count($list) - 10 ?> 个产品</a></div>
        <?php endif; ?>
        <!-- 大于 10 条显示，x 替换成：总数 - 10，链接为显示所有链接 -->
    <?php else: ?>
        <div class="post-empty">
            <i class="empt-icon glyphicon glyphicon-link"></i>
            <span class="post-empty-text">没有内容</span>
        </div>
    <?php endif; ?>
</div>