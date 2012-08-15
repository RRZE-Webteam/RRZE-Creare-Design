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
    <?php if (have_posts()) : ?>

				
                
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'index'); ?>

                <?php endwhile; ?>

                <?php echo _rrze_pages_nav(); ?>
                
                <?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e('Nothing Found', '_rrze' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', '_rrze' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</article>

                <?php endif; ?>

    <hr id="vorfooter" />
</div>  <!-- end: content -->                       
</div>  <!-- end: main -->  

<?php get_footer(); ?>
