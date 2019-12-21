jQuery( document ).ready(function() {

    /* Navigation basteln */
    jQuery('#main-menu').smartmenus({
        subMenusSubOffsetX: 1,
    subMenusSubOffsetY: -8

    });
  
    jQuery('.news-list-view').bxSlider({
      auto: true,
      autoControls: true,
      touchEnabled: false

    });
});
