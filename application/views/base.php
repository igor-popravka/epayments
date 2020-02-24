<?php
/**
 * @var array $styles
 * @var array $scripts
 * @var string $title
 * @var string $navbar
 * @var string $jumbotron
 * @var string $container
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

    <!-- Template styles -->
    <?php foreach ($styles as $style): ?>
        <?php echo $style; ?>
    <?php endforeach; ?>

    <!-- Favicons -->

</head>
<body>

<?php echo  $navbar; ?>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php if (!empty($jumbotron)): ?>
        <?php echo $jumbotron; ?>
    <?php endif; ?>

    <!-- Main container -->
    <?php if (!empty($container)): ?>
        <?php echo $container; ?>
    <?php endif; ?>
</main>

<footer class="container">
    <?php if (!empty($footer)): ?>
        <?php echo $footer; ?>
    <?php endif; ?>
</footer>

<!-- Template scripts -->
<?php foreach ($scripts as $script): ?>
    <?php echo $script; ?>
<?php endforeach; ?>

</body>
</html>