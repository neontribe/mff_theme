            <h2><?= t('Zapojte se') ?></h2>
            <ul>
              <li><a href="/zapojte-se/dobrovolnik"><span>Jako dobrovolník</span></a></li>
              <li><a href="/zapojte-se/apel"><span>Pošlete urgentní apel</span></a></li>
              <li><a href="/zapojte-se/lobujte"><span>Lobujte!</span></a></li>
              <li><a href="/zapojte-se/newsletter" id="JS_newsletter"><span>Odebírejte newsletter</span></a>
                <div id="JS_newsletter_box" class="newsBox" style="display:none;">
                  <div class="newsBox2">
                    <form action="" method="get">
                    <div class="search search2">
                      <label for="email" class="overlabel"><?=t('zadejte@email')?></label>
                      <input type="text" class="txt" value="" id="email" />
                      <input class="send" name="search" type="submit" value="registrovat" />
                    </div>
                    </form>
                  </div>
                </div>
              </li>
              <li><a href="/zapojte-se/skoly"><span>Jako škola</span></a></li>              
            </ul>
