<h1><?php echo $title ?></h1>
<div class="intro">
	<?php echo $node->field_intro[0]['safe'] ?>
</div>
<?php echo $node->content['body']['#value'] ?>

<?php if ($node->field_text[0][value]):?>
<div class="clr">
  <?php foreach($node->field_text as $key => $text):?>
  <div class="three<?php if ($key % 3 == 2) echo ' l'?>">
    <p><a href="<?php echo $node->field_link2[$key]['url']?>" target="_blank"><?php echo theme('imagecache', 'img_220', $node->field_logo[$key]['filepath'])?></a></p>
    <?php echo $text['safe'] ?>
  </div>
  <?php if ($key % 3 == 2):?>
    </div>	
    <div class="clr">
  <?php endif;?>
  <?php endforeach; ?>
</div>
<?php endif;?>