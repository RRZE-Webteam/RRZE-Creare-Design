<section class="ym-grid linearize-level-2">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-header">
            <h2>
                <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', '_rrze' ), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
            <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php echo _rrze_posted_on(); ?>
            </div>
            <?php endif; ?>               
        </div>
        <?php if (is_search()) : ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>
        <?php else : ?>
        <div class="entry-content">
            <?php the_content(__('More <span class="meta-nav">&rarr;</span>', '_rrze' )); ?>
            <?php wp_link_pages(array('before' => '<nav id="nav-pages"><div class="ym-wbox"><span>' . __('Pages:', '_rrze' ) . '</span>', 'after' => '</div></nav>')); ?>
        </div>
        <?php endif; ?>
    </article>
</section>
