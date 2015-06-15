     <h1><?= $title ?></h1>
      <div class="clr">
        <div class="three three2">
          <?= $node->content['body']['#value'] ?>
        </div>
        <div class="three three3">
          <h2><?= t('Contact us') ?></h2>
          <?= $contact_mail_form ?>
        </div>
        <?php if($language == 'cz'):?>
        <div class="three l">
          <h2><?= t('Follow us on') ?></h2>
          <?php include('_facebook_without_articles.tpl.php');?>
        </div>
        <?php endif;?>
      </div>
