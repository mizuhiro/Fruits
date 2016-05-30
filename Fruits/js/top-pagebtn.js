var syncerTimeout = null;

jQuery( function () {
  jQuery( window )
    .scroll( function () {
      if ( syncerTimeout == null ) {
        syncerTimeout = setTimeout( function () {

          var element = jQuery( '#page-top' );

          var visible = element.is( ':visible' );

          var now = jQuery( window )
            .scrollTop();

          var under = jQuery( 'body' )
            .height() - ( now + jQuery( window )
              .height() );

          syncerTimeout = null;
        }, 1000 );
      }
    } );

  jQuery( '#move-page-top' )
    .click(
      function () {
        jQuery( 'html,body' )
          .animate( {
            scrollTop: 0
          }, 'slow' );
      }
    );
} );