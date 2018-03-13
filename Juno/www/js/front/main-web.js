//Burger menu

function burgerMenu(x) {
    x.classList.toggle("change");
}


$(document).ready(function(){

    var animationTime = 250;

    // Aside menu toggle
    $('.burger').on('click', function () {
        $('.aside-menu').toggle(150);

        console.log($( window ).width());
    });

    // Filter-top
    $('.filterp').on('click', function () {
        if ( $( window ).width() < 767 ) {
            $('.filterlink').toggle(150);
        }
    });

    $(".icon-hladat").on("click", function() {
        $("#submit").click();
    });

    setTimeout(function(){
        $('#flash').slideUp(50);
    }, 2000);


    if ( $( window ).width() > 1250 ) {
        var leftRam = $(".right-menu").offset().left;
        $('.right-menu li').hover(function () {

            var classMenu = $(this).data("blockclass");


            $("." + classMenu).fadeIn(animationTime);

        },function (e) {

            if (e.pageX > leftRam) {
                $(".aside-menu-hover").hide();
            }
        });

        $(".aside-menu-hover").on("mouseenter", function() {
        });

        $(".aside-menu-hover").on("mouseleave", function(e) {
            $(".aside-menu-hover").hide();
        });
    }

});

$(document).ready(function () {
    //produkt vyber z rôznych variant

    $(".items-variant > p, .items-variant-s > p ").on('click', function () {

        var variant = $(this).data("vyber");
        $("." + variant).toggle();

    });

    $(".items-variant-s .btn-vybrat").on('click', function () {

        event.preventDefault();
        var dis = $(this);
        var id = dis.data("id");
        var text =  dis.closest(".kosik-box").find(".kosik-info h1").text();
        var paste = dis.closest(".items-variant-s").find("p");
        var varianta = dis.closest(".items-variant-s").find("p").data("vyber");

        paste.text(text);

        $(dis).closest(".items-variant-s").find(".hiddeninput").val(id);

        $("." + varianta).hide();

    });

});
