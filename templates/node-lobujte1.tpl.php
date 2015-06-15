      <div class="counter">
        <h1><?= $title ?></h1>
        <div class="intro">
          <?= $node->field_intro[0]['safe'] ?>
        </div>  
             
        <!--  <div class="number"> -->
          <?php 
            $nr = db_result(db_query("SELECT COUNT(*) FROM {webform_submissions} WHERE nid=%d", 47));
            $appeals = t('sent');
          ?>
          <!--  <strong><?= $nr ?></strong><?= $appeals ?> 
        </div> --> 
       </div>

      <div class="clr">
        <div class="content content2">
          <?= $node->content['body']['#value'] ?>        
          
          <!--<h2><?=t('Listing')?></h2>-->
          <?php 
            $active = lobbing();
            echo $active ? $active : t('None');
          ?>       

        </div>
        <div class="col col2">
          <?php include('_life_at_plantation.tpl.php');?>
          <?php include('_document.php');?>					
        </div>
      </div>
