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
                <?php if (have_posts()) : ?>

				<header class="page-header">
					<h2 class="page-title"><?php printf(__('Search Results for: %s', Basistheme::domain()), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</header>
                
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'index'); ?>

                <?php endwhile; ?>

                <?php Basistheme::nav_pages(); ?>
                
                <?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e('Nothing Found', Basistheme::domain()); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', Basistheme::domain()); ?></p>
						<?php get_search_form(); ?>
					</div>
				</article>

                <?php endif; ?>

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
