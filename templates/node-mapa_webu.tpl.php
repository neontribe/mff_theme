<div class="clr">
  <div class="content">
    
    <h1><?= $title ?></h1>
	     
<?php
	echo sitemap(menu_tree_page_data('primary-links'));
?>

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
?>          
	<ul id="map"> 
		<?= $li_media ?>    
		<?= $li_news ?>
		<li><?=t('Other')?>
			<ul>
				<?= $li_download ?>
				<?= $li_faq ?>
				<?= $li_links ?>
				<?= $li_sitemap ?>
				<?php if($language != 'fr'):?>
					<?= $li_privacy ?>
				<?php endif;?>
			</ul>
		</li>
		<?= $li_contacts ?>
	</ul>
          
	</div>
	<div class="col">
		<?php if($language == 'cz'):?>        
			<h2><?=t('Follow us on')?></h2>
			<?php include('_facebook_with_articles.tpl.php');?>
		<?php endif;?>
		<?php include('_find_us_on.tpl.php');?>
	</div>
</div>
