<?php
/**
 * Custom template tags.
 *
 * @package _rrze
 */

if ( ! function_exists( '_rrze_search_form' ) ):
function _rrze_search_form($formclass = 'ym-searchform', $fieldclass = 'ym-searchfield', $buttonclass = 'ym-searchbutton') {
    $form = sprintf(
        '<form class="%s" role="search" method="get" id="searchform" action="%s" >
            <input class="%s" type="text" placeholder="%s" value="%s" name="s" id="s" />
            <input class="%s" type="submit" value="%s" />
        </form>', $formclass, esc_url(home_url('/')), $fieldclass, esc_attr__('Suchen...', '_rrze' ), get_search_query(), $buttonclass, esc_attr__('Suchen', '_rrze' ));
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