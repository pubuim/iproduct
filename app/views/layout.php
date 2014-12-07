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
    <?php echo $body; ?>
</body>
<script src="/vendor/jquery/dist/jquery.min.js"></script>
<script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
</html>