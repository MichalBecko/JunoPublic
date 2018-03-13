var modalVerticalCenterClass = ".modal";
function centerModals($element) {
    var $modals;
    if ($element.length) {
        $modals = $element;
    } else {
        $modals = $(modalVerticalCenterClass + ':visible');
    }

    $modals.each( function(i) {
        var $clone = $(this).clone().css('display', 'block').appendTo('body');
        var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
        top = top > 0 ? top : 0;
        $clone.remove();
        $(this).find('.modal-content').css("margin-top", top);
    });
}

$(function(){

    $.nette.init();    
    
    
    
//  tooltip for data tooltip selectors
    $(document).tooltip({
        selector: "[data-tooltip='tooltip']",
        placement : "bottom",
        delay: {
            show: 150,
            hide: 0
        }
    });
    
    $(".left-side-menu li a").click(function() {
       console.log("pes"); 
    });
    
    $("[data-click='click']").click(function() {
       $($(this).data("target")).trigger("click");
       
    });
    
    // closing for all flashmessages
    $(".flash-messages .flash button").on("click", function() {
        
        var flash = $(this).closest(".flash");
        fadeOutDiv(flash);
    });
    
    // closing each flashmessage after 5 seconds
    $(".flash-messages .flash").each(function(i, flashMessage) {
        i++;
        
        var timer  = 3000;
        flashMessage = $(flashMessage);
        
        setTimeout(function() {
            fadeOutDiv(flashMessage);
        }, i * timer);
        
    });
    
    function fadeOutDiv(div) {
        div.animate({
           marginLeft : "150px",
           opacity: 0
       }, 375, function() {
           div.remove();
       });
    }
    
    // fix for stackable modals
    $(document).on('hidden.bs.modal', '.modal', function () {
        $('.modal:visible').length && $(document.body).addClass('modal-open');
    });
    
    // fix for backdrop z-index
    $(document).on('show.bs.modal', '.modal', function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });
    
    // we tell modals to be vertically centered, by default they are horizontally centered
    // if we want modal to be centered only to concrete classes, we do it like
    // var modalVerticalCenterClass = ".modal.modal-vcenter";
    
    
    $(document).on('show.bs.modal', function(e) {
        centerModals($(".modal"));
    });
    $(window).on('resize', centerModals);
});

