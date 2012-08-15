<?php if (!dynamic_sidebar('sidebar-right')): ?>
    <h4><?php _e('Meta', '_rrze' ); ?></h4>
    <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <?php wp_meta(); ?>
    </ul>
<?php endif; ?>
