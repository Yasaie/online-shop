(function () {

    Waves.attach('button', ['waves-light']);
    Waves.attach('#cart');
    Waves.init();


    var header = $('header');
    var mainMenu = $('#main-menu');
    var mainMenuUl = $('> ul', mainMenu);
    var hoverEffect = $('#hover-effect', mainMenu);
    var mainMenuSub = $('#main-menu-sub');
    var mainOverlay = $('#main-overlay');
    var menuSubAnimationDuration = 200;

    mainMenuUl.find('li').on('mouseover', function () {
        var offset = $(this).offset();
        offset.right = ($(window).width() - (offset.left + $(this).outerWidth()));
        hoverEffect.css({
            right: offset.right,
            left: offset.left,
            transform: 'scaleX(1)'
        });

        var sectionName = $(this).data('name');
        $('section', mainMenuSub).hide();
        $('section[data-name="' + sectionName + '"]', mainMenuSub).show();
    });

    var menuHoverEffectOut = function () {
        hoverEffect.css({
            transform: 'scaleX(0)'
        });
        setTimeout(function () {
            hoverEffect.removeAttr('style');
        }, 500);
    };

    var menuClose = function () {
        mainMenuSub.fadeOut(menuSubAnimationDuration);
        mainOverlay.fadeOut();
    };

    $('body').on('mouseover', function (e) {
        var none = Object.values($('*', mainMenu))
            .concat(Object.values($('*', mainMenuSub)))
            .concat(Object.values(mainMenuSub));
        if (Object.values(none).indexOf(e.target) == -1) {
            menuHoverEffectOut();
            menuClose();
        }
    });

    mainMenuSub.css({
        right: ($(window).width() - (mainMenuUl.offset().left + mainMenuUl.outerWidth()))
    });

    mainMenuUl.find('li').hover(function () {
        if($(this).data('name')!==undefined) {
            mainMenuSub.fadeIn(menuSubAnimationDuration);
            mainOverlay.fadeIn(menuSubAnimationDuration);
        } else {
            menuClose();
        }
    });

})();