      <div class="clr">
        <div class="content">
          <h1><?= $title ?></h1>		  
		  <?php if($node->field_active[0]['value'] >= time() && $node->field_mail[0]['value']):?>
          <div class="btn mBot">
            <a href="#apelform"><?= t('Take action now') ?></a>
          </div>
		  <?php endif;?>
          
          <div class="intro">
            <p><?= $node->field_intro[0]['safe'] ?></p>
          </div>
          <?php foreach($node->field_picture as $picture):?>
            <div class="img2"><?= $picture['view'] ?></div>	  
          <?php endforeach; ?>		  
          <?= $node->content['body']['#value'] ?>
          <h2><?= t('Send urgent appeal!') ?></h2>
          <!--<div class="adr">
            <?= $node->field_address[0]['view'] ?>
          </div>-->
          
          <?php if($node->field_apel[0]['value']):?>
          <h4><?= $node->field_apel_title[0]['value']?></h4>
          <div class="apel">
            <?= $node->field_apel[0]['view'] ?>
          </div>
          <?php endif;?>
          
          <?php if($node->field_solidarity_message[0]['value']):?>
          <h4><?= $node->field_solidarity_title[0]['value']?></h4> 
          <div class="apel">            
            <?= $node->field_solidarity_message[0]['view'] ?>
          </div>
          <?php endif;?>  
          
          <?php if($node->field_active[0]['value'] >= time() && $node->field_mail[0]['value']):?>
            <div id="apelform">
            <?php print drupal_get_form('webform_client_form_41', node_load(41), array(), TRUE, FALSE); ?>
            </div>
          <?php endif;?>         

        </div>
        <div class="col">
          <?php if(user_access('access administration pages')): ?>
            <?php
              $sql = "SELECT COUNT(data) FROM {webform_submitted_data} WHERE cid = 1 AND data = '%s'";
  $title = preg_replace("/[^a-zA-Z\!\: ]/", '', $title);
  print($title);
  $nr = db_result(db_query($sql, $title));

            ?>
            <h2 class="error">Sent <?php echo $nr?> times.</h2>
          <?php endif; ?>
		  <?php echo $node->field_right[0]['safe']; ?>
		  <?php if ($node->field_testimonial[0]['safe']):?>
		    <h2><?php echo $node->field_testimonial_title[0]['value'] ?></h2>
		    <?php foreach($node->field_testimonial as $key => $testimonial):?>
		      <div class="life">
		        <blockquote><?php echo $testimonial['safe'] ?> </blockquote>	
	   		    <p>— <?php echo $node->field_autor[$key]['value']; ?> —</p>
		      </div>
		    <?php endforeach;?>
		  <?php endif; ?>
		  <?php echo $node->field_right2[0]['safe']; ?>
          <?php if(more_appeals($node->nid)): ?>
            <h2><?php echo t('Other active appeals') ?></h2>
            <?php echo more_appeals($node->nid) ?>
          <?php endif;?>
          <?php include('_document.php');?>			
        </div>
      </div>
