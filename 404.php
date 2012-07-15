<?php get_header(); ?>
<div id="kurzinfo" >
    <h2 class="skip">Kurzinfo</h2> 
    <?php get_sidebar('kurzinfo'); ?>

    <div class="infologo">
        <p>
            <a title="Zum Portal der Friedrich-Alexander-Universit&auml;t" href="http://www.uni-erlangen.de"><img src="http://www.vorlagen.fau.de/img/logos/fau/fau-logo-weissbg-180px.gif" width="180" height="50" alt="Friedrich-Alexander - Universit&auml;t Erlangen-N&uuml;rnberg" /></a>
        </p>
    </div>



</div>		
</div>  <!-- end: menu -->	 


<aside><div id="sidebar" class="noprint">  <!-- begin: sidebar -->    

        <h3 class="skip">Sidebar</h3>

        <?php get_sidebar(); ?>

    </div></aside>  <!-- end: sidebar -->   


<!-- CONTENT ****************************************************************** -->
<!-- ************************************************************************** -->
<div id="content">  <!-- begin: content -->
    <a name="contentmarke" id="contentmarke"></a>
    
    
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
    
    
   <hr id="vorfooter" />
</div>  <!-- end: content -->                       
</div>  <!-- end: main -->  

<?php get_footer(); ?>
