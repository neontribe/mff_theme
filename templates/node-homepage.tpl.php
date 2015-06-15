<div class="cite">
    <div id="JS_slideshow" style="height:289px;width: 940px;overflow:hidden;">
		
      <?php if (isset($node->field_title[0]['value'])):?>
        <div class="clr">
            <div class="cimg">
              <div id="flashmovie">
                <img src="<?=$image_path?>/sign.jpg"></img>
              </div>
            </div>
            <div class="ctext">
                <h1 style="font-size: 19px;"><a href="<?=$node->field_link3[0]['url']?>"><?= $node->field_title[0]['value'] ?></a></h1>
                <?= $node->field_text2[0]['safe'] ?>
				<div class="clr">
                    <div class="btn">
                      <?=$node->field_link3[0]['view']?>
                    </div>
                    <div class="else">
                      <a href="<?=url('node/7')?>"><?= t('What else can I do?') ?></a>
                    </div>
                </div>
            </div>
        </div>
      <?php endif;?>

      <?php
        $type = 'stories';
        $sql = "SELECT nid FROM {node} WHERE type = '%s' LIMIT 1";
        $result = db_query($sql, $type);

        $row = db_fetch_array($result);
        $story = node_load($row['nid']);
      ?>
		
      <?php 
		$counter = 0;
		foreach ($story->field_name as $key => $name):
		$nid = $story->field_pribeh_tlacitko_odkaz[$key]["nid"];
        $homepage = $story->field_pribeh_homepage[$key]["value"];
        
        if(!$homepage) {
			continue;
		}
        
        $nid = $nid?$nid:7;

        $text_tlacitko = $story->field_pribeh_tlacitko_text[$key]["value"];
        $text_tlacitko = $text_tlacitko != ""?$text_tlacitko: t('Get involved');

        $url = url("node/".$nid);
      ?>
		
        <?php if ($counter >= 4) break; ?>
        <div class="clr">
            <div class="cimg">
                <a href="<?=$url?>"><?= theme('imagecache', 'img_350', $story->field_photo[$key]['filepath']) ?></a>
            </div>
            <div class="ctext">
                <h1><a href="<?=$url?>"><?= $name["value"] ?></a></h1>

                <p><?= $story->field_text[$key]['value'] ?></p>

                <div class="clr">
                    <div class="btn">
                        <a href="<?=$url?>"><?= $text_tlacitko ?></a>
                    </div>
                    <div class="else">
                        <a href="<?=url('node/7')?>"><?= t('What else can I do?') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
		$counter++;
		endforeach;?>

    </div>
    <?php if($key > 0):?>
    <div class="switch clr" id="JS_switcher">
    </div>
    <?php endif?>
    <script type="text/javascript">
              $("#JS_slideshow").cycle({
                 pager:  '#JS_switcher',
                 pagerAnchorBuilder: function(i,el){return "<div></div>"},
                 activePagerClass:"active",
                 pauseOnPagerHover:1,
                 pause:1,
                 fastOnEvent: 1,
                 timeout:  21000,
                 onPagerEvent: function(i,el){$("#JS_slideshow").cycle({timeout:0})}
             });
           

       </script>
        
</div>

<div class="wrapper-home">
    <div class="wrapper2">
      <div class="june2015-petition">
      <?php if ($language == 'en'): ?>
        <script type="text/javascript" src="https://www.policat.org/api/js/widget/5497"></script>
      <?php endif; ?>
      <?= $language; ?>
      <?php if ($language == 'es'): ?>
        <script type="text/javascript" src="https://www.policat.org/api/js/widget/5500"></script>
      <?php endif; ?>
      </div> <!-- end petition added June 2015 -->
        <div class="clr">
            <div class="half left">
                <h2><?= $node->field_translation1[0]['value'] ?></h2>

                <?php if ($langugage == 'cz'): ?>
                <?= latest_news(2)
                ; ?>
                <?php else: ?>
                <?= latest_news(3)
                ; ?>
                <?php endif;?>
                <div class="btn">
                    <!--<a href="/novinky"><?= $node->field_translation2[0]['value'] ?></a>-->
                    <a href="/<?=drupal_get_path_alias('node/21')?>"><?= $node->field_translation2[0]['value'] ?></a>
                </div>
            </div>
            <div class="half right">
		<h2></h2>
	
                <h2><?=$node->field_translation3[0]['value'] ?></h2>

                <div class="video-wrap">
                </div>
                <div class="btn">
                    <a href="http://www.youtube.com/user/makefruitfair" target="_blank"><?= $node->field_translation4[0]['value'] ?></a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="home-bot">
    <div class="clr">

        <div class="home1">
            <?php if ($language == "cz"): ?><?php include('_home_facebook_with_articles.tpl.php'); ?><?php endif?>
            <?php include('_home_find_us_on.tpl.php');?>
        	<?php if ($language != 'cz'):?>
              <div class="hTop2">
                 <div class="get_involved">					
                  <?= $node->field_get_involved[0]['safe'] ?>
                  <!--<h2><?= t('Get involved') ?></h2>-->
                  <?php //include('_get_involved.tpl.php');?>
                </div>
              </div>
            <?php endif?>
        </div>

        <div class="home2">
            <div class="clr">
                <?php include('_home_map_movie_navigation.tpl.php');?>
            </div>
            <?php if ($language == 'cz'):?>
              <div class="hTop2">
                 <div class="get_involved">					
                  <?= $node->field_get_involved[0]['safe'] ?>
                  <!--<h2><?= t('Get involved') ?></h2>-->
                  <?php //include('_get_involved.tpl.php');?>
                </div>
              </div>
            <?php endif?>
        </div>

        <div class="home3">
            <h2><?= $node->field_translation8[0]['value'] ?></h2>
            	<?php 
				if($language == "cz"):?>
					<?=get_home_photo()?>
					<div class="btn">
            			<a href="<?=get_photo_list_url()?>"><?= $node->field_translation9[0]['value'] ?></a>
					</div>            			
            	<?php else:?>
            		<?= flickr_photos_homepage('54849470@N02', 3, $language) ?>
            		<div class="btn">
                		<a href="http://www.flickr.com/photos/makefruitfair/" target="_blank"><?= $node->field_translation9[0]['value'] ?></a>
                	</div>
                <?php endif?>
            
            
            <?php include('_home_donate.tpl.php');?>
            
        </div>

    </div>
</div>



