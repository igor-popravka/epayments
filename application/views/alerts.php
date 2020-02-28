<?php /** @var array $alerts */ ?>
<div class="container">
    <?php foreach ($alerts as $alert) : ?>
        <?php echo HTML::block($alert, ['class' => 'alert alert-danger', 'role' => 'alert']); ?>
    <?php endforeach; ?>
</div>
