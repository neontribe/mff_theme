     <div class="clr">
        <div class="content">
          <h1><?= $title ?></h1>
          <div class="intro">
            <p><?= $node->field_intro[0]['safe'] ?></p>
          </div>
          <?= $node->content['body']['#value'] ?>
                    
          <h2><?=t('Contact us')?></h2>
          <?= $contact_mail_form ?>

        </div>
        
        <div class="col">
          <?php if($node->field_obrazek[0]['filepath']):?>
          <div class="img2">
            <?= $node->field_obrazek[0]['view'] ?>
          </div>
          <?php endif;?>
          
          <?php if($language == 'cz'):?>
            <?php include('_facebook_with_articles.tpl.php');?>
          <?php endif;?>
          
          <?= $node->field_right[0]['safe']?>
          <?php if($node->field_manual[0]['filepath']):?>
          <div class="pdf"><a href="/<?= $node->field_manual[0]['filepath']?>"><?=t('Download the guide')?></a></div>
          <?php endif;?>
        </div>
      </div>
