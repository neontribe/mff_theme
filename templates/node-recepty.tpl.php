      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>
      </div>

      <?php foreach($node->field_name as $key => $name): ?>
      <div class="recipe">
        <h2><?= $name['value'] ?></h2>
        <?= $node->field_description[$key]['safe'] ?>
        <div class="clr">
          <div class="three">
            <a href="" class="noBack"><?= theme('imagecache', 'img_280', $node->field_picture[$key]['filepath']) ?></a>
          </div>
          <div class="ingr three">
            <h3><?=t('Co potřebujeme?')?></h3>
            <?= $node->field_ingr[$key]['safe']?>
          </div>
          <div class="method three l">
            <h3><?=t('Jak na to?')?></h3>
            <p><?= $node->field_method[$key]['safe'] ?></p>
          </div>          
        </div>
      </div>
      <?php endforeach; ?>
