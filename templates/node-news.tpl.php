    <script type="text/javascript">
    $(document).ready(function() {
      $("#JS_newsletter").click(function() {
          var box = $("#JS_newsletter_box");
          if(!box.is(":visible")) {
              box.slideDown();
          }
          else {
              box.slideUp();
          }

          return false;
      });

      $("#JS_tab_menu a").click(function() {
          $("#JS_tab_menu a").removeClass("active");
          $(this).addClass("active");
          var rel = $(this).attr("rel");

          $("#JS_tab_bloky .JS_tab").hide();
          $("#JS_tab_bloky .JS_"+rel).show();

          return false;
      });
    });
    </script>

      <div class="clr">
        <div class="content">
           <h1><?= $title ?></h1>
          <div class="tmenu">
            <ul id="JS_tab_menu">
              <li><a class="active" href="" rel="tab1"><?=t('News')?></a></li>
              <li><a href="" rel="tab2"><?=t('Photos')?></a></li>
              <li><a href="" rel="tab3"><?=t('Films')?></a></li>
            </ul>
          </div>
          <div id="JS_tab_bloky">
            <div class="tcontent JS_tab JS_tab1">
              <?= latest_news(10, false); ?>
            </div>
            <div class="tcontent JS_tab JS_tab2" style="display:none">
              <h2><?=t('Photos')?></h2>
              <?= flickr_photos('54849470@N02', 10, $language) ?>
              <div class="btn">
                <a href="http://www.flickr.com/photos/makefruitfair/" target="_blank"><?=t('All photos on <span class="frose">Flickr</span>')?></a>
              </div>
            </div>

            <div class="tcontent JS_tab JS_tab3" style="display:none">
              <h2><?=t('Films')?></h2>
              <?= youtube_videos('makefruitfair', 2, $youtube_playlist_id) ?>
              <div class="btn">
                <a href="http://www.youtube.com/user/makefruitfair" target="_blank"><?=t('All films on <span class="yred">Youtube</span>')?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <?php if($language == 'cz'):?>
            <h2><?=t('Follow us on')?></h2>
            <?php include('_facebook_with_articles.tpl.php');?>
          <?php endif;?>
          <?php include('_find_us_on.tpl.php');?>
        </div>
      </div>
