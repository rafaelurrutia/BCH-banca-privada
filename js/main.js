$( document ).ready(function() {
  $('#tab-container').easytabs();

  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      directionNav: false
    });
  });

  $(".etabs .tab:first-child").addClass("pos-topleft");
  $(".etabs .tab:first-child + li").addClass("pos-topright");
  $(".etabs .tab:first-child + li + li").addClass("pos-bottomleft");
  $(".etabs .tab:first-child + li + li + li").addClass("pos-bottomright");



  function tabsrotator(){

    $( ".etabs li" ).click(function() {
      if ($(this).hasClass('pos-topleft')){
        $(".pos-topright").toggleClass( "pos-topright pos-topleft2");
        $(".pos-bottomright").toggleClass( "pos-bottomright pos-topright2");
        $(".pos-bottomleft").toggleClass( "pos-bottomleft pos-bottomright2");
        $(".pos-topleft").toggleClass( "pos-topleft pos-bottomleft2" );
        tabsrotator();
      }
      if ($(this).hasClass('pos-topleft2')){
        $(".pos-topright2").toggleClass( "pos-topright2 pos-topleft");
        $(".pos-bottomright2").toggleClass( "pos-bottomright2 pos-topright");
        $(".pos-bottomleft2").toggleClass( "pos-bottomleft2 pos-bottomright");
        $(".pos-topleft2").toggleClass( "pos-topleft2 pos-bottomleft" );
        tabsrotator();
      }
      if ($(this).hasClass('pos-topright')){
        $(".pos-topright").toggleClass( "pos-topright pos-bottomright2");
        $(".pos-bottomright").toggleClass( "pos-bottomright pos-bottomleft2");
        $(".pos-bottomleft").toggleClass( "pos-bottomleft pos-topleft2");
        $(".pos-topleft").toggleClass( "pos-topleft pos-topright2" );
        tabsrotator();
      }
      if ($(this).hasClass('pos-topright2')){
        $(".pos-topright2").toggleClass( "pos-topright2 pos-bottomright");
        $(".pos-bottomright2").toggleClass( "pos-bottomright2 pos-bottomleft");
        $(".pos-bottomleft2").toggleClass( "pos-bottomleft2 pos-topleft");
        $(".pos-topleft2").toggleClass( "pos-topleft2 pos-topright" );
        tabsrotator();
      }



    });

  };
tabsrotator();
    
    //////
    
    // tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content").hide();
    $(".tab_content:first").show();

    /* if in tab mode */
    $("ul.tabs li").click(function() {

        $(".tab_content").hide();
        var activeTab = $(this).attr("rel"); 
        $("#"+activeTab).fadeIn();		

        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");

        $(".tab_drawer_heading").removeClass("d_active");
        $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");

    });
    /* if in drawer mode */
    $(".tab_drawer_heading").click(function() {

        $(".tab_content").hide();
        var d_activeTab = $(this).attr("rel"); 
        $("#"+d_activeTab).fadeIn();

        $(".tab_drawer_heading").removeClass("d_active");
        $(this).addClass("d_active");

        $("ul.tabs li").removeClass("active");
        $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });


    /* Extra class "tab_last" 
	   to add border to right side
	   of last tab */
    $('ul.tabs li').last().addClass("tab_last");

    
    ///////

});
