      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?php print date('j. n. Y', $created) ?></p>
      </div>      
      <div class="clr">
      <?= $node->content['body']['#value'] ?>
      <?php if($node->field_file_press_release[0]['filepath']):?>
      <a href="/<?= $node->field_file_press_release[0]['filepath'] ?>"><?=t('Download press release')?></a>
      <?php endif;?>
      </div>      
