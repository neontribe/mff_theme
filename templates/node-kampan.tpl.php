      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>
      </div>

      <?php if($node->field_obrazek[0]['view']):?>
      <div class="img3">
        <?= $node->field_obrazek[0]['view'] ?>
      </div>
      <?php endif;?>
      
      <?= $node->content['body']['#value'] ?>
      
      <div class="btop">
        <h2><?=$node->field_translation1[0]['value']?></h2>

        <div class="clr">
          <div class="half left">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[0]['view'] ?>"><?= $node->field_logo[0]['view'] ?></a></div>
            <?= $node->field_text[0]['safe'] ?>
          </div>
          <div class="half right">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[1]['view'] ?>"><?= $node->field_logo[1]['view'] ?></a></div>
            <?= $node->field_text[1]['safe'] ?>
          </div>
        </div>
        <div class="clr">
          <div class="half left">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[2]['view'] ?>"><?= $node->field_logo[2]['view'] ?></a></div>
            <?= $node->field_text[2]['safe'] ?>
          </div>
          <div class="half right">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[3]['view'] ?>"><?= $node->field_logo[3]['view'] ?></a></div>
            <?= $node->field_text[3]['safe'] ?>
          </div>
        </div>
        <div class="clr">
          <div class="half left">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[4]['view'] ?>"><?= $node->field_logo[4]['view'] ?></a></div>
            <?= $node->field_text[4]['safe'] ?>
          </div>
          <div class="half right">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[5]['view'] ?>"><?= $node->field_logo[5]['view'] ?></a></div>
            <?= $node->field_text[5]['safe'] ?>
          </div>
        </div>
        <div class="clr">
          <div class="half left">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[6]['view'] ?>"><?= $node->field_logo[6]['view'] ?></a></div>
            <?= $node->field_text[6]['safe'] ?>
          </div>
          <div class="half right">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[7]['view'] ?>"><?= $node->field_logo[7]['view'] ?></a></div>
            <?= $node->field_text[7]['safe'] ?>
          </div>
        </div>
        <div class="clr">
          <div class="half left">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[8]['view'] ?>"><?= $node->field_logo[8]['view'] ?></a></div>
            <?= $node->field_text[8]['safe'] ?>
          </div>
          <div class="half right">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[9]['view'] ?>"><?= $node->field_logo[9]['view'] ?></a></div>
            <?= $node->field_text[9]['safe'] ?>
          </div>
        </div>
        <div class="clr">
          <div class="half left">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[10]['view'] ?>"><?= $node->field_logo[10]['view'] ?></a></div>
            <?= $node->field_text[10]['safe'] ?>
          </div>
          <div class="half right">
            <div class="plogo"><a class="kampan_partners" href="<?= $node->field_link2[11]['view'] ?>"><?= $node->field_logo[11]['view'] ?></a></div>
            <?= $node->field_text[11]['safe'] ?>
          </div>
        </div>

        <?= $node->field_text2[0]['safe'] ?>
      </div>      

      <div class="clr btop">
        <div class="half left">
          <h2><?=t('Get involved!')?></h2>
          <?= list_actions(t('Get involved!')) ?>
        </div>
        <div class="half right">
          <h2><?=t('Solutions?')?></h2>
          <?= list_actions(t('Solutions?')) ?>          
        </div>
      </div>
