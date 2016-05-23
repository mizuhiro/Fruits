<footer>
  <div id="footer">
    <div class="footer-inner">
      <div class="copyright">
        <p id="copyright" class="wrapper">&copy;<?php echo date('Y'); ?><?php bloginfo('name'); ?> All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
<!-- Facebook SclBtn -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async = true;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Twitter SclBtn -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.async=true;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!-- HtnSclBtn -->
<script type="text/javascript" src="//b.hatena.ne.jp/js/bookmark_button.js" charset="utf-8" async="async"></script>
<!-- GglOneBtn -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js" async="async" gapi_processed="true">{lang: 'ja'}</script>
<!-- Pocket -->
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
</body>
