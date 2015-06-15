      <div class="clr">
      
        <div class="content">
          <script>
          $(document).ready(function() {
            $("#JS_otazky a").click(function() {
                $.scrollTo($("#"+$(this).attr("href").substr(1)),500);
                return false;
            })
            $("a.ftop").click(function() {
                $.scrollTo($("#"+$(this).attr("href").substr(1)),500);
                return false;
            })
          });
          </script>
          <h1><?= $title ?></h1>
          <div class="faqWrap">
            <ol id="JS_otazky">
            <?php foreach($node->field_question as $key => $question):?>
              <li><a href="#q<?= $key + 1?>"><?= $question['value'] ?></a></li>
            <?php endforeach; ?>
            </ol>
          </div>
          
          <h2><?=t('Answers')?></h2>
          <div class="results faq">
          <?php foreach($node->field_question as $key => $question):?>
            <div id="q<?= $key + 1 ?>">
              <a href="#JS_otazky" class="ftop"></a>
              <h2><?= $question['value'] ?></h2>
              <?= $node->field_answer[$key]['safe'] ?>
            </div>          
          <?php endforeach; ?>
          </div>
        </div>
        
        <div class="col">
          <h2><?=t('Send us your question')?></h2>
          <?= $contact_mail_form ?>
        </div>
        
      </div>
