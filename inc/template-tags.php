<?php
/**
 * Custom template tags.
 *
 * @package _rrze
 */

if ( ! function_exists( '_rrze_search_form' ) ):
function _rrze_search_form( $formclass = 'ym-searchform', $fieldclass = 'ym-searchfield', $buttonclass = 'ym-searchbutton') {
    $form = sprintf(
        '<form class="%s" role="search" method="get" id="searchform" action="%s" >
            <input class="%s" type="search" placeholder="%s" value="%s" name="s" id="s" />
            <input class="%s" type="submit" value="%s" />
        </form>', $formclass, esc_url( home_url('/')), $fieldclass, esc_attr__('Suchen...', '_rrze' ), get_search_query(), $buttonclass, esc_attr__('Suchen', '_rrze' ));
    return $form;
}
endif; // _rrze_search_form

if ( ! function_exists( '_rrze_breadcrumb_nav' ) ):
function _rrze_breadcrumb_nav() {
    global $post;
    $list = '<p><img src="' .get_template_directory_uri().'/css/img/breadcrumbarrow.gif" alt=" " height="9" width="20"/>';
    if (!is_front_page()) {
        $list .= sprintf('<a href="%s">%s</a><span class="skip">.</span> <img src="' .get_template_directory_uri().'/css/img/breadcrumbarrow.gif" alt=" " height="9" width="20"/>', get_bloginfo('url'), __('Home', '_rrze' ));
        if (is_category()) {
            $list .= sprintf('%s %s', __('Category', '_rrze' ), single_cat_title('', false));
        } elseif (is_tag()) {
            $list .= sprintf('%s %s', __('Tag', '_rrze' ), single_cat_title('', false));
        } elseif (is_single()) {
            if (get_option('page_for_posts'))
                $list .= sprintf('<a href="%s">%s</a><span class="skip">.</span> <img src="' .get_template_directory_uri().'/css/img/breadcrumbarrow.gif" alt=" " height="9" width="20"/>', get_permalink(get_option('page_for_posts')), get_the_title(get_option('page_for_posts')));
            $list .= sprintf('%s', get_the_title($post->ID));
        } elseif (is_home() && get_option('page_for_posts')) {
            $list .= sprintf('%s', get_the_title(get_option('page_for_posts')));
        } elseif (is_page()) {
            if ($post->post_parent) {
                $home = get_page_by_title('home');
                for ($i = count($post->ancestors) - 1; $i >= 0; $i--) {
                    if (($home->ID) != ($post->ancestors[$i])) {
                        $list .= sprintf('<a href="%s">%s</a><span class="skip">.</span> <img src="' .get_template_directory_uri().'/css/img/breadcrumbarrow.gif" alt=" " height="9" width="20"/>', get_permalink($post->ancestors[$i]), get_the_title($post->ancestors[$i]));
                    }
                }
            }
            $list .= sprintf('%s', get_the_title($post->ID));
        } elseif (is_search()) {
            $list .= sprintf('%s', sprintf(__('Search Results for: %s', '_rrze' ), '<span>' . get_search_query() . '</span>'));
        }
    } else {
        $list .= sprintf('%s', __('Home', '_rrze' ));
    }
    $list .= '</p>';

    return $list;
}
endif; // _rrze_breadcrumb_nav

if ( ! function_exists( '_rrze_pages_nav' ) ):
    function _rrze_pages_nav() {
        global $wp_query;

        if ($wp_query->max_num_pages > 1) :
            ?>

            <nav id="nav-pages">
                <div class="ym-wbox">
                    <h3 class="ym-skip"><?php _e('Search results navigation', '_rrze' ); ?></h3>
                    <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Previous', '_rrze' )); ?></div>
                    <div class="nav-next"><?php previous_posts_link(__('Next <span class="meta-nav">&rarr;</span>', '_rrze' )); ?></div>
                </div>
            </nav>

        <?php
        endif;
    }
endif; // _rrze_pages_nav

if ( ! function_exists( '_rrze_posted_on' ) ):
    function _rrze_posted_on() {
        return sprintf(__('<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', '_rrze' ), 
                esc_url(get_permalink()), 
                esc_attr(get_the_time()), 
                esc_attr(get_the_date('c')), 
                esc_html(get_the_date()), 
                esc_url(get_author_posts_url(get_the_author_meta('ID'))), 
                esc_attr(sprintf(__('View all posts by %s', '_rrze' ), get_the_author())), 
                get_the_author()
        );
    }
endif; // _rrze_posted_on

if ( ! function_exists( '_rrze_main_nav_menu' ) ):
    function _rrze_main_nav_menu() {
        $args = array(
            'theme_location' => 'mainmenu',
            'menu' => __('Main Menu', '_rrze' ),
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => '',
            'menu_id' => 'hauptnavigation',
            'echo' => false,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => '');

        return wp_nav_menu($args);
    }
endif; // _rrze_main_nav_menu

if ( ! function_exists( '_rrze_general_nav_menu' ) ):
    function _rrze_general_nav_menu() {
        $args = array(
            'theme_location' => 'generalmenu',
            'menu' => __('General Menu', '_rrze' ),
            'container' => '',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => '',
            'menu_id' => '',
            'echo' => false,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 1,
            'walker' => '');

        return wp_nav_menu($args);
    }
endif; // _rrze_general_nav_menu

function _rrze_comment_form( $args = array(), $post_id = null ) {
	global $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<div class="comment-form-author ym-fbox-text">' . '<label for="author">' . __( 'Name', '_rrze' ) . ( $req ? '<span class="required-item">*</span>' : '' ) . '</label> ' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></div>',
		'email'  => '<div class="comment-form-email ym-fbox-text"><label for="email">' . __( 'E-Mail', '_rrze' ) . ( $req ? '<span class="required-item">*</span>' : '' ) . '</label> ' . 
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></div>',
		'url'    => '<div class="comment-form-url ym-fbox-text"><label for="url">' . __( 'Webauftritt', '_rrze' ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
	);

	$required_text = sprintf( ' ' . __( 'Erforderliche Felder sind %s markiert', '_rrze' ), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div class="comment-form-comment ym-fbox-text"><label for="comment">' . __( 'Kommentar', '_rrze' ) . '</label><textarea id="comment" name="comment" rows="8" aria-required="true"></textarea></div>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'Sie müssen <a href=\"%s\">angemeldet sein</ a>, um einen Kommentar abzugeben.', '_rrze' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Angemeldet als <a href=\"%1$s\">%2$s</ a>. <a href=\"%3$s\" title=\"Aus diesem account abmelden\">Abmelden?</ a>', '_rrze' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Ihre Email-Adresse wird nicht veröffentlicht.', '_rrze' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'Sie können die folgenden <abbr title=\"HyperText-Markup-Language\">HTML</abbr>-Tags benutzen: %s', '_rrze' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Kommentar hinterlassen', '_rrze' ),
		'title_reply_to'       => __( 'Kommentar an %s hinterlassen', '_rrze' ),
		'cancel_reply_link'    => __( 'Abbrechen', '_rrze' ),
		'label_submit'         => __( 'Kommentar verfassen', '_rrze' ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond">
				<h3 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="ym-form ym-full">
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php echo $args['comment_notes_after']; ?>
						<div class="form-submit ym-fbox-button">
							<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</div>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}
