<?php get_header(); ?>
<div class="ym-column linearize-level-1">
    <div class="ym-cbox">
        <h2 class="ym-skip"><a name="contentmark" id="contentmark"><?php _e('Main Content', '_rrze' ); ?></a></h2>
        <section class="ym-grid linearize-level-2">
            <article id="post-0" class="post error404 not-found">
                <header class="entry-header">
                    <h2 class="entry-title"><?php _e('Page not found', '_rrze' ); ?></h2>
                </header>

                <div class="entry-content">
                    <p><?php _e("It seems we can't find what you're looking for. Perhaps searching, or one of the links below, can help.", '_rrze' ); ?></p>

                    <?php get_search_form(); ?>

                    <?php
                    the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('before_title' => '<h4 class="widgettitle">', 'after_title' => '</h4>', 'widget_id' => '404'));
                    ?>

                    <div class="widget">
                        <h4 class="widgettitle"><?php _e('Most Used Categories', '_rrze' ); ?></h4>
                        <ul>
                            <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                        </ul>
                    </div>

                    <?php
                    the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1), array('before_title' => '<h4 class="widgettitle">', 'after_title' => sprintf('</h4><p>%s</p>', __('Try looking in the monthly archives.', '_rrze' ))));
                    ?>

                    <?php
                    the_widget('WP_Widget_Tag_Cloud', array(), array('before_title' => '<h4 class="widgettitle">', 'after_title' => '</h4>'));
                    ?>

                </div>
            </article>
        </section>
    </div>
</div>
<?php get_footer(); ?>