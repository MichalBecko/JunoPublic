$(function(){

    $.nette.init();


    $(".navigate-me").click(function() {

       

        if( (navigator.platform.indexOf("iPhone") != -1) 
            || (navigator.platform.indexOf("iPod") != -1)
            || (navigator.platform.indexOf("iPad") != -1)) {
                window.open("maps://maps.google.com/maps?daddr=48.747953, 18.339396&amp;ll=");
        } else {
                window.open("http://maps.google.com/maps?daddr=48.747953, 18.339396&amp;ll=");
        }
        
    });
    
    $(".login-button").click(function() {
        
       var login = $(".login");
       
       login.slideToggle(250);
       
       $("html, body").animate({ 
            scrollTop: "0px"
        }, 'slow');
       
       return false;
    });

    
    $(".link-toggle").click(function() {
       var arrowDown = $(this).closest(".download-item-cont").find(".arrow-down");
       var arrowUp = $(this).closest(".download-item-cont").find(".arrow-up");
       var container = $(this).closest(".download-item-cont").find(".download-content-container");
       var upperCont = $(this).closest(".download-item-cont").find(".download-item");
       
       
        if (arrowDown.is(":visible")) {
            container.slideToggle();
            arrowDown.hide();
            arrowUp.show();
            upperCont.addClass("blue-border");
            
            
        }else {
            container.slideToggle();
            arrowUp.hide();
            arrowDown.show();
            upperCont.removeClass("blue-border");
        }
        
    return false;
});
     
     $(".amb-link").click(function() {
       var arrowDown = $(this).find(".arrow-down");
       var arrowUp = $(this).find(".arrow-up");
       var container = $(this).closest(".amb-item-container").find(".amb-click-content");
       var upperCont = $(this).closest(".amb-item-container").find(".amb-content-cont");
       
        if (arrowDown.is(":visible")) {
            container.slideToggle();
            arrowDown.hide();
            arrowUp.show();
           $(this).closest(".amb-content-cont").find(".amb-item").addClass("blue-border");
           $(this).closest(".amb-item").find(".left-part").addClass("blue-border-right");
           $(this).closest(".amb-item").find(".middle-part").addClass("blue-border-right");
           $(this).closest(".amb-item-container").find(".amb-click-content").addClass("blue-border-right blue-border-left blue-border-bottom");
           $(this).closest(".amb-item-container").find(".amb-click-content").find(".left-part").addClass("blue-border-right");
           $(this).closest(".amb-item-container").find(".amb-click-content").find(".middle-part").addClass("blue-border-right");
            
        }else {
            container.slideToggle();
            arrowUp.hide();
            arrowDown.show();
           $(this).closest(".amb-content-cont").find(".amb-item").removeClass("blue-border");
           $(this).closest(".amb-item").find(".left-part").removeClass("blue-border-right");
           $(this).closest(".amb-item").find(".middle-part").removeClass("blue-border-right");
           $(this).closest(".amb-item-container").find(".amb-click-content").removeClass("blue-border-right blue-border-left blue-border-bottom");
           $(this).closest(".amb-item-container").find(".amb-click-content").find(".left-part").removeClass("blue-border-right");
           $(this).closest(".amb-item-container").find(".amb-click-content").find(".middle-part").removeClass("blue-border-right");

            
        }
        return false;
    });
    
    
  
     $(".down-menu .dropbtn").click(function() {
         var content = $(this).closest(".dropdown").find(".dropdown-content");
         var drop = $(this).closest(".dropdown");
         
        if (content.is(":visible")) {
            content.slideToggle();
            drop.removeClass("bg-grey grey-border-top" );
            content.removeClass("bg-grey");
        }
        
        if (content.is(":hidden")) {
            content.slideToggle();
            drop.addClass("bg-grey grey-border-top");
            content.addClass("bg-grey");
        }
        return false;
     });
    
    
    $(".navbar-toggle").click(function() {
        var menu = $(".down-menu");
        if (menu.is(":visible")) {
            menu.slideToggle();
        }
        
        if (menu.is(":hidden")) {
            menu.slideToggle();
        }
        
    });

    Nette.validateForm = function(sender) {
            var form = sender.form || sender,
                    scope = false;

            if (form['nette-submittedBy'] && form['nette-submittedBy'].getAttribute('formnovalidate') !== null) {
                    var scopeArr = Nette.parseJSON(form['nette-submittedBy'].getAttribute('data-nette-validation-scope'));
                    if (scopeArr.length) {
                            scope = new RegExp('^(' + scopeArr.join('-|') + '-)');
                    } else {
                            return true;
                    }
            }

            var radios = {}, i, elem;

            var foundError = false;
            for (i = 0; i < form.elements.length; i++) {
                    elem = form.elements[i];

                    if (elem.tagName && !(elem.tagName.toLowerCase() in {input: 1, select: 1, textarea: 1, button: 1})) {
                            continue;

                    } else if (elem.type === 'radio') {
                            if (radios[elem.name]) {
                                    continue;
                            }
                            radios[elem.name] = true;
                    }

                    if ((scope && !elem.name.replace(/]\[|\[|]|$/g, '-').match(scope)) || Nette.isDisabled(elem)) {
                            continue;
                    }

                    if (!Nette.validateControl(elem)) {
                            foundError = true;
                    } else {
                        removeErrorClasses(elem);
                    }
            }
            
            if (!foundError) {
                return true;
            } else {
                console.log("pes");
                goToFormTop(elem);
                return false;
            }
    };

    Nette.addError = function(element, message) {
        
        var ele = $(element);
        
        ele.addClass("errorfield");
        ele.closest(".form-input-line").parent().find("p").eq(0).addClass("errorfieldcolor");
        
    };
    
    function removeErrorClasses(ele) {
        
        var ele = $(ele);
        
        ele.removeClass("errorfield");
        ele.closest(".form-input-line").parent().find("p").eq(0).removeClass("errorfieldcolor");
    }
    
    function goToFormTop(elem) {
        
        var form = $(elem).closest("form").eq(0);
        alert("Nevyplnili ste správne všetky povinné údaje.");
        $('html,body').animate({ 
            scrollTop: form.offset().top + "px"
        }, 'slow', function() {
            
        });
        
        
    }
    
    
});




