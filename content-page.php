<section class="ym-grid linearize-level-2">
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        <header class="entry-header">
        </header>
        
        <div class="entry-content">
            <?php the_content(__('More <span class="meta-nav">&rarr;</span>', '_rrze' )); ?>
            <?php wp_link_pages(array('before' => '<nav id="nav-pages"><div class="ym-wbox"><span>' . __('Pages:', '_rrze' ) . '</span>', 'after' => '</div></nav>')); ?>
        </div>
        
        <footer class="entry-meta">
            <div class="ym-wbox">
                <?php edit_post_link(__('Edit', '_rrze' ), '<span class="edit-link">', '</span>'); ?>
            </div>
        </footer>
        
    </article>
    
</section>