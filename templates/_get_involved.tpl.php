            <ul>
              <li><a href="/<?=drupal_get_path_alias('node/19')?>"><span><?=get_title(19)?></span></a></li>
              <li><a href="/<?=drupal_get_path_alias('node/45')?>"><span><?=get_title(45)?></span></a></li>
              <li><a href="/<?=drupal_get_path_alias('node/20')?>" id="JS_newsletter"><span><?=get_title(20)?></span></a>
                <div id="JS_newsletter_box" class="newsBox" style="display:none;">
                  <div class="newsBox2">
                    <div class="search search2">
                      <?= $subscription_form ?>
                    </div>
                    <!--- </form> -->
                  </div>
                </div>
              </li>
              <li><a href="/<?=drupal_get_path_alias('node/18')?>"><span><?=get_title(18)?></span></a></li>
              <?php if($language == 'cz'):?>
              <li><a href="/zapojte-se/skoly"><span>Jako škola</span></a></li>                          
              <?php endif;?>
            </ul>
