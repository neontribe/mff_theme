<?php 

$li_contacts = '<li><a href="/' . drupal_get_path_alias('node/2') . '">' . get_title(2) . '</a></li>';
$li_faq = '<li><a href="/' . drupal_get_path_alias('node/9') . '">' . get_title(9) . '</a></li>';
$li_media = '<li><a href="/' . drupal_get_path_alias('node/10') . '">' . get_title(10) . '</a></li>';
$li_skoly = '<li><a href="/' . drupal_get_path_alias('node/11') . '">' . get_title(11) . '</a></li>';
$li_download = '<li><a href="/' . drupal_get_path_alias('node/12') . '">' . get_title(12) . '</a></li>';
$li_support = '<li><a href="/' . drupal_get_path_alias('node/13') . '">' . get_title(13) . '</a></li>';
$li_recepty = '<li><a href="/' . drupal_get_path_alias('node/14') . '">' . get_title(14) . '</a></li>';
$li_links = '<li><a href="/' . drupal_get_path_alias('node/15') . '">' . get_title(15) . '</a></li>';
$li_sitemap = '<li><a href="/' . drupal_get_path_alias('node/16') . '">' . get_title(16) . '</a></li>';
$li_privacy = '<li><a href="/' . drupal_get_path_alias('node/48') . '">' . get_title(48) . '</a></li>';
$li_copyright = '<li><a href="/' . drupal_get_path_alias('node/49') . '">' . get_title(49) . '</a></li>';

?>


          <div class="links">
            <h2><?=t('Find out more')?></h2>
            <div class="clr">
            
              <?php if($language == 'cz'):?>
              <ul>
                <?= $li_media ?>
                <?= $li_skoly ?>
                <?= $li_download ?>
                <?= $li_support ?>
              </ul>
              <ul>
                <?= $li_recepty ?>
                <?= $li_links ?>
                <?= $li_sitemap ?>                
                <?= $li_copyright ?>                
              </ul>
              <ul class="l">
                <?= $li_faq ?>              
                <?= $li_privacy ?>
                <?= $li_contacts ?>
				<li><a href="/podporuji-nas">Podporují nás</a></li>
              </ul>

              <?php elseif($language == 'de'):?>
              <ul>
                <?= $li_media ?>
                <?= $li_links ?>
                <?= $li_recepty ?>                                
                <?= $li_copyright ?>              
              </ul>
              <ul>
                <?= $li_download ?>              
                <?= $li_skoly ?>                
                <?= $li_faq ?>
				<?= $li_privacy ?>  
              </ul>
              <ul class="l">
                <?= $li_sitemap ?>
                <?= $li_contacts ?>
				<li><a href="/<?php echo drupal_get_path_alias('node/88')?>"><?php echo get_title(88)?></a></li>
              </ul>

              <?php elseif($language == 'fr'):?>
              <ul>
                <?= $li_media ?>
                <?= $li_download ?>
                <?= $li_copyright ?>
              </ul>
              <ul>
                <?= $li_faq ?>
                <?= $li_links ?>
              </ul>
              <ul class="l">
                <?= $li_sitemap ?>
                <?= $li_contacts ?>
              </ul>  

              <?php elseif($language == 'en'):?>
              <ul>
                <?= $li_media ?>
                <?= $li_download ?>
                <?= $li_faq?>
              </ul>
              <ul>
                <?= $li_links ?>
                <?= $li_sitemap ?>
                <?= $li_copyright ?>                
              </ul>
              <ul class="l">
                <?= $li_privacy ?>
                <?= $li_contacts ?>
				<li><a href="/<?php echo drupal_get_path_alias('node/95')?>"><?php echo get_title(95)?></a></li>  
              </ul>				
				
              <?php else:?>
              <ul>
                <?= $li_media ?>
                <?= $li_download ?>
                <?= $li_faq?>
              </ul>
              <ul>
                <?= $li_links ?>
                <?= $li_sitemap ?>
                <?= $li_copyright ?>                
              </ul>
              <ul class="l">
                <?= $li_privacy ?>
                <?= $li_contacts ?>
              </ul>
              <?php endif;?>
            </div>
          </div>
