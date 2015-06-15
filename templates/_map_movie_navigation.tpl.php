              <div class="half2 right">
              <? if ($_SERVER['SERVER_NAME']== "www.makefruitfair.de" ) { ?>
              <h3><?= t('Animation film') ?></h3>
              <?  } else { ?>
              <h2><?= t('Animation film') ?></h2>
              <?  }?>  
                <a href="http://www.youtube.com/watch?v=JLACAKmuTew" target="_blank"><img src="<?=$image_path?>/sample/film.jpg" alt="" /></a>
                <?php if($language == 'cz'):?>
                <div class="btn">
                  <a href="http://www.youtube.com/user/makefruitfair" target="_blank"><?=t('All videos')?></a>
                </div>
                <?php endif;?>
              </div>    
              <div class="half2 left">
              <? if ($_SERVER['SERVER_NAME']== "www.makefruitfair.de" ) { ?>
              <h3><?=t('Fruit stories')?></h3>
              <?  } else { ?>
              <h2><?=t('Fruit stories')?></h2>
              <?  }?>                                              
                <a href="<?=drupal_get_path_alias('node/44')?>"><img src="<?=$image_path?>/map.gif" alt="" /></a>
                <?php if($language == 'cz'):?>
                <div class="btn">
                  <a href="<?=drupal_get_path_alias('node/44')?>"><?= t('Enlarge the map') ?></a>
                </div>
                <?php endif;?>
              </div>
