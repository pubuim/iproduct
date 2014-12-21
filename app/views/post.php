<article class="content content-post">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div id="post-<?php echo $post->id ?>" class="post">
                    <div class="post-item-header">
                        <div class="post-item-vote">
                            <a href="javascript:;" class="vote-up <?php echo $post->isDiggBy($login) ? 'active' : '' ?>" data-action-vote data-action-vote-id="<?php echo $post->id; ?>">
                                <!-- 登录链接 & 顶逻辑，已投票样式加上 active -->
                                <i class="vote-icon glyphicon glyphicon-chevron-up"></i>

                                <div class="vote-num" data-bind-vote-id="<?php echo $post->id; ?>"><?php echo $post->digg_count; ?></div>
                                <!-- 投票数 -->
                            </a>
                        </div>
                        <div class="post-item-main">
                            <div class="main-title">
                                <a href="<?php echo $post->permalink() . '/r'; ?>" target="_blank"><?php echo $post->title; ?></a>
                                <!-- 跳转页链接 -->
                            </div>
                            <div class="main-tagline description"><?php echo $post->content; ?></div>
                            <!-- 描述文本 -->
                        </div>
                    </div>
                    <div class="post-item-meta">
                        <div class="post-item-user"> <!-- 用户 -->
                            <img class="avatar" src="<?php echo $post->creator->avatar_url ?>" title="<?php echo $post->creator->bio ?>"/>
                            <span class="user-name"><?php echo $post->creator->name ?></span>
                        </div>
                        <div class="post-share"> <!-- 分享代码 -->

                        </div>
                    </div>
                    <div class="post-votes">
                        <?php $diggers = $post->diggers()->find_many(); ?>
                        <div class="post-section-title post-vote-title"><?php echo count($diggers); ?> 人赞过</div>
                        <ul class="votes">
                            <?php foreach ($diggers as $user): ?>
                                <li class="vote-item">
                                    <img class="avatar" src="<?php echo $user->avatar_url; ?>" title="<?php echo $user->name; ?>"/>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="post-comments">
                        <div class="post-section-title post-comment-title">X 条评论</div>
                        <div class="post-comment-box">
                            <textarea class="form-control" id="new-comment"></textarea>
                            <button type="button" class="btn btn-sm btn-submit" data-component="CreateComment" data-post-id="<?php echo $post->id ?>" data-content-container="#new-comment" data-comments-container=".comments">发布评论</button>
                        </div>
                        <div class="post-comment-container">
                            <?php $comments = $post->comments()->find_many(); ?>
                            <ul class="comments">
                                <?php foreach ($comments as $comment): ?>
                                    <?php include(__DIR__ . '/blocks/comment-item.php'); ?>
                                    <!--<ul class="child-comments">
                                        <?php /*include(__DIR__ . '/blocks/comment-item.php'); */?>
                                    </ul>-->
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-sm btn-loadmore" data-component="LoadMorePosts" data-posts-container="#posts-container" data-posts-start=".day-time:last">
                                加载更多
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>