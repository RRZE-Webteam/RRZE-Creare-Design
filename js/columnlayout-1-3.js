jQuery(document).ready(function($)
{
    var col1 = $('#main').find('.ym-col1');
    var content = $('#main').find('.ym-col3');
    
    if ($('#mediaquery').width() <= '76') 
    {
        col1.before(content);
    }

    $(window).resize(function() 
    {
        if ($('#mediaquery').width() <= '76')  
        {
            col1.before(content);
        }
        else 
        {
            col1.after(content);
        }
    });

});
