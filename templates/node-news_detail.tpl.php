          <div class="clr">
        <div class="content">
          <h1><?= $title ?></h1>
          <div class="intro">
            <p><?php print date('j. n. Y', $created) ?>: <?= $node->field_intro[0]['safe'] ?></p>
          </div>
          <?= $node->content['body']['#value'] ?>

            <?php
            if(isset($node->field_aktualita_fotogalerie[0])):
                $data = node_load($node->field_aktualita_fotogalerie[0]["nid"]);
                $photosOnRow = 2;
                $photos = $data->field_fotogalerie_fotky;
                
                require "_photogallery.php";
            endif;
            ?>

          <div class="pager clr">
            <div class="left"><?= prev_next_same_type($node->nid, 'prev') ?></div>
            <div class="right"><?= prev_next_same_type($node->nid, 'next') ?></div>
          </div>

        </div>
        <div class="col">
          <?php foreach($node->field_picture as $picture):?>
            <div class="img2"><?= $picture['view'] ?></div>
          <?php endforeach; ?>
          <?= $node->field_right[0]['safe'] ?>
          <?php include('_document.php');?>
        </div>
      </div>
