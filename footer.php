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
                <h3><?php _e('Site Information', '_rrze'); ?></h3>

                <p><?php _e('This area is intended for additional information.', '_rrze'); ?></p>
                <p><?php _e('Here could be helpful links and other information, which will be displayed on each page. This information will not be on the printer output with!', '_rrze'); ?></p>
                <p class="skip"><a href="#seitenmarke"><?php _e('Back to Top', '_rrze'); ?></a></p>
            </div><!-- end: zusatzinfos -->
        </div> <!-- end: footerinfos -->	
    </div>   <!-- end: footer -->

</div>  <!-- end: seite -->
</div>  <!-- end: page_margins  -->


</footer>
<?php wp_footer(); ?>
</body>
</html>
