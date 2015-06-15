      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>
      </div>
      <?= $node->content['body']['#value'] ?>
        
      <?php if($node->field_left[0]['view'] || $node->field_right[0]['view']):?>
      <div class="clr bananyWrap">
        <div class="left half">
          <?= $node->field_left[0]['view'] ?>
        </div>
        <div class="right half">
          <?= $node->field_right[0]['view'] ?>        
        </div>
      </div>
      <?php endif;?>

      <div class="clr why">
        <div class="half left clr">
        
        
<?php
	$item = menu_get_item();
	$tree = menu_tree_page_data('primary-links');
	list($key, $curr) = each($tree);

	while ($curr) 
	{
		// Terminate the loop when we find the current path in the active trail.
		if ($curr['link']['href'] == $item['href']) 
		{
			$tree = $curr['below'];			
			$curr = FALSE;
		}
		else 
		{
			// Add the link if it's in the active trail, then move to the link below.
			if ($curr['link']['in_active_trail']) 
			{
				$tree = $curr['below'] ? $curr['below'] : array();
			}
			list($key, $curr) = each($tree);
		}
	}	
?>
        
          <?php foreach($tree as $child): ?>
          <?php 
            $child_nid = substr(drupal_get_normal_path($child['link']['link_path']), 5);
		  $child_node = node_load($child_nid);
		?>
          <div class="clr">
            <div class="img3b">
              <a href="/<?= $child_node->path ?>"><img src="<?=$image_path?>/banany-sample.gif" alt="" /></a>
            </div>
            <h2><a href="/<?= $child_node->path ?>"><?= $child_node->title ?></a></h2>
            <p><?= $child_node->field_intro[0]['value'] ?></p>
          </div>
          <?php endforeach; ?>

        </div>
        <?php if($node->field_video[0]['value']):?>
        <div class="half right clr">
          <h2><?= t('Animation film') ?></h2>          
          <?= $node->field_video[0]['safe'] ?>          
        </div>
        <?php endif;?>
      </div>

      <h2><?= t('Fruit stories') ?></h2>
      <div class="gmap">
        <iframe width="880" height="460" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=http:%2F%2Fmaps.google.com%2Fmaps%2Fms%3Fhl%3Den%26ie%3DUTF8%26oe%3DUTF8%26msa%3D0%26output%3Dnl%26msid%3D<?=$gmap_id?>&amp;ll=16.972741,8.085938&amp;spn=112.313022,196.875&amp;z=2&amp;output=embed"></iframe>      
      </div>   
