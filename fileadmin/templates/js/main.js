// Seite bei resize neu laden$(window).bind('resize', function(e){    if (window.RT) clearTimeout(window.RT);    window.RT = setTimeout(function()    {        this.location.reload(false); /* Laden aus dem Cashe verhindern */    }, 200);});jQuery(document).ready(function () {    /* MOBILE DETECTION */    var is_mobile = false;    if( $('#header_image').css('display')=='none') {        is_mobile = true;    }    // now i can use is_mobile to run javascript conditionally    if (is_mobile == true) {        jQuery("#wrapper").addClass("mobile_wrapper");    }    /* Navigation basteln */    jQuery('#main-menu').smartmenus({        subMenusSubOffsetX: 1,        subMenusSubOffsetY: -8    });    /* Eventslider starten */    jQuery('.news-list-view').bxSlider({        auto: true,        autoControls: true,        touchEnabled: false    });});