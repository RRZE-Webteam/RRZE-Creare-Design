jQuery(document).ready(function($)
{
    var col2 = $('#main').find('.ym-col2');
    var content = $('#main').find('.ym-col3');
    
    if ($('#mediaquery').width() <= '76') 
    {
        col1.before(content);
    }

    $(window).resize(function() 
    {
        if ($('#mediaquery').width() <= '76') 
        {
            col2.before(content);
        }
        else 
        {
            col2.after(content);
        }
    });

});
