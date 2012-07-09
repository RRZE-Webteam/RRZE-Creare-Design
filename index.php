<?php get_header(); ?>

    <?php $option = Basistheme::get_columnset_option();?>
    <div class="ym-column linearize-level-1">
        <?php if($option['value'] == '1-2-3' || $option['value'] == '1-2'):?>
        <div id="kurzinfo" class="ym-col1">
            <div class="ym-cbox">
                <?php get_sidebar('kurzinfo');?>
            </div>           
        </div>
        <?php endif;?>
        <div class="ym-col2">
            <div class="ym-cbox">
                <h2 class="ym-skip"><a name="contentmark" id="contentmark"><?php _e('Main Content', Basistheme::domain()); ?></a></h2>
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'index'); ?>

                <?php endwhile; ?>

                <?php Basistheme::nav_pages(); ?>
                
            </div>
        </div>
        <?php if($option['value'] == '1-2-3' || $option['value'] == '2-3'):?>
        <aside class="ym-col3">
            <div class="ym-cbox">
                <?php get_sidebar();?>
            </div>
        </aside>
        <?php endif;?>
    </div>

<?php get_footer(); ?>
