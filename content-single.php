<section class="ym-grid linearize-level-2">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
           
            <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <p><?php echo _rrze_posted_on(); ?></p>
                </div>
            <?php endif; ?>   
        </header>

        <div class="entry-content">
            <?php the_content(__('More <span class="meta-nav">&rarr;</span>', '_rrze' )); ?>
            <?php wp_link_pages(array('before' => '<nav id="nav-pages"><div class="ym-wbox"><span>' . __('Pages:', '_rrze' ) . '</span>', 'after' => '</div></nav>')); ?>
        </div>

        <footer class="entry-meta">
            <div class="ym-wbox">
              <p>  <?php
                $categories_list = get_the_category_list(', ');

                $tag_list = get_the_tag_list('', ', ');
                if ('' != $tag_list) {
                    $utility_text = __('This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. <br/>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '_rrze' );
                } elseif ('' != $categories_list) {
                    $utility_text = __('This entry was posted in %1$s by <a href="%6$s">%5$s</a>. <br/>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '_rrze' );
                } else {
                    $utility_text = __('This entry was posted by <a href="%6$s">%5$s</a>. <br/>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', '_rrze' );
                }

                printf($utility_text, $categories_list, $tag_list, esc_url(get_permalink()), the_title_attribute('echo=0'), get_the_author(), esc_url(get_author_posts_url(get_the_author_meta('ID'))));
                ?></p>
                <p class="edit"><?php edit_post_link(__('Edit', '_rrze' ), '<span class="edit-link">', '</span>'); ?></p>
            </div>
        </footer>

    </article>

</section>
