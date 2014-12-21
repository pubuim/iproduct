<article class="content content-post">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div id="post-<?php echo $post->id ?>" class="post">
                    <div class="post-item-vote">
                        <a href="javascript:;" class="vote-up" data-action-vote data-action-vote-id="<?php echo $post->id; ?>">  <!-- 登录链接 & 顶逻辑，已投票样式加上 active -->
                            <i class="vote-icon glyphicon glyphicon-chevron-up"></i>
                            <div class="vote-num" data-bind-vote-id="<?php echo $post->id; ?>"><?php echo $post->digg_count; ?></div>  <!-- 投票数 -->
                        </a>
                    </div>
                    <div class="post-item-main">
                        <div class="main-title">
                            <a href="<?php echo $post->url ?>" target="_blank"><?php echo $post->title; ?></a>  <!-- 跳转页链接 -->
                        </div>
                        <div class="main-tagline description"><?php echo $post->content; ?></div> <!-- 描述文本 -->
                    </div>
                </div>
                <div class="post-item-meta">
                    <div class="post-item-user"> <!-- 用户 -->
                        <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                        <span class="user-name">Yan Zhu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>