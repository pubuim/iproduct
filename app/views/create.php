<article class="content">
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <form action="?" method="POST">
                    <div class="form-group">
                        <label class="control-label" for="site-url">网址</label>
                        <input class="form-control" id="site-url" name="url" type="text" value="<?php echo query("url", "http://") ?>" data-component="" data-title-container="#site-title" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="site-title">标题</label>
                        <input class="form-control" id="site-title" name="title" type="text" value="<?php echo query("title") ?>"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="site-content">简介</label>
                        <textarea class="form-control" id="site-content" name="content" placeholder="产品介绍"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>