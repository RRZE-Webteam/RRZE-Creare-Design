<footer>
    <div id="footer">  <!-- begin: footer -->
        <h2><a name="footermarke" id="footermarke">Informationen zur Seite</a></h2>
        <p class="last_modified">Letzte &Auml;nderung: 02.03.2012 um 09:18 Uhr</p>			
        <div id="footerinfos">  <!-- begin: footerinfos -->

            <div id="tecmenu">   <!-- begin: tecmenu -->	
                <h2 class="skip"><a name="hilfemarke" id="hilfemarke"><?php _e('General Information', '_rrze'); ?></a></h2>		     
                 <?php echo _rrze_general_nav_menu(); ?>

            </div>  <!-- end: tecmenu -->	

            <div id="zusatzinfo" class="noprint">  <!-- begin: zusatzinfo -->
                <a id="zusatzinfomarke" name="zusatzinfomarke"></a> 	
                <!--  	In dieser Box k&ouml;nnten hilfreiche Links oder sonstige Informationen stehen,  
                                welche auf jeder Seite eingeblendet werden sollen.  					
                                Diese Angaben werden bei der Ausgabe auf dem Drucker nicht mit ausgegeben!  			  			
                --> 
                
                
                
                                        <div class="ym-column">
                            <div class="ym-column linearize-level-1">

                                <aside class="ym-col1">
                                    <?php get_sidebar( 'footer-left' ); ?>
                                </aside>

                                <?php if( count( explode( '-', _rrze_theme_options( 'footer_layout' ) ) ) >= 2 ) : ?>
                                <aside class="ym-col2">
                                    <?php get_sidebar( 'footer-center' ); ?>
                                </aside>
                                
                                <?php endif;?>
                                
                                <?php if( count( explode( '-', _rrze_theme_options( 'footer_layout' ) ) ) >= 3 ) : ?> 
                                <aside class="ym-col3">
                                    <?php get_sidebar( 'footer-right' ); ?>
                                </aside>
                                
                                <?php endif; ?>
                            </div>
                        </div>                
            </div><!-- end: zusatzinfos -->
        </div> <!-- end: footerinfos -->	
    </div>   <!-- end: footer -->

</div>  <!-- end: seite -->
</div>  <!-- end: page_margins  -->


</footer>
<?php wp_footer(); ?>
</body>
</html>
