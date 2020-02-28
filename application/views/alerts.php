<div class="container">
<?php
/**
 * @var array $alerts
 */
foreach ($alerts as $alert) {
    echo HTML::block($alert, ['class' => 'alert alert-danger', 'role' => 'alert']);
}
?>
</div>
