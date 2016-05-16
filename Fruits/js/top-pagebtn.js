// グローバル変数
var syncerTimeout = null;

// 一連の処理
jQuery( function () {
  // スクロールイベントの設定
  jQuery( window )
    .scroll( function () {
      // 1秒ごとに処理
      if ( syncerTimeout == null ) {
        // セットタイムアウトを設定
        syncerTimeout = setTimeout( function () {

          // 対象のエレメント
          var element = jQuery( '#page-top' );

          // 現在、表示されているか？
          var visible = element.is( ':visible' );

          // 最上部から現在位置までの距離を取得して、変数[now]に格納
          var now = jQuery( window )
            .scrollTop();

          // 最下部から現在位置までの距離を計算して、変数[under]に格納
          var under = jQuery( 'body' )
            .height() - ( now + jQuery( window )
              .height() );

          // フラグを削除
          syncerTimeout = null;
        }, 1000 );
      }
    } );

  // クリックイベントを設定する
  jQuery( '#move-page-top' )
    .click(
      function () {
        // スムーズにスクロールする
        jQuery( 'html,body' )
          .animate( {
            scrollTop: 0
          }, 'slow' );
      }
    );
} );