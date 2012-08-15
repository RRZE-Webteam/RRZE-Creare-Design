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

        <?php get_template_part('content', 'page'); ?>

    <?php endwhile; ?>

    <hr id="vorfooter" />
</div>  <!-- end: content -->                       
</div>  <!-- end: main -->  

<?php get_footer(); ?>
