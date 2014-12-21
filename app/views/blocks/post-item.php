<div id="post-<?php echo $post->id ?>" class="post"> <!-- 超过 10 条后加上 hidden-post-->
    <div class="post-item-vote">
        <a href="javascript:;" class="vote-up" data-action-vote data-action-vote-id="<?php echo $post->id; ?>">  <!-- 登录链接 & 顶逻辑，已投票样式加上 active -->
            <i class="vote-icon glyphicon glyphicon-chevron-up"></i>
            <div class="vote-num" data-bind-vote-id="<?php echo $post->id; ?>"><?php echo $post->digg_count; ?></div>  <!-- 投票数 -->
        </a>
    </div>
    <div class="post-item-meta">
        <div class="post-item-user">
            <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/> <!-- 用户 -->
        </div>
        <div class="post-item-comments">
            <i class="comment-icon glyphicon glyphicon-comment"></i>
            <span>123</span>  <!-- 评论数 -->
        </div>
    </div>
    <div class="post-item-main">
        <div class="main-title">
            <a href="<?php echo $post->url ?>" target="_blank"><?php echo $post->title; ?></a>  <!-- 跳转页链接 -->
        </div>
        <div class="main-tagline description"><?php echo $post->content; ?></div> <!-- 描述文本 -->
        <a href="<?php echo $post->permalink(); ?>" class="post-link"></a>
    </div>
</div>