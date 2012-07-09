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

                    <nav id="nav-single">
                        <div class="ym-wbox">
                        <h3 class="ym-skip"><?php _e('Post navigation', Basistheme::domain()); ?></h3>
                        <div class="nav-previous"><?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous', Basistheme::domain())); ?></div>
                        <div class="nav-next"><?php next_post_link('%link', __('Next <span class="meta-nav">&rarr;</span>', Basistheme::domain())); ?></div>
                        </div>
                    </nav>

                    <?php get_template_part('content', 'single'); ?>

                    <?php comments_template('', true); ?>

                <?php endwhile; ?>

            </div>
        </div>
        <?php if($option['value'] == '1-2-3' || $option['value'] == '2-3'):?>
        <aside class="ym-col3">
            <div class="ym-cbox">
                <?php get_sidebar(); ?>
            </div>
        </aside>
        <?php endif;?>
    </div>

<?php get_footer(); ?>
