<?php if (!dynamic_sidebar('sidebar-3')): ?>
    <h4><?php _e('Meta', Basistheme::domain()); ?></h4>
    <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <?php wp_meta(); ?>
    </ul>
<?php endif; ?>
