<div id="wrapper" class="typo typo-selection">
    <?php foreach ($posts as $time => $list): ?>
        <h5><?php echo date('Y-m-d', $time); ?></h5>
        <ul>
            <?php foreach ($list as $post): ?>
                <li><?php echo $post->title ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>