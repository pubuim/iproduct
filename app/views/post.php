<article class="content content-post">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div id="post-<?php echo $post->id ?>" class="post">
                    <div class="post-item-header">
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
                        <div class="post-share"> <!-- 分享代码 -->

                        </div>
                    </div>
                    <div class="post-votes">
                        <div class="post-section-title post-vote-title">X 人赞过</div>
                        <ul class="votes">
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                            <li class="vote-item">
                                <img id="user-123" class="avatar" src="/images/doge.png" title="User 123"/>
                            </li>
                        </ul>
                    </div>
                    <div class="post-comments">
                        <div class="post-section-title post-comment-title">X 条评论</div>
                        <div class="post-comment-box">
                            <textarea class="form-control"></textarea>
                            <button type="button" class="btn btn-sm btn-submit">发布评论</button>
                        </div>
                        <div class="post-comment-container">
                            <ul class="comments">
                                <li class="comment-container" id="comment-1">
                                    <div class="comment-item">
                                        <img class="avatar comment-avatar user-123" src="/images/doge.png" title="User 123"/>
                                        <div class="comment-body">
                                            <div class="comment-user"><a href="#" target="_blank">Yan Zhu</a><span class="comment-time">今天 刚刚</span></div>
                                            <div class="comment-content">测试测试</div>
                                            <div class="comment-action">
                                                <a href="#">顶</a>
                                                <a href="#">回复</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="child-comments">
                                        <li class="comment-container" id="comment-3">
                                            <div class="comment-item">
                                                <img class="avatar comment-avatar user-123" src="/images/doge.png" title="User 123"/>
                                                <div class="comment-body">
                                                    <div class="comment-user"><a href="#" target="_blank">Yan Zhu</a><span class="comment-time">12 月 13 日</span></div>
                                                    <div class="comment-content">测试测试评论</div>
                                                    <div class="comment-action">
                                                        <a href="#">顶</a>
                                                        <a href="#">回复</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="comment-container" id="comment-2">
                                    <div class="comment-item">
                                        <img class="avatar comment-avatar user-123" src="/images/doge.png" title="User 123"/>
                                        <div class="comment-body">
                                            <div class="comment-user"><a href="#" target="_blank">Yan Zhu</a><span class="comment-time">12 月 13 日</span></div>
                                            <div class="comment-content">测试测试评论</div>
                                            <div class="comment-action">
                                                <a href="#">顶</a>
                                                <a href="#">回复</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
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