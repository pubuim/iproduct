<article class="content">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($posts as $time => $list): ?>
                    <div id="day-<?php echo date('Ymd', $time); ?>" class="day day-1 day-container">
                        <div class="day-title">
                            <h4 class="day-date-title">今天</h4>
                            <time class="day-day-title"><?php echo date('Y-m-d', $time); ?></time>
                        </div>
                        <div class="day-content">
                            <ul class="posts">
                                <?php foreach ($list as $post): ?>
                                    <li id="post-<?php echo $post->id ?>" class="post">
                                        <div class="post-item-vote">
                                            <a href="#3" class="vote-up active">
                                                <i class="vote-icon glyphicon glyphicon-chevron-up"></i>
                                                <div class="vote-num">123</div>
                                            </a>
                                        </div>
                                        <div class="post-item-meta">
                                            <div class="post-item-user">
                                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                                            </div>
                                            <div class="post-item-comments">
                                                <i class="comment-icon glyphicon glyphicon-comment"></i>
                                                <span>123</span>
                                            </div>
                                        </div>
                                        <div class="post-item-main">
                                            <div class="main-title">
                                                <a href="<?php echo $post->permalink() ?>"><?php echo $post->title ?></a>
                                            </div>
                                            <div class="main-tagline description">测试</div>
                                            <a href="#1" class="post-link"></a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="posts-more"><a href="#5">查看其余 x 个产品</a></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</article>