      <div class="clr">
        <div class="content">
          <h1><?= $title ?></h1>
          <div class="intro">
            <p><?= $node->field_intro[0]['safe'] ?></p>
          </div>
          <?= $node->content['body']['#value'] ?>
          
          <!--<h2><?= t('Lobby for change!') ?></h2>
          <div class="adr">
            <?= $node->field_address[0]['view'] ?>
          </div>
          <div class="apel">
            <?= $node->field_lobbing[0]['view'] ?>
          </div>
       
          <?php print drupal_get_form('webform_client_form_47', node_load(47), array(), TRUE, FALSE); ?>-->

        </div>
        <div class="col">
          <?php foreach($node->field_picture as $picture):?>
            <div class="img2"><?= $picture['view'] ?></div>		  
          <?php endforeach; ?>
          <!--
          <h2><?= t('More') ?></h2>
          <?= more_lobbing($node->nid) ?>
          -->
          <?php include('_document.php');?>		  
        </div>
      </div>
