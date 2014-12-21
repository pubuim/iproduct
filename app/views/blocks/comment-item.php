<li class="comment-container" id="comment-<?php echo $comment->id; ?>">
    <div class="comment-item">
        <img class="avatar comment-avatar" src="<?php echo $comment->creator->avatar_url; ?>" title="<?php echo $comment->creator->name; ?>"/>

        <div class="comment-body">
            <div class="comment-user"><a href="#" target="_blank"><?php echo $comment->creator->name; ?></a><span class="comment-time">今天 刚刚</span>
            </div>
            <div class="comment-content"><?php echo $comment->content; ?></div>
            <div class="comment-action">
                <!--<a href="#">顶</a>-->
                <a href="#">回复</a>
            </div>
        </div>
    </div>
</li>