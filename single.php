<?php get_header(); ?>

<div id="kurzinfo" >
    <h2 class="skip">Kurzinfo</h2> 
    <?php get_sidebar('links'); ?>

    <div class="infologo">
        <p>
            <a title="Zum Portal der Friedrich-Alexander-Universit&auml;t" href="http://www.uni-erlangen.de"><img src="http://www.vorlagen.fau.de/img/logos/fau/fau-logo-weissbg-180px.gif" width="180" height="50" alt="Friedrich-Alexander - Universit&auml;t Erlangen-N&uuml;rnberg" /></a>
        </p>
    </div>



</div>		
</div>  <!-- end: menu -->	 


<aside><div id="sidebar" class="noprint">  <!-- begin: sidebar -->    

        <h3 class="skip">Sidebar</h3>

        <?php get_sidebar('rechts'); ?>

    </div></aside>  <!-- end: sidebar -->   


<!-- CONTENT ****************************************************************** -->
<!-- ************************************************************************** -->
<div id="content">  <!-- begin: content -->
    <a name="contentmarke" id="contentmarke"></a>   
                <?php while (have_posts()) : the_post(); ?>

                    <nav id="nav-single">
                        <div class="ym-wbox">
                        <h3 class="ym-skip"><?php _e('Post navigation', '_rrze'); ?></h3>                       
                        <div class="nav-next"><?php next_post_link('%link', __('Next <span class="meta-nav">&rarr;</span>', '_rrze')); ?></div>
                        <div class="nav-previous"><?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous', '_rrze')); ?></div>
                        </div>
                    </nav>

                    <?php get_template_part('content', 'single'); ?>

                    <?php comments_template('', true); ?>

                <?php endwhile; ?>

     <hr id="vorfooter" />
</div>  <!-- end: content -->                       
</div>  <!-- end: main -->  

<?php get_footer(); ?>
