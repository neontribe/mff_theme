<?php
	if (isset($_GET['mail']) && valid_mail($_GET['mail']))
	{
		if (isset($welcome_mail_id))
		{
			send_welcome_mail($_GET['mail'], $welcome_mail_id);
		}
	}
?>

      <div class="clr">
        <div class="content">
          <h1><?= $title ?></h1>
          <div class="intro">
            <p><?= $node->field_intro[0]['safe'] ?></p>
          </div>
          
          <div class="search search2">
          <?= $subscription_form ?>
          </div>

          <?= $node->content['body']['#value'] ?>
          
<?php /* <<<<<<<<< OLD verion of NEWSLETTER functionality >>>>>>>>>  
	$node_type = 'simplenews';
  	$sql = "SELECT nid, title FROM {node} WHERE type = '%s' AND status = 1 ORDER BY created DESC";
	$query = db_query($sql, $node_type);
	
	if(mysql_num_rows($query))
	{
		echo '<h2>' . t('Newsletter archive') . '</h2>';
		echo '<ul class="newsletter">' . "\n";
		while($item = db_fetch_object($query))
		{
			$path = '/' . drupal_get_path_alias('node/'.$item->nid);
			$title = $item->title;
			echo '<li><a href="' . $path . '">' . $title . '</a></li>' . "\n";
		}
		echo '</ul>' . "\n";
	}
*/?>          
<?php if($language == 'es'):?>
  <?php echo '<h2>' . t('Newsletter archive') . '</h2>'; ?>
  <style type="text/css">
  <!--
  .display_archive {font-family: arial,verdana; font-size: 12px;}
  .campaign {line-height: 125%; margin: 5px;}
  //-->
  </style>
  <script language="javascript" src="http://us2.campaign-archive1.com/generate-js/?u=4d5eb6d994e7976c41b7bce54&fid=31877&show=10" type="text/javascript"></script>
<?php else: ?>
  <?php echo '<h2>' . t('Newsletter archive') . '</h2>'; ?>
  <style type="text/css">
  <!--
  .display_archive {font-family: arial,verdana; font-size: 12px;}
  .campaign {line-height: 125%; margin: 5px;}
  //-->
  </style>
  <script language="javascript" src="http://us2.campaign-archive1.com/generate-js/?u=4d5eb6d994e7976c41b7bce54&fid=31769&show=10" type="text/javascript"></script>
<?php endif;?>
        </div>
        
        <div class="col">
		  <?php if($language == 'cz'):?>	
            <h2><?=t('Become a supporter!')?></h2>
            <?php include('_facebook_with_articles.tpl.php');?>
		  <?php endif;?>			
          <?php include('_document.php');?>		  
        </div>        
      </div>
