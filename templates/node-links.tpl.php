<h1><?= $title ?></h1>
<div class="intro">
  <p><?= $node->field_intro[0]['safe'] ?></p>
</div>

<div class="clr links2">
<?php if($node->field_name[0]['value']):?>
<?php
	$sections = array();
	foreach($node->field_section as $section) 
	{
		$sections[] = $section['value'];
	}
	$sections = array_unique($sections);

	$half = floor((count($sections) / 2) + 0.5);

	echo '<div class="half left">' . "\n";
	
	$key = 0;
	foreach($sections as $section)
	{
		if($section)
		{
			if($key == $half)
			{
				echo '<div class="half right">' . "\n";
			}
		
			echo '<h2>' . $section . '</h2>' . "\n";
		}
		
		$i = 0;
		foreach($node->field_url as $i => $link)
		{
			if($node->field_section[$i]['value'] == $section)
			{
				echo '<dl>' . "\n";
				echo '<dt><a href="' . $link['value'] . '">' . $node->field_name[$i]['value'] . '</a></dt>' . "\n";
				echo '<dd>' . $node->field_description[$i]['value'] . '</dd>' . "\n";
				echo '</dl>' . "\n";
			}
			
			$i++;
		}

		if(($key + 1) == $half && $section && $key != count($sections) - 1)
		{
			echo '</div>' . "\n";
		}
		
		++$key;
	}
	echo '</div>' . "\n";
?>
<?php endif;?>
</div>
