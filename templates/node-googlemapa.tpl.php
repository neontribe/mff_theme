      <h1><?= $title ?></h1>
      <div class="intro">
        <p><?= $node->field_intro[0]['safe'] ?></p>
      </div>
      <?= $node->content['body']['#value'] ?>
    
      <div class="gmap">
        <iframe width="880" height="460" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=http:%2F%2Fmaps.google.com%2Fmaps%2Fms%3Fhl%3Den%26ie%3DUTF8%26oe%3DUTF8%26msa%3D0%26output%3Dnl%26msid%3D<?=$gmap_id?>&amp;ll=16.972741,8.085938&amp;spn=112.313022,196.875&amp;z=2&amp;output=embed"></iframe>      
      </div>

      <div class="clr mBot">
        <div class="ico2 left banana">
          <?= t('Banana stories') ?>
        </div>
        <div class="ico2 left papple">
          <?= t('Pineapple stories') ?>
        </div>
        <div class="ico2 left organizations">
          <?= t('Organizations') ?>
        </div>		  
      </div>
