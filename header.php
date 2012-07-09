<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>" />	
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
	<!--[if lte IE 8]>
		<script src="<?php bloginfo('stylesheet_directory');?>/js/iehacks.js"></script>
	<![endif]-->   
        <?php wp_head(); ?>
    </head>
    <body>
<div class="page_margins">  <!-- begin: page_margins --> 
    <div id="seite" class="page">  <!-- begin: seite -->
      <a name="seitenmarke" id="seitenmarke"></a>
      
        
        <header>
            <div id="kopf">  <!-- begin: kopf -->   
		  	<div id="logo">
				<p><a href="/"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></a></p>     
			</div>
			<div id="titel">	 	
        		<h1><?php the_title(); ?></h1> 
			</div>       
            
       
           <?php if(_rrze_get_theme_options('searchform_position') == 'top'):?>
        <div id="suche">
          <h2><a name="suche">Suche</a></h2>
                    <?php echo _rrze_search_form(); ?>           
            </div>
        <?php endif;?>
            
         <?php if (!is_404()): ?>
            <div id="breadcrumb">               
                    <h2><?php _e( 'You are here:', '_rrze' ); ?></h2>
                    
                         <?php echo _rrze_breadcrumb_nav(); ?>                                  
            </div>
        <?php endif; ?> 
                
                <div id="sprungmarken">
          <h2>Sprungmarken</h2>
          <ul>
	            <li class="first"><a href="#contentmarke"><?php _e('Go to Main Content', '_rrze'); ?></a><span class="skip">. </span></li>
				<li><a href="#bereichsmenumarke"><?php _e('Go to Main Menu', '_rrze'); ?></a><span class="skip">. </span></li>		
                                <li><a href="#siteinfomarke"><?php _e('Go to Site Information', '_rrze'); ?></a></li>
				<li class="last"><a href="#hilfemarke"><?php _e('Go to General Information', '_rrze'); ?></a><span class="skip">. </span></li>            
          </ul>
        </div>
                  
       <div id="hauptmenu">
          <h2 class="skip"><a name="hauptmenumarke" id="hauptmenumarke">Zielgruppennavigation</a></h2>
          
       </div>             
		</div></header>  <!-- end: kopf -->
            
      
                <hr id="nachkopf" />  
		<div id="main">  <!-- begin: main -->
      		<div id="menu">  <!-- begin: menu -->	  
		        <div id="bereichsmenu">            

                
<h2><a name="bereichsmenumarke" id="bereichsmenumarke"><?php _e('Main Menu', '_rrze'); ?></a></h2>
<ul id="navigation"> 
<li class="first"><a class="aktiv"  href="/index.php">Startseite</a><span class="skip">. </span>
                   <?php echo _rrze_main_nav_menu(); ?>
                    <?php if(_rrze_get_theme_options('searchform_position') == 'bottom'):?>
                    <?php echo _rrze_search_form(); ?>
                    <?php endif;?>

</li>		
</ul>

                        </div>     
        















