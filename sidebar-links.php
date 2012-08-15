<h2 class="ym-skip">Kurzinfo</h2>
<?php if (!dynamic_sidebar('sidebar-left')): ?>
    <h4><?php _e('Meta', '_rrze' ); ?></h4>
    <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
    </ul>
<?php endif; ?>
