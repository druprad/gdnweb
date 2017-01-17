jQuery(document).ready(function($) {
    /* Counter */
    showfancybox(".fancybox");
    $(".stat-count").each(function() {
        //alert('ok');
        $(this).data('count', parseInt($(this).html(), 10));
        $(this).html('0');
        count($(this));
    });
    /*tooltips*/
    $('.dtooltip').tooltip({
    container: 'body'
  });
  
  $('.region-navigation').click(function(e){
     if($(e.target).hasClass('region-navigation')){
       $('body').removeClass('menu-open');
     }
    //if(alert($(e.target))
  });
  $('.region-search').hide();
  $('.search-toggle').click(function(){
    $('.region-search').fadeIn("slow",function(){
      $(this).find('input[type=text]').focus();
    });
    return false;
  });
  $('.search-close').click(function(){
    $('.region-search').fadeOut("slow");
    return false;
  });
});


function count($this) {
    var current = parseInt($this.html(), 10);
    current = current + 1; /* Where 50 is increment */

    $this.html(++current);
    if (current > $this.data('count')) {
        $this.html($this.data('count'));
    } else {
        setTimeout(function() {
            count($this)
        }, 50);
    }
}

function showfancybox($element){
    jQuery($element).fancybox({
        arrows: true,
        padding: 0,
        closeBtn: true,
        openEffect: 'fade',
        closeEffect: 'fade',
        prevEffect: 'fade',
        nextEffect: 'fade',
        helpers: {
            media: {},
            overlay: {
                locked: false
            },
            buttons: false,
            thumbs: {
                width: 50,
                height: 50
            },
            title: {
                type: 'inside'
            }
        },
        beforeLoad: function () {
            var el, id = jQuery(this.element).data('title-id');
            if (id) {
                el = jQuery('#' + id);
                if (el.length) {
                    this.title = el.html();
                }
            }
        }
    });
}
