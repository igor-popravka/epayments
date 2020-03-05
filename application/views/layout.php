<?php
/** @var Page $page */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test description">

    <title><?php echo $page->title()->render(); ?></title>

    <!-- Page styles -->
    <?php foreach ($page->style() as $style) : ?>
        <?php echo $style; ?>
    <?php endforeach; ?>

    <!-- Favicons -->
</head>
<body>
    <!-- Page menu -->
    <?php echo  $page->menu()->render(); ?>

    <main role="main">
        <!-- Page alerts -->
        <?php if($alerts = $page->alert()): ?>
            <div class="container mt-3">
                <?php foreach ($alerts as $alert) : ?>
                    <?php echo $alert; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Page content -->
        <?php echo  $page->content()->render(); ?>
    </main>
<footer class="container">
    <?php echo  $page->footer()->render(); ?>
</footer>
    <!-- Page scripts -->
    <?php foreach ($page->script() as $script) : ?>
        <?php echo $script; ?>
    <?php endforeach; ?>
</body>
</html>