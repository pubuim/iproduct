<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <script>var config = <?php echo json_encode($config); ?></script>
</head>
<body role="document" class="page">
    <div id="page" class="theme-emeraild">
        <header class="header">
            <div class="wrapper">
                <div class="row">
                    <nav class="navbar col-lg-12" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-menu">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="/" class="brand pull-left">
                                <h1 class="site-title">iProduct</h1>
                                <h2 id="tagline" class="site-title tagline">Inspired by Product Hunt</h2>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="navbar-collapse-menu">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">关于</a></li>
                                <li class="dropdown hide">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">菜单 <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                                <li><a href="/create">提交</a></li>
                            </ul>
                        </div>
                        <form class="navbar-form navbar-right" role="search" action="/search">
                            <div class="form-group">
                                <input type="text" name="kw" class="form-control" placeholder="搜索">
                            </div>
                            <button type="submit" class="btn btn-default hide">Submit</button>
                        </form>
                    </nav>
                </div>
            </div>
        </header>
        <?php echo $body; ?>
    </div>
</body>
<script src="/vendor/jquery/dist/jquery.min.js"></script>
<script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
</html>