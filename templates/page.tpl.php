<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
  <title><?= $head_title ?></title>
  <?php print $head; ?>
  <link rel="stylesheet" type="text/css" media="screen,projection" href="<?=$theme_path?>/css/style.css?1" />
  <link rel="stylesheet" type="text/css" media="screen,projection" href="<?=$theme_path?>/css/<?=$language?>.css" />  
  <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="<?=$theme_path?>/css/ie6.css?1" media="screen,projection"><![endif]-->
  <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?=$theme_path?>/css/ie7.css?1" media="screen,projection"><![endif]-->
  <!--[if IE 8]><link rel="stylesheet" type="text/css" href="<?=$theme_path?>/css/ie8.css?1" media="screen,projection"><![endif]-->
  <link rel="stylesheet" type="text/css" media="print" href="<?=$theme_path?>/css/print.css?1" />
  <?php print $scripts ?>


    <script type="text/javascript" src="<?=$theme_path?>/highslide/highslide-with-gallery.packed.js"></script>
    <script type="text/javascript" src="<?=$theme_path?>/highslide/highslide.config.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="<?=$theme_path?>/highslide/highslide.css" />
    <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="<?=$theme_path?>/highslide/highslide-ie6.css" />
    <![endif]-->
    <script>
    hs.graphicsDir = '<?=$theme_path?>/highslide/graphics/';
    </script>

  
    <!-- Customized Google Analytics tracking code by H1.cz -->
    <script type="text/javascript" src="/analytics.js"></script>
    <script type="text/javascript"><!--
    _ga.create('<?=$ga_id?>', '<?=$ga_domain?>');
    _gaq.push(['_trackPageview', getPageUrl()]);
    //--></script>
  
</head>
<body>
  <div class="mainWrap">
  <div class="main">
    <div id="header">
      <div class="logo imgr">
        <?php if($is_front):?>
          <?=t('Make fruit fair')?><span></span>
        <?php else:?>
          <a href="/"><?=t('Make fruit fair')?><span></span></a>
        <?php endif;?>
      </div>      
      <div class="head imgr">
        <?=t('Campaigning for fair and sustainable banana and pineapple supplu chains')?><span></span>
      </div>
      
    <? 
      if ($language == "cz") {$lang_css = "lang_cz";}
      elseif ($language == "fr") {$lang_css = "lang_fr";}
      elseif ($language == "en") {$lang_css = "lang_en";}
      elseif ($language == "es") {$lang_css = "lang_es";}
      elseif ($language == "de") {$lang_css = "lang_de";}   
    ?>
            
      <div class="lang <? echo $lang_css; ?> ">        
        <span><?=t('Language')?>:</span>      
        <?php print choose_language($site_url, $base_url, $node->nid); ?>
      </div>      
      
      <div class="mm">   
        <?php print banany_primary_links($primary_links) ?>
      </div>
    </div>
    
    <?php if($is_front || $title == t('Page not found') || $title == ('Access Denied')):?>
      <?php print $content ?>     
    <?php else:?>    
    <div class="bread"> 
      <em><?=t('You are here')?>:</em>   
      <?= $breadcrumb ?>
      <?php //if($language != 'cz'): 
      
        if($language == 'cz') $kod = "cs_CZ";
        elseif($language == 'de') $kod = "de_DE";
        elseif($language == 'en') $kod = "en_US";
        elseif($language == 'fr') $kod = "fr_FR";
        else  $kod = "es_ES";
              
      ?>
        <div class="share">
          <script src="http://connect.facebook.net/<?php print $kod; ?>/all.js#xfbml=1"></script><fb:like action="like" layout="button_count" show_faces="false" ></fb:like>        
        </div>
      <?php //else:?>
        <!--<div class="share2">
          <script src="http://connect.facebook.net/cs_CZ/all.js#xfbml=1"></script><fb:like layout="button_count" action="recommend" font="arial"></fb:like>
        </div>-->
      <?php //endif;?>
    </div>    
    <div class="wrapper">
    <div class="wrapper2">
      <?php print $form_message ?>   
      <?php print $content ?>    
    </div>
    </div>
    <?php endif;?>
       
    <div class="footer">
      <div class="foot1">
        <div class="clr">
          <div class="links">
            <?php echo $footer_block; ?>
          </div>
          <?php //include('_find_out_more.tpl.php');?>
          <?php include('_partners.tpl.php');?>
        </div>
      </div>

      <div class="foot2">
        <div class="search">
          <?= drupal_get_form('search_theme_form') ?>  
        </div>
        <div class="eu">
          <p>
            <?=t('This website has been produced with the financial assistance of the European Union.  The contents of this website are the sole responsibility of Banana Link, Peuples Solidaires, BanaFair and NaZemi and can under no circumstances be regarded as reflecting the position of the European Union.');?>
            <?php if(user_access('administer nodes')): ?>      
              <br />
              <a href="<?php print $is_front ? '?q=node/1/edit' : '?q=node/'.$node->nid ?>/edit" title="<?= t('Edit page') ?>"> <?= t('Edit page') ?> </a>&nbsp;<a href="/admin/build/block/configure/block/1" title="<?= t('Edit footer') ?>"> <?= t('Edit footer') ?> </a>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </div>
    
  </div>
  </div>

  <?php if($language == 'cz'):?>
  <div id="fb-root"></div>
  <script type="text/javascript">
    var trackFacebook = 1;
  </script>
  <?php endif; ?>

</body>
</html>
