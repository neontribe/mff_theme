      <div class="clr mBot">
        <div class="content">
          <h1><?= $title ?></h1>
          <div class="intro">
            <p><?= $node->field_intro[0]['safe'] ?></p>            
          </div>
          <?= $node->content['body']['#value'] ?>
        </div>
        <div class="col">
          <?php if($node->field_obrazek[0]['filepath']):?>
          <div class="img2">
            <?= $node->field_obrazek[0]['view'] ?>
          </div>
          <?php endif;?>
          <?php include('_life_at_plantation.tpl.php');?>
          <?php include('_document.php');?>			
        </div>
      </div>

      <div class="btop">
        <h2><a href="<?= drupal_get_path_alias('node/45') ?>"><?=t('Lobby for change!')?></a></h2>
        <!--<h2><?=t('Send urgent appeal!')?></h2>
        <div class="clr">
          <?= active_appeals_two_columns() ?>
        </div>-->
      </div>
