      <div class="clr mBot">
        <div class="content">
          <h1><?= $title ?></h1>
          <div class="intro">
            <p><?= $node->field_intro[0]['safe'] ?></p>
          </div>
          <?= $node->content['body']['#value'] ?>
          <?php if($node->field_video[0]['safe']):?>
          <div class="mBot">
            <?= $node->field_video[0]['safe'] ?>
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
