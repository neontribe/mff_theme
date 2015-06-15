        <div class="action">
          <?php $get_involved = node_load(7); node_view($get_involved); ?>
          <a href="/<?=drupal_get_path_alias('node/7')?>">
            <?= theme('imagecache', 'img_280', $get_involved->field_picture[0]['filepath']) ?>
            <strong><span><?=get_title(7)?></span></strong>
          </a>
          <p><?= $get_involved->field_intro[0]['safe'] ?></p>
        </div>
        <div class="action">
          <?php $solution = node_load(8); node_view($solution); ?>
          <a href="/<?=drupal_get_path_alias('node/8')?>">
            <?= theme('imagecache', 'img_280', $solution->field_picture[1]['filepath']) ?>
            <strong><span><?=get_title(8)?></span></strong>
          </a>
          <p><?= $solution->field_intro[0]['safe'] ?></p>
        </div>
        <div class="action l">
          <?php $download = node_load(12); node_view($download); ?>
          <a href="/<?=drupal_get_path_alias('node/12')?>">
            <img src="<?=$image_path?>/sample/banany-download.jpg" alt="" />
            <strong><span><?=get_title(12)?></span></strong>
          </a>
          <p><?= $download->field_intro[0]['safe'] ?></p>
        </div>
