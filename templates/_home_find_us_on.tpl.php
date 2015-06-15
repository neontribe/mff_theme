<h2><?= $node->field_translation5[0]['value'] ?></h2>
<div class="clr ico">
    <?php if ($language == 'cz' || $language == 'fr' || $language == 'en'): ?>
    <a href="<?=$facebook_link?>"><img src="<?=$image_path?>/ico/facebook.png" alt=""/></a>
    <?php endif;?>
    <a href="/rss.xml"><img src="<?=$image_path?>/ico/rss.png" alt=""/></a>
    <?php if ($language == 'fr' || $language == 'en' || $language == 'cz'): ?>
    <a href="<?=$twitter_link?>"><img src="<?=$image_path?>/ico/twitter.png" alt=""/></a>
    <?php endif;?>
    <a href="http://www.flickr.com/photos/makefruitfair"><img src="<?=$image_path?>/ico/flickr.png" alt=""/></a>
    <a href="http://www.youtube.com/user/makefruitfair"><img src="<?=$image_path?>/ico/youtube.png" alt=""/></a>
    </div>
    <?php if ($language == 'fr'): ?>
    
    
    <?php elseif ($language == 'de'): ?>

    <?php  elseif ($language == 'cz'): ?>
    <!--<form id="paypalDonate" action="https://www.paypal.com/cgi-bin/webscr" method="post"><input name="cmd"
                                                                                                value="_s-xclick"
                                                                                                type="hidden"> <input
            name="hosted_button_id" value="TY8TE34SM3NEY" type="hidden"> <input
            alt="PayPal - The safer, easier way to pay online!" name="submit" src="<?=$image_path?>/ico/paypal.png"
            type="image"> <img src="https://www.paypal.com/en_US/i/scr/pixel.gif" alt="" border="0" height="1"
                               width="1"></form>-->
    <?php  else: ?>
   <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="image" src="<?=$image_path?>/ico/paypal.png" border="0" name="submit"
               alt="Make payments with PayPal - it's fast, free and secure!">
        <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                    ">
    </form>-->
    <?php endif;?>




