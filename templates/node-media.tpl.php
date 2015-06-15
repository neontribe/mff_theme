      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>
      </div>
      <?= $node->content['body']['#value'] ?>
      
      <div class="clr">
        <div class="three">
          <h2><?= t('Press releases') ?></h2>
                    
<?php  
	$node_type = 'media_detail';
  	$sql = "SELECT nid, created, title FROM {node} WHERE type = '%s' ORDER BY created DESC";
	$query = db_query($sql, $node_type);
	
	if(mysql_num_rows($query))
	{
		echo '<ul class="press">' . "\n";
		while($item = db_fetch_object($query))
		{
			$path = '/' . drupal_get_path_alias('node/'.$item->nid);
			$date = date('j. n. Y', $item->created);
			$title = $item->title;
			echo '<li><a href="' . $path . '">' . "<span>$date</span> <b>$title</b></a></li>" . "\n";
		}
		echo '</ul>' . "\n";
	}
	else
	{
		echo '<p>' . t('There are no press releases currently available.') . '</p>';
	}
?>

        </div>
        <div class="three">
          <?= $node->field_left[0]['safe'] ?>
          <?php if($node->field_presskit[0]['filepath']):?>
          <div class="blank"><a href="/<?= $node->field_presskit[0]['filepath'] ?>"><?= t('Download presskit') ?></a></div>
          <?php endif;?>
        </div>       
        <div class="three l">
          <?= $node->field_right[0]['safe'] ?>
        </div>
      </div>
