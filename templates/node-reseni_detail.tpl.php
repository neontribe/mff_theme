      <div class="clr mBot">
        <div class="content">
          <h1><?= $title ?></h1>
          <div class="intro">
            <p><?= $node->field_intro[0]['safe'] ?></p>
          </div>
          <?= $node->content['body']['#value'] ?>

          <?php if($node->field_plus[0]['value'] || $node->field_minus[0]['value']):?>
          <h2><?=t('Solution?')?></h2>
          <div class="clr">
            <div class="left half2">
              <ul class="plus">
                <?= $node->field_plus[0]['view'] ?>
              </ul>
            </div>
            <div class="right half2">
              <ul class="minus">
                <?= $node->field_minus[0]['view'] ?>
              </ul>
            </div>
          </div>
          <?php endif;?>

        </div>
        <div class="col">
          <?php include('_life_at_plantation.tpl.php');?>
          <?php include('_document.php');?>
        </div>
      </div>
      <div class="clr">
      <?php include('_actions.tpl.php');?>
      </div>
