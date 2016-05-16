jQuery( function () {
  jQuery( "#menubtn" )
    .click( function () {
      jQuery( "#category" )
        .slideToggle();
    } );
  jQuery( "#category a" )
    .click( function () {
      if ( jQuery( window )
        .width() > 767 ) {} else {
        jQuery( "#category" )
          .hide();
      }
    } );
  jQuery( "#searchbtn" )
    .click( function () {
      if ( jQuery( window )
        .width() > 767 ) {} else {
        jQuery( "#category" )
          .hide();
      }
    } );
} );
jQuery( window )
  .resize( function () {
    if ( jQuery( window )
      .width() > 767 ) {
      jQuery( "#category" )
        .show();
    } else {
      jQuery( "#category" )
        .hide();
    }
  } );
jQuery( function () {
  jQuery( "#searchbtn" )
    .click( function () {
      jQuery( "#searchbox-hide" )
        .slideToggle();
    } );
  jQuery( "#menubtn" )
    .click( function () {
      if ( jQuery( window )
        .width() > 767 ) {} else {
        jQuery( "#searchbox-hide" )
          .hide();
      }
    } );
} );
jQuery( window )
  .resize( function () {
    if ( jQuery( window )
      .width() > 767 ) {
      jQuery( "#searchbox-hide" )
        .show();
    } else {
      jQuery( "#searchbox-hide" )
        .hide();
    }
  } );