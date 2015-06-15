      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>            
      </div>
      <?= $node->content['body']['#value'] ?> 

      <?php foreach($node->field_name as $key => $name):?>
      <div class="workshop">
        <h2><?= $node->field_name[$key]['value']?></h2>
        <div class="type"><?= $node->field_type[$key]['value']?></div>
        <p><?= $node->field_description[$key]['safe']?></p>
        
        <?php if($node->field_picture_1[$key]['filepath']):?>
        <div class="clr">
          <div class="three">
            <?= theme('imagecache', 'img_280', $node->field_picture_1[$key]['filepath']); ?>
          </div>

          <?php if($node->field_picture_2[$key]['filepath']):?>          
          <div class="three">
            <?= theme('imagecache', 'img_280', $node->field_picture_2[$key]['filepath']); ?>
          </div>
          <?php endif; ?>
          
          <?php if($node->field_picture_3[$key]['filepath']):?>
          <div class="three l">
            <?= theme('imagecache', 'img_280', $node->field_picture_3[$key]['filepath']); ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        
      </div>
      <?php endforeach;?>

      <?php if($node->field_file[0]['filepath']):?>
      <div class="workshop2">
        <h2><?=t('Activities downloadable as PDFs')?></h2>
        <div class="clr">
              
<?php
	foreach($node->field_file as $key => $file)
	{
		$filetype = end(explode(".", $file['filename']));
		$div_class = ($key % 3 == 2) ? 'three l' : 'three';
		
		if(($key % 3 == 0) && ($key != 0))
		{
			echo '<div class="clr">' . "\n";
		}		
		
		echo '<div class="' . $div_class . '">' . "\n";
		echo '<h5><a href="/' . $file['filepath'] . '" class="' . $filetype . '">' . $node->field_filename[$key]['value'] . '</a></h5>' . "\n";
		echo '<p>' . $node->field_file_description[$key]['value'] . '</p>' . "\n";	
		echo '</div>' . "\n";
		
		if ($key % 3 == 2 && $key != (count($node->field_file) - 1))
		{
			echo '</div>' . "\n";
		}		
	}
?>
        </div>   
      </div>
      <?php endif; ?>  

      <h2><?=t('Contact us')?></h2>
      <?php if($language == 'cz'):?>
        <p><?=t('Máte zájem o dílnu nebo jiný program na vaší škole?')?></p>
      <?php endif;?>
      <?=$contact_mail_form?>
