      
	  <? if ($language == "cz" ) { ?>
      <div class="counter2">
      <?  } else { ?>
      <div class="counter">
      <?  }?>
        <h1><?= $title ?></h1>
        <div class="intro">
          <p><?= $node->field_intro[0]['safe'] ?></p>
        </div>   
        
        <? if ($language == "cz" ): ?>
        <div class="number">
          <?php 
		    $titles = implode(', ', active_appeals_titles());
            $nr = db_result(db_query("SELECT COUNT(*) FROM {webform_submissions} WHERE nid=%d", 41));
            $appeals = t('appeals were sent');
          ?>
          <strong><?= $nr ?></strong><?= $appeals ?>
        </div>
        <? endif; ?>
         
      </div>

      <div class="clr">
        <div class="content content2">
          <?= $node->content['body']['#value'] ?>        
 
          <h2><?=t('Current appeals')?></h2>
          <?php $active = active_appeals(); ?>
          <?php if ($active):?>
            <?php echo $active ?>
          <?php else:?>           
            <p><?php echo t('There are currently no active urgent appeals.')?></p>
            <div class="btn mBot"><a href="<?php echo drupal_get_path_alias('node/7')?>"><?php echo t('Take other actions')?></a></div>
          <?php endif;?>
          <?php $finished = finished_appeals(); ?>
          <?php if($finished):?>
            <?php if (isset($node->field_apel)): ?>
              <?= $node->field_apel[0]['view'] ?>
            <?php endif;?>		  
            <?= $finished ?>          
          <?php endif;?>

        </div>
        <div class="col col2">
          <?php include('_document.php');?>		
        </div>
      </div>
