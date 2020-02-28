<?php
/** @var Page $page */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test description">

    <title><?php echo $page->title(); ?></title>

    <!-- Page styles -->
    <?php foreach ($page->style() as $style) : ?>
        <?php echo $style; ?>
    <?php endforeach; ?>

    <!-- Favicons -->
</head>
<body>
    <!-- Page menu -->
    <?php echo  $page->menu(); ?>

    <main role="main">
        <!-- Page alerts -->
        <div class="container">
            <?php foreach ($page->alert() as $alert) : ?>
                <?php echo $alert; ?>
            <?php endforeach; ?>
        </div>

        <!-- Page content -->
        <?php echo  $page->content(); ?>
    </main>
<footer class="container">
    <?php echo  $page->footer(); ?>
</footer>
    <!-- Page scripts -->
    <?php foreach ($page->script() as $script) : ?>
        <?php echo $script; ?>
    <?php endforeach; ?>
</body>
</html>