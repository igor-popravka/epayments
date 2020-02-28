<?php
/**
 * @var array $styles
 * @var array $scripts
 * @var array $alerts
 * @var string $title
 * @var string $menu
 * @var string $content
 * @var string $footer
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test description">

    <title><?php echo $title; ?></title>

    <!-- Page styles -->
    <?php echo $styles; ?>

    <!-- Favicons -->
</head>
<body>
    <!-- Page menu -->
    <?php echo  $menu; ?>

    <main role="main">
        <!-- Page alerts -->
        <?php echo  $alerts; ?>

        <!-- Page content -->
        <?php echo  $content; ?>
    </main>
<footer class="container">
    <?php echo  $footer; ?>
</footer>
    <!-- Page scripts -->
    <?php echo  $scripts; ?>
</body>
</html>