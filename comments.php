<div id="comments">
    <?php if (post_password_required()) : ?>
        <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', '_rrze' ); ?></p>
    </div>
    <?php
    return;
endif;
?>

<?php if (have_comments()) : ?>
    <h3 id="comments-title">
        <?php printf(_n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), '_rrze' ), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?>
    </h3>

    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <nav id="nav-comments">
            <div class="ym-wbox">
                <h3 class="ym-skip"><?php _e('Comments navigation', '_rrze' ); ?></h3>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', '_rrze' )); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', '_rrze' )); ?></div>
            </div>
        </nav>
    <?php endif; ?>

<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <p class="nocomments"><?php _e('Comments are closed.', '_rrze' ); ?></p>
<?php endif; ?>

<?php comment_form(); ?>
</div>