      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>
      </div>
      <?= $node->content['body']['#value'] ?>
      <?php if($node->field_name[0]['value']):?>
      <div class="clr">
      
<?php
	foreach($node->field_name as $key => $name)
	{
		$link = $node->field_link[$key]['value'];
		//$image = theme('imagecache', 'img_220', $node->field_picture[$key]['filepath']);
		$image = theme('imagecache', 'img_280', $node->field_picture[$key]['filepath']);
		$div_class = ($key % 3 == 2) ? 'action l' : 'action';
		
		if(($key % 3 == 0) && ($key != 0))
		{
			echo '<div class="clr">' . "\n";
		}
		
		echo '<div class="' . $div_class . '">' . "\n";
		//echo '<a href="' . $link . '"><b class="frame">' . $image . '</b><strong><span>' . $name['value'] . '</span></strong></a>' . "\n";
		echo '<a href="' . $link . '">' . $image . '<strong><span>' . $name['value'] . '</span></strong></a>' . "\n";
		echo '<p>' . $node->field_description[$key]['value'] . '</p>' . "\n";
		echo '</div>' . "\n";
		
		if ($key % 3 == 2 && $key != count($node->field_name) - 1)
		{
			echo '</div>' . "\n";
		}
	}
?>
      </div>
      <?php endif;?>

      <div class="clr why">
        <div class="half left">
          <?= $node->field_left[0]['view'] ?>
        </div>
        <div class="half right">
          <?= $node->field_right[0]['view'] ?>
        </div>
      </div>
