<?php

include('forms.php');

function banany_preprocess(&$vars)
{
    $site_url = array
    (
        'cz' => 'http://www.zaferovebanany.cz',
        //'fr' => 'http://www.lejustefruit.org',
        'en' => 'http://www.makefruitfair.org.uk',
        'es' => 'http://www.frutasjustas.org',
        'de' => 'http://www.makefruitfair.de',
        //'pl' => 'http://www.sprawiedliweowoce.eco.pl',
    );

    $node = $vars['node'];
    $vars['theme_path'] = base_path().path_to_theme();
    $vars['image_path'] = base_path().path_to_theme() . '/images';

    $vars['language'] = '';
    $vars['subscription_form'] = _all_subscription_form();
    global $base_url;
    switch($base_url)
    {
        case $site_url['cz']:
            $vars['language'] = 'cz';
            $vars['gmap_id'] = '114268701776743642278.000492d271fa2791098a6';
            $vars['facebook_page'] = 'Za-ferove-banany/103267693071751';
            $vars['facebook_lang_code'] = 'cs_CZ';
            $vars['twitter_user'] = 'nazemicz';
            $vars['ga_id'] = 'UA-19326578-1';
            $vars['ga_domain'] = '.zaferovebanany.cz';
            $vars['youtube_playlist_id'] = 'F870EDDBF76A1600';
            $vars['welcome_mail_id'] = 102;
            break;
        case $site_url['de']:
            $vars['language'] = 'de';
            $vars['gmap_id'] = '114268701776743642278.0004941812a397f2a7ac1';
            $vars['facebook_page'] = 'Make-Fruit-Fair/193437484011558';
            $vars['facebook_lang_code'] = 'de_DE';
            $vars['twitter_user'] = 'MakeFruitFair';
            $vars['ga_id'] = 'UA-19816940-1';
            $vars['ga_domain'] = '.makefruitfair.de';
            $vars['youtube_playlist_id'] = '4DAC3F688A55EE54';
            $vars['welcome_mail_id'] = 117;
            break;
        case $site_url['es']:
            $vars['language'] = 'es';
            $vars['gmap_id'] = '114268701776743642278.0004941807e7acf8cde5e';
            $vars['facebook_page'] = 'Make-Fruit-Fair/193437484011558';
            $vars['facebook_lang_code'] = 'es_ES';
            $vars['twitter_user'] = 'MakeFruitFair';
            $vars['ga_id'] = 'UA-20008779-1';
            $vars['ga_domain'] = '.frutasjustas.org';
            $vars['youtube_playlist_id'] = 'F0B4E3DC17F58EEF';
            $vars['subscription_form'] = _spanish_subscription_form();
            break;
        case $site_url['fr']:
            $vars['language'] = 'fr';
            $vars['gmap_id'] = '114268701776743642278.000494181ec05a8475b02';
            $vars['facebook_page'] = 'Le-Juste-Fruit/162552240447339';
            $vars['facebook_lang_code'] = 'fr_FR';
            $vars['twitter_user'] = 'LEJUSTEFRUIT';
            $vars['ga_id'] = 'UA-19816582-1';
            $vars['ga_domain'] = '.lejustefruit.org';
            $vars['youtube_playlist_id'] = '4A7D0EE8262A45BC';
            $vars['welcome_mail_id'] = 90;
            break;
        case $site_url['pl']:
            $vars['language'] = 'pl';
            $vars['gmap_id'] = '114268701776743642278.00049417d53b6a04176eb';
            $vars['facebook_page'] = 'Make-Fruit-Fair/193437484011558';
            $vars['facebook_lang_code'] = 'pl_PL';
            $vars['twitter_user'] = 'MakeFruitFair';
            $vars['youtube_playlist_id'] = '19C0387B9A85E7BC';
            $vars['welcome_mail_id'] = 119;
            break;
        case $site_url['en']:
        default:
            $vars['language'] = 'en';
            $vars['gmap_id'] = '114268701776743642278.00049417d53b6a04176eb';
            $vars['facebook_page'] = 'Make-Fruit-Fair/193437484011558';
            $vars['facebook_lang_code'] = 'en_US';
            $vars['twitter_user'] = 'MakeFruitFair';
            $vars['ga_id'] = 'UA-19994767-1';
            $vars['ga_domain'] = '.makefruitfair.org.uk';
            $vars['youtube_playlist_id'] = '19C0387B9A85E7BC';
            $vars['welcome_mail_id'] = 119;
    }

    $vars['site_url'] = $site_url;
    $vars['base_url'] = $base_url;
    $vars['twitter_link'] = 'http://twitter.com/' . $vars['twitter_user'];
    $vars['facebook_link'] = 'http://www.facebook.com/pages/' . $vars['facebook_page'];

    require_once drupal_get_path('module', 'contact') .'/contact.pages.inc';
    $contact_mail_form = drupal_get_form('contact_mail_page');

    $vars['contact_mail_form'] =  '<div class="form">' . "\n" . $contact_mail_form . '</div>';

    if($node->type == 'homepage')
    {
        //drupal_add_js("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
        drupal_add_js(drupal_get_path('theme', 'banany') . "/js/jquery.cycle.min.js");
        drupal_add_js(drupal_get_path('theme', 'banany') . "/js/label.js");
        drupal_add_js(drupal_get_path('theme', 'banany') . "/js/swfobject.js");
        drupal_add_js(drupal_get_path('theme', 'banany') . "/js/myswfobject.js");
    }

    if($node->type == 'homepage' || $node->type == 'apel3' || $node->type == 'newsletter')
    {
        drupal_add_js(drupal_get_path('theme', 'banany') . "/js/label.js");
    }

    if($node->type == 'faq')
    {
        drupal_add_js(drupal_get_path('theme', 'banany') . "/js/jquery.scrollTo-1.4.2-min.js");
    }

    if (isset($vars['css']['all']['module']))
    {
        unset($vars['css']['all']['module']);
    }
/*
    module_load_include('inc', 'simplenews', 'includes/simplenews.subscription');
    $subscription_form = drupal_get_form('simplenews_subscriptions_page_form');
    $subscription_form2 = '<label for="email" class="overlabel">' . t('you@email') . '</label> <input type="text" name="mail" id="email" value="" class="txt required" /> <input type="submit" name="op" id="edit-subscribe" value="' . t('register me') . '" class="sub send form-submit" />';
    $vars['subscription_form'] = str_replace('</form>', $subscription_form2.'</form>', $subscription_form);
*/

    if($node->type == 'homepage' && $vars['language'] == 'cz')
    {
        $vars['head_title'] = 'Za férové banány | fairtrade banány a ananasy';
    }
}

function _all_subscription_form() {
  return '<!-- Begin MailChimp Signup Form -->
  <link href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    #mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; }
    /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
  </style>
  <div id="mc_embed_signup">
  <form action="http://bananalink.us2.list-manage.com/subscribe/post?u=4d5eb6d994e7976c41b7bce54&amp;id=7e2079d5f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <!--- <h2>Subscribe to our mailing list</h2> --->
  <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
  <div class="mc-field-group">
    <label for="mce-FNAME">First Name  <span class="asterisk">*</span>
  </label>
    <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
  </div>
  <div class="mc-field-group">
    <label for="mce-LNAME">Last Name  <span class="asterisk">*</span>
  </label>
    <input type="text" value="" name="LNAME" class="required" id="mce-LNAME">
  </div>
  <div class="mc-field-group">
    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
  </label>
    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
  </div>
    <div id="mce-responses" class="clear">
      <div class="response" id="mce-error-response" style="display:none"></div>
      <div class="response" id="mce-success-response" style="display:none"></div>
    </div>  <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
  </form>
  </div>

  <!--End mc_embed_signup-->';
}

function _spanish_subscription_form() {
  return '<!-- Begin MailChimp Signup Form -->
<link href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
  #mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; }
  /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="http://bananalink.us2.list-manage2.com/subscribe/post?u=4d5eb6d994e7976c41b7bce54&amp;id=fb056be09a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
  <label for="mce-EMAIL">Dirección correo electrónico  <span class="asterisk">*</span>
</label>
  <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
 <div class="mc-field-group">
    <label for="mce-FNAME">Nombre  <span class="asterisk">*</span>
  </label>
    <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
  </div>
  <div class="mc-field-group">
    <label for="mce-LNAME">Apellidos  <span class="asterisk">*</span>
  </label>
    <input type="text" value="" name="LNAME" class="required" id="mce-LNAME">
  </div>

<div class="mc-field-group input-group">
    <strong>Email Format </strong>
    <ul><li><input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0"><label for="mce-EMAILTYPE-0">html</label></li>
<li><input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"><label for="mce-EMAILTYPE-1">text</label></li>
<li><input type="radio" value="mobile" name="EMAILTYPE" id="mce-EMAILTYPE-2"><label for="mce-EMAILTYPE-2">mobile</label></li>
</ul>
</div>
  <div id="mce-responses" class="clear">
    <div class="response" id="mce-error-response" style="display:none"></div>
    <div class="response" id="mce-success-response" style="display:none"></div>
  </div>  <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>
<script type="text/javascript">
var fnames = new Array();var ftypes = new Array();fnames[0]="EMAIL";ftypes[0]="email";fnames[1]="FNAME";ftypes[1]="text";fnames[2]="LNAME";ftypes[2]="text";
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName("head")[0];
if (!jqueryLoaded) {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js";
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == "complete") mce_preload_check();
        }    
    }
}
var script = document.createElement("script");
script.type = "text/javascript";
script.src = "http://downloads.mailchimp.com/js/jquery.form-n-validate.js";
head.appendChild(script);
var err_style = "";
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = "#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}";
}
var head= document.getElementsByTagName("head")[0];
var style= document.createElement("style");
style.type= "text/css";
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout("mce_preload_check();", 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout("mce_preload_check();", 250);
        return;
    }
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout("mce_preload_check();", 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: "mce_inline_error", errorElement: "div", onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind("submit");//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: "http://bananalink.us2.list-manage1.com/subscribe/post-json?u=4d5eb6d994e7976c41b7bce54&id=fb056be09a&c=?", type: "GET", dataType: "json", contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $("#mce_tmp_error_msg").remove();
                        $(".datefield","#mc_embed_signup").each(
                            function(){
                                var txt = "filled";
                                var fields = new Array();
                                var i = 0;
                                $(":text", this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(":hidden", this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {"value":1970};//trick birthdays into having years
                                        }
                                      if ( fields[0].value=="MM" && fields[1].value=="DD" && (fields[2].value=="YYYY" || (bday && fields[2].value==1970) ) ){
                                        this.value = "";
                      } else if ( fields[0].value=="" && fields[1].value=="" && (fields[2].value=="" || (bday && fields[2].value==1970) ) ){
                                        this.value = "";
                      } else {
                          if (/\[day\]/.test(fields[0].name)){
                                              this.value = fields[1].value+"/"+fields[0].value+"/"+fields[2].value;                         
                          } else {
                                              this.value = fields[0].value+"/"+fields[1].value+"/"+fields[2].value;
                                          }
                                      }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $("#mc-embedded-subscribe-form").ajaxForm(options);
      /*
 * Translated default messages for the jQuery validation plugin.
 * Locale: ES
 */
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});
      
    });
}
function mce_success_cb(resp){
    $("#mce-success-response").hide();
    $("#mce-error-response").hide();
    if (resp.result=="success"){
        $("#mce-"+resp.result+"-response").show();
        $("#mce-"+resp.result+"-response").html(resp.msg);
        $("#mc-embedded-subscribe-form").each(function(){
            this.reset();
      });
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(" - ",2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $("#mce-"+resp.result+"-response").show();
                $("#mce-"+resp.result+"-response").html(msg);            
            } else {
                err_id = "mce_tmp_error_msg";
                html = "<div> "+msg+"</div>";
                
                var input_id = "#mc_embed_signup";
                var f = $(input_id);
                if (ftypes[index]=="address"){
                    input_id = "#mce-"+fnames[index]+"-addr1";
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=="date"){
                    input_id = "#mce-"+fnames[index]+"-month";
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = "#mce-"+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $("#mce-"+resp.result+"-response").show();
                    $("#mce-"+resp.result+"-response").html(msg);
                }
            }
        } catch(e){
            $("#mce-"+resp.result+"-response").show();
            $("#mce-"+resp.result+"-response").html(msg);
        }
    }
}

</script>
<!--End mc_embed_signup-->
';
}

function banany_preprocess_page(&$vars)
{
    $vars['form_message'] = '';

    $messages = drupal_get_messages();
    $errors = form_get_errors();
    if($messages['fronta_ok'][0] || array_key_exists('fronta-odeslano', $_GET))
    {
        $vars['form_message'] = ok_message(t('Právě jste si rezervoval/a svoje místo ve frontě na banány - děkujeme! Brzy Vám emailem pošleme další informace a instrukce. Na viděnou ve frontě!'));
    }
    if($messages['contact_form_ok'][0] || array_key_exists('odeslano', $_GET))
    {
        $vars['form_message'] = ok_message(t('Thank you for your message. We will do our best to answer you as soon as possible.'));
    }

    if($messages['subscription_ok'][0] || array_key_exists('registrovano', $_GET))
    {
        $vars['form_message'] = ok_message(t('You have been successfully added to our mailing list to recieve future newsletters. Thank you!'));
    }

    else if($messages['status'][0])
    {
        $vars['form_message'] = ok_message($messages['status'][0]);
    }

    if($errors['error'])
    {
        $vars['form_message'] = error_message($errors['error']);
    }
}

function ok_message($message)
{
    return '<div class="ok">' . $message . '</div>';
}


function error_message($message)
{
    return '<div class="error">' . $message . '</div>';
}


function banany_primary_links($links, $attributes = array('class' => 'links'))
{
    $output = '';

    if (count($links) < 1)
        return $output;

    $output = '<ul>' . "\n";
    $i = 1;
    $last = (count($links));
    foreach ($links as $key => $link)
    {
        $class = $key;
        if (isset($link['href']) && $link['href'] == $_GET['q'])
            $class .= $_GET['q'] == 'node/7' ? ' f' : ' active';

        if($i == $last) {
            $class .= " mm-action";
        }

        $output .= '<li class="'. $class .'">';

        if (isset($link['href']))
        {
            $link['html'] = true;
            $output .= l($link['title'], $link['href'], $link);
        }

        else if (!empty($link['title']))
        {
            if (empty($link['html']))
            {
                $link['title'] = check_plain($link['title']);
            }

            $span_attributes = '';

            if (isset($link['attributes']))
            {
                $span_attributes = drupal_attributes($link['attributes']);
            }

            $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
        }

        $output .= "</li>\n";
        ++$i;
    }

    $output .= "</ul>\n";
    return $output;
}


function banany_menu_tree($breadtree)
{
    return "\n" . '<ul class="menu" id="map">'. "\n" . $tree .'</ul>';
}



function banany_find_more_links($links)
{
    $output = '';

    if (count($links) < 1)
        return $output;

    $output = '<ul>' . "\n";
    $i = 1;

    foreach ($links as $key => $link)
    {
        $output .= '<li>';

        if (isset($link['href']))
        {
            $link['html'] = true;
            $output .= l($link['title'], $link['href'], $link);
        }

        else if (!empty($link['title']))
        {
            if (empty($link['html']))
            {
                $link['title'] = check_plain($link['title']);
            }
        }

        $output .= "</li>\n";

        if($i == 4)
        {
            $output .= "\n</ul>\n<ul>\n";
        }

        else if($i == 7)
        {
            $output .= "</ul>\n" . '<ul class="l">' . "\n";
        }

        ++$i;
    }

    $output .= "</ul>\n";
    return $output;
}


function banany_breadcrumb($breadcrumb)
{
    $_ = '';
    
    $length = strlen(t('Make fruit fair!'));

    $breadcrumb[0] = '<a href="/">' . t('Make fruit fair!') . '</a>';

    foreach($breadcrumb as $key => $b)
    {
        if(!strstr($b,"href=")) {
            continue;
        }
        if (preg_match('/href="([^"]*)"/i', $b , $regs))
        {
            $bread_path = $regs[1];
        }

        $node_path = base_path() . drupal_get_path_alias('node/' . arg(1));

        if($bread_path != $node_path)
        {
            $_ .= $b;
            //$length += strlen(drupal_get_title());
            $normal_path = drupal_get_normal_path(substr($bread_path,1));
            if (preg_match('/node/i', $normal_path , $regs))
            {
                $nid = $regs[0];
                //print_r($regs);
            }
            //print $bread_path;
            //print get_nid_from_normal_path($normal_path) . ' ';
            //print drupal_get_title() . '; ' . $length . " \n";
        }
    }


    $_ .= '<strong>' . trim_text(drupal_get_title(), 60) . '</strong>';
    return $_;
}



function prev_next_same_type($nid = null, $direction = null)
{
    if($nid)
    {
        $node = node_load($nid);
        $type = $node->type;
        $created = $node->created;

        switch ($direction)
        {
            case 'next':
                $modifier = ">";
                $order = "ASC";
                break;
            case 'prev':
            default:
                $modifier = "<";
                $order = "DESC";
        }

        $sql = "SELECT nid FROM {node} WHERE type = '%s' AND nid != %d AND nid " . $modifier . " %d ORDER BY created %s, nid %s";
        $query = db_query($sql, $type, $nid, $nid, $order, $order);

        $item = db_fetch_object($query);
        $node_same_type = node_load($item->nid);

        $nav_nid = $node_same_type->nid;
        $nav_title = $node_same_type->title;
        $path = $node_same_type->path;

        if($nav_nid)
        {
            if($direction == 'prev')
            {
                return '<a href="/' . $path . '" class="prev">' . $nav_title . '</a>';
            }
            else
            {
                return '<a href="/' . $path . '" class="next">' . $nav_title . '</a>';
            }
        }
    }
}


function news_teaser_home($date, $image, $title, $intro, $path)
{
    $_ = '';

    $_ .= '<div class="home-news">' . "\n";
    $_ .= '<a href="' . $path . '">' . "\n";
    $_ .=  $image . "\n";
    $_ .=  '<span>' . $date . '</span>' . "\n";
    $_ .= '<div class="home-news-nadpis">' . $title . '</div>' . "\n";
    $_ .= '</a>' . "\n";
    $_ .= '</div>' . "\n";

    return $_;
}

function news_teaser($date, $image, $title, $intro, $path)
{
    $_ = '';

    $_ .= '<div class="post clr">' . "\n";
    $_ .= '<div class="img"><a href="' . $path . '">' . $image . '</a></div>' . "\n";
    $_ .= '<div class="ptext"><h3><a href="' . $path . '">' . $title . '</a></h3><p><span>' . $date . ':</span> ' . $intro . '</p></div>' . "\n";
    $_ .= '</div>' . "\n";

    return $_;
}


function latest_news($limit = 10, $home = true)
{
    $_ = '';

    $count = "SELECT COUNT(*) FROM {node} WHERE type='news_detail'";
    $nr = db_result(db_query($count));

    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    if ($page < 1 || ($page - 1) * $limit >= $nr)
    {
        $page = 1;
    }

    $start_pos = $nr < $limit ? 0 : $limit * ($page - 1);
    $limit_str = $start_pos . ', ' . $limit;
    $max_page = ceil($nr / $limit);

    $type = 'news_detail';
    $sql = "SELECT * FROM {node} WHERE type = 'news_detail' ORDER BY created DESC LIMIT %s";

    $result = db_query($sql, $limit_str);

    while ($row = db_fetch_object($result))
    {
        $news = node_load($row->nid);
        if ($news->status == 1)
        {
            $date = date('j. n. Y', $news->created);

            if($news->field_picture[0]['filepath'])
            {
                $image = theme('imagecache', 'img_91', $news->field_picture[0]['filepath']);
            }
            else
            {
                $image = '<img src="'.base_path().path_to_theme().'/images/banany-sample.gif" />';
            }

            $title = $news->title;
            $intro = $news->field_intro[0]['value'];
            $path = $news->path;

            if($home) {
                $_ .= news_teaser_home($date, $image, $title, $intro, $path);
            }
            else {
                $_ .= news_teaser($date, $image, $title, $intro, $path);
            }
        }
    }

    if(!$home && $nr > $limit)
    {
        $_ .= '<div class="pager"><span>' . t('Pagination') . ':</span>';

        if ($page - 1 >= 1)
        {
            $_ .=  '<a href="?page=' . ($page - 1) . '" class="prev">' . t('previous') . '</a>';
        }

        for($i = 1; $i <= $max_page; $i++)
        {
            if ($i == $page)
            {
                $_ .= '<b>' . $page . '</b>';
            }
            else
            {
                $_ .= '<a href="?page=' . $i . '">' . $i . '</a>';
            }
        }

        if ($page + 1 <= $max_page)
        {
            $_ .=  '<a href="?page=' . ($page + 1) . '" class="next">' . t('next') . '</a>';
        }
        $_ .= '</div>';
    }

    return $_;
}


function three_images($images)
{
    $_ = '';

    if(!$images[0]['filepath'])
    {
        return $_;
    }

    foreach($images as $key => $image)
    {
        $div_class = ($key % 3 == 2) ? 'three l' : 'three';

        if($key % 3 == 0)
        {
            $_ .= '<div class="clr">' . "\n";
        }

        $_ .= '<div class="' . $div_class . '">' . "\n";
        $_ .= $image['view'];
        $_ .= '</div>' . "\n";

        if (($key % 3 == 2) || ($key == count($images) - 1))
        {
            echo '</div>' . "\n";
        }
    }

    return $_;
}


function list_item($title, $path, $image, $div_class, $text = '')
{
    $_ = '';

    if(strpos($path,'http') === false)
    {
        $path = '/' . $path;
    }

    $_ .= '<div class="post clr">' . "\n";
    $_ .= '<div class="img"><a href="' . $path . '">' . $image . '</a></div>' . "\n";
    $_ .= '<div class="' . $div_class . '">';
    $_ .= '<h3><a href="' . $path . '">' . $title . '</a></h3>';

    if($text)
    {
        $_ .= '<p>' . $text . '</p>';
    }

    $_ .= "</div>\n</div>\n";

    return $_;
}


function more_appeals($nid)
{
    $_ = '';

    $type = 'apel2';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' ORDER BY created DESC";
    $result = db_query($sql, $type);

    if(mysql_num_rows($result) <= 1)
    {
        return;
    }

    while($row = db_fetch_array($result))
    {
        if($row['nid'] == $nid)
            continue;

        $node = node_load($row['nid']);

        if($node->field_active[0]['value'] < time())
            continue;

        $image = theme('imagecache', 'img_91', $node->field_picture[0]['filepath']);

        $_ .= list_item($node->title, $node->path, $image, 'ptext');
    }

    return $_;
}


function more_lobbing($nid)
{
    $_ = '';

    $type = 'lobujte2';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' ORDER BY created DESC";
    $result = db_query($sql, $type);

    if(mysql_num_rows($result) <= 1)
    {
        return '<p>' . t('Not available.') . '</p>';
    }

    while($row = db_fetch_array($result))
    {
        if($row['nid'] == $nid)
            continue;

        $node = node_load($row['nid']);
        $image = theme('imagecache', 'img_91', $node->field_picture[0]['filepath']);
        $_ .= list_item($node->title, $node->path, $image, 'ptext');
    }

    return $_;
}


function active_appeals()
{
    $_ = '';

    $type = 'apel2';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' ORDER BY created DESC";
    $result = db_query($sql, $type);

    while($row = db_fetch_array($result))
    {
        $node = node_load($row['nid']);
        node_view($node);

        if($node->field_active[0]['value'] <= time())
            continue;

        if (isset($node->field_picture[0]['filepath']))
        {
            $image = theme('imagecache', 'img_91', $node->field_picture[0]['filepath']);
        }
        else
        {
            $image = '<img src="'.base_path().path_to_theme().'/images/banany-sample.gif" />';
        }

        $_ .= list_item($node->title, $node->path, $image, 'ptext ptext2', $node->field_intro[0]['safe']);
    }

    return $_;
}


function active_appeals_titles()
{
    $_ = array();

    $type = 'apel2';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' ORDER BY created DESC";
    $result = db_query($sql, $type);

    while($row = db_fetch_array($result))
    {
        $node = node_load($row['nid']);

        if($node->field_active[0]['value'] <= time())
            continue;

        $_[] = "'$node->title'";
    }

    return $_;
}


function lobbing()
{
    $_ = '';

    $type = 'lobujte2';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' ORDER BY created DESC";
    $result = db_query($sql, $type);

    while($row = db_fetch_array($result))
    {
        $node = node_load($row['nid']);
        node_view($node);
        $image = theme('imagecache', 'img_91', $node->field_picture[0]['filepath']);
        $_ .= list_item($node->title, $node->path, $image, 'ptext ptext2', $node->field_intro[0]['safe']);
    }

    return $_;
}


function active_appeals_two_columns()
{
    $_ = '';

    $type = 'apel2';
    $sql = "SELECT * FROM {node} WHERE type = '%s' ORDER BY created DESC";
    $count = "SELECT COUNT(*) FROM {node} WHERE type='%s'";
    $nr = db_result(db_query($count, $type));
    $result = db_query($sql, $type);

    $half = floor(($nr / 2) + 0.5);
    $i = 0;

    $_ .= '<div class="half left">' . "\n";
    while($row = db_fetch_array($result))
    {            
        $node = node_load($row['nid']);

        //if($node->field_active[0]['value'] <= time())
        //    continue;

        if($i == $half)
        {
            $_ .= '<div class="half right">' . "\n";
        }

        $image = theme('imagecache', 'img_91', $node->field_picture[0]['filepath']);
        $_ .= list_item($node->title, $node->path, $image, 'ptext', $node->field_intro[0]['value']);

        if(($i + 1) == $half)
        {
            $_ .= '</div>' . "\n";
        }
        $i++;
    }
    $_ .= '</div>';

    return $_;
}


function finished_appeals()
{
    $_ = '';

    $type = 'apel2';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' AND status = 1 ORDER BY created DESC";
    $result = db_query($sql, $type);

    $_ .= '<ul>' . "\n";

    while($row = db_fetch_array($result))
    {
        $node = node_load($row['nid']);

        if($node->field_active[0]['value'] > time())
            continue;

        $image = theme('imagecache', 'img_91', $node->field_picture[0]['filepath']);
        $_ .= '<li><a href="/' . $node->path . '">' . $node->title . '</a></li>' . "\n";
    }

    $_ .= '</ul>' . "\n";

    return $_;
}


function list_actions($title)
{
    $_ = '';

    $sql = "SELECT nid FROM {node} WHERE title = '%s' LIMIT 1";
    $result = db_query($sql, $title);

    $_ .= '<ul>' . "\n";

    $row = db_fetch_array($result);
    $node = node_load($row['nid']);

    foreach($node->field_name as $key => $name)
    {
        $link = $node->field_link[$key]['value'];
        $image = theme('imagecache', 'img_91', $node->field_picture[$key]['filepath']);
        $description = $node->field_description[$key]['value'];
        $_ .= list_item($name['value'], $link, $image, 'ptext', $description);
    }

    return $_;
}


function random_story()
{
    $_ = '';

    $type = 'stories';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' LIMIT 1";
    $result = db_query($sql, $type);

    $row = db_fetch_array($result);
    $node = node_load($row['nid']);

    srand(time());
    $rand = rand(0, count($node->field_name) - 1);

    if($node->field_photo[$rand]['filepath'])
    {
        $_ .= '<div class="img3">' . theme('imagecache', 'img_91', $node->field_photo[$rand]['filepath']) . '</div>' . "\n";
    }
    $_ .= '<blockquote>' . $node->field_text[$rand]['value'] . '</blockquote>' . "\n";
    $_ .= '<p>— ' . $node->field_name[$rand]['value'] . ' —</p>' . "\n";

    return $_;
}


function random_did_you_know()
{
    $_ = '';

    $type = 'know';
    $sql = "SELECT nid FROM {node} WHERE type = '%s' LIMIT 1";
    $result = db_query($sql, $type);

    $row = db_fetch_array($result);
    $node = node_load($row['nid']);

    srand(time());
    $rand = rand(0, count($node->field_know) - 1);

    $_ .= '<p>' . $node->field_know[$rand]['value'] . '</p>';

    return $_;
}

function get_photogaleries()
{
    $_ = '';

    $type = 'fotogalerie';
    $sql = "SELECT nid FROM {node} WHERE type = '%s'";
    $result = db_query($sql, $type);
    $f = array();
    while($row = db_fetch_array($result))
    {
        $f[] = node_load($row['nid']);



    }


    return $f;
}



function photo_description_by_language($description, $language)
{
    // format: EN / DE / CZ / ES / FR
    $description_by_lang = explode('/', $description);
    $index = 0;

    switch ($language)
    {
        case 'de':
            $index = 1;
            break;
        case 'cs':
        case 'cz':
            $index = 2;
            break;
        case 'es':
            $index = 3;
            break;
        case 'fr':
            $index = 4;
            break;
        case 'en':
        default:
            $index = 0;
            break;
    }

    if (!isset($description_by_lang[$index]))
    {
        return isset($description_by_lang[0]) ? $description_by_lang[0] : '';
    }
    else
    {
        return $description_by_lang[$index];
    }
}


function flickr_photos($user_id, $limit = 15, $language)
{
    $_ = '';

    // Create API URL
    $params = array
    (
        'api_key'     => '92535b834a920484bf07a8cebd46b6d5',
        'method'      => 'flickr.photos.search',
        'user_id'     => $user_id,
        'sort'        => 'interestingness_desc',
        'format'      => 'php_serial',
        'extras'      => 'description',
    );

    $encoded_params = array();

    foreach ($params as $k => $v)
    {
        $encoded_params[] = urlencode($k).'='.urlencode($v);
    }

    // Open API URL and decode response as PHP values
    $url = 'http://api.flickr.com/services/rest/?'.implode('&', $encoded_params);

    $rsp = file_get_contents($url);
    $rsp_obj = unserialize($rsp);//print_r($rsp_obj);
    $count = count($rsp_obj['photos']['photo']);

    // HTML output
    //$_ .= '<div class="clr flickr">' . "\n";
    $_ .= '<div class="clr flickr2">' . "\n";
    for ($i = 0; $i <= $limit -1; $i++)
    {
        // Each array 'photo' in array 'photos' is given the index $i which is increased by 1 each run
        $photo = $rsp_obj['photos']['photo'][$i];

        $flickr_description = $rsp_obj['photos']['photo'][$i]['description']['_content'];
        //$description = "";
        $description = photo_description_by_language($flickr_description, $language);

        // Picture-Url
        $purl = 'http://farm'.$photo['farm'].'.'.'static'.'.'.'flickr.com/'.$photo['server'].'/'.$photo['id'].'_'.$photo['secret'].'_s.jpg';

        // Flickr-Url
        $furl = 'http://www.flickr.com/photos/'.$photo['owner'].'/'.$photo['id'].'/';

        // Link-URL
        $lurl = '<a href="'.$furl.'" target="_blank">'.'<img alt="'.$photo['title'].'" src="'.$purl.'" /><span>' . $photo['title'] . '</span></a>';

        if($i % 2 == 0 && $i != 0)
        {
            $_ .= '<div class="clr flickr2">' . "\n";
        }

        $position = $i % 2 ? 'right' : 'left';

        $_ .= '<div class="' . $position . '">' . "\n";
        $_ .= '<a href="'.$furl.'" target="_blank">'.'<img alt="'.$photo['title'].'" src="'.$purl.'" title="'.$photo['title'].'" /></a>' . "\n";
        $_ .= '<p>' . $description . '</p>' . "\n";
          $_ .= '</div>' . "\n";

        if($i % 2 == 1 && $i != $limit - 1)
        {
            $_ .= '</div>' . "\n";
        }

        if($count == $i + 1)
        {
            //$_ .= '</div>' . "\n";
            break;
        }
    }
    $_ .= '</div>' . "\n";

    return $_;
}

function flickr_photos_homepage($user_id, $limit = 15, $language)
{
    $_ = '';

    // Create API URL
    $params = array
    (
        'api_key'     => '92535b834a920484bf07a8cebd46b6d5',
        'method'      => 'flickr.photos.search',
        'user_id'     => $user_id,
        'sort'        => 'interestingness_desc',
        //'format'      => 'php_serial',
        'extras'      => 'description',
    );

    $encoded_params = array();

    foreach ($params as $k => $v)
    {
        $encoded_params[] = urlencode($k).'='.urlencode($v);
    }

    // Open API URL and decode response as PHP values
    $url = 'https://api.flickr.com/services/rest/?'.implode('&', $encoded_params);
    //echo $url;exit;
    //$rsp = file_get_contents($url);
    $rsp = simplexml_load_file($url);
    //var_dump($rsp);exit;
    $json_obj = json_encode($rsp);
    $rsp_obj = json_decode($json_obj, true);
    //print_r($rsp_obj);exit;
    $count = count($rsp_obj['photos']['photo']);

    // HTML output
    //$_ .= '<div class="clr flickr">' . "\n";
    $_ .= '<div class="clr">' . "\n";
    for ($i = 0; $i < $limit; $i++)
    {
        // Each array 'photo' in array 'photos' is given the index $i which is increased by 1 each run
        $photo = $rsp_obj['photos']['photo'][$i]['@attributes'];
        //print_r($photo);
        $flickr_description = $rsp_obj['photos']['photo'][$i]['description'];
        $description = photo_description_by_language($flickr_description, $language);
        //$description = "";
        // Picture-Url
        $purl = 'https://farm'.$photo['farm'].'.'.'static'.'.'.'flickr.com/'.$photo['server'].'/'.$photo['id'].'_'.$photo['secret'].'_s.jpg';
        // Flickr-Url
        $furl = 'https://www.flickr.com/photos/'.$photo['owner'].'/'.$photo['id'].'/';
        // Link-URL
        $lurl = '<a href="'.$furl.'" target="_blank">'.'<img alt="'.$photo['title'].'" src="'.$purl.'" /><span>' . $photo['title'] . '</span></a>';

        $class = "";
        if($i % 3 == 2) {
            $class = "l";
        }

        $_ .= '<div class="'.$class.'">' . "\n";
        $_ .= '<a href="'.$furl.'" target="_blank">'.'<img alt="'.$photo['title'].'" src="'.$purl.'" title="'.$photo['title'].'" /></a>' . "\n";
        $_ .= '</div>' . "\n";


    }
    $_ .= '</div>' . "\n";

    return $_;
}


function youtube_videos($user = 'makefruitfair', $limit = 5, $playlist_id = '19C0387B9A85E7BC')
{
    $_ = '';

    require_once('php/simplepie.inc');
    //$feed = new SimplePie('http://gdata.youtube.com/feeds/api/users/' . $user . '/uploads');
    $feed = new SimplePie('http://gdata.youtube.com/feeds/api/playlists/' . $playlist_id);
    $feed->enable_cache(false);
    $feed->handle_content_type();

    $YT_PlayerPage = "http://www.youtube.com/user/" . $user . "#play/uploads/";

    $video_nr = 0;

    if(!$feed->get_items())
    return '<p>' . t('There are not any films currently available.') . '</p>';

    $videos = array();
    foreach($feed->get_items() as $item)
    {
        $enclosure = $item->get_enclosure();

        if ($enclosure)
        {
            $permalink = urldecode($item->get_permalink());
            $YT_VidID = substr(strstr($permalink, 'v='), 2, 11);

            $video_feed_url = "http://gdata.youtube.com/feeds/api/videos?vq=" . $YT_VidID;
            $video_xml = simplexml_load_file($video_feed_url);

            $href = $YT_PlayerPage . $video_nr . "/" . $YT_VidID;
            $title = $item->get_title();
            $published = strtotime($video_xml->entry->published);
            $img_src = $enclosure->get_thumbnail();
            $description = $item->get_description();
            //$categories = $item->get_categories();

            $videos[$published] = array
            (
                    'title' => $title,
                    'date' => $published,
                    'href' => $href,
                    'description' => $description,
                    'thumbnail' => $img_src,

            );
        }
    }

    krsort($videos);
    $i = 0;

    foreach($videos as $video)
    {
        if ($i >= $limit)
        {
            break;
        }

        $_ .= '<div class="post clr">' . "\n";
        $_ .= '<div class="img">' . "\n";
        $_ .= '<a href="' . $video['href'] . '" title="' . $video['title'] . '" target="_blank"> <img src="' . $video['thumbnail'] . '" width="91px"/></a>';
        $_ .= '</div>' . "\n";
        $_ .= '<div class="ptext">' . "\n";
        $_ .= '<h3><a href="' . $video['href'] . '" target="_blank">' . $video['title'] . '</a></h3>';

        if($description)
            $_ .= '<p><span>' . date('j. n. Y', $video['date']) .':</span> ' . $video['description'] . '</p>';
        else
            $_ .= '<p><span>' . date('j. n. Y', $video['date']) . '</span></p>';

        $_ .= '</div>' . "\n";
        $_ .= '</div>' . "\n";

        $i++;
    }

    return $_;
}


function youtube_videos_homepage($user = 'makefruitfair', $playlist_id = '19C0387B9A85E7BC',$custom_video_id = "")
{
    $_ = '';

    if($custom_video_id == "") {
        require_once('php/simplepie.inc');
        //$feed = new SimplePie('http://gdata.youtube.com/feeds/api/users/' . $user . '/uploads');
        $feed = new SimplePie('http://gdata.youtube.com/feeds/api/playlists/' . $playlist_id);
        $feed->enable_cache(false);
        $feed->handle_content_type();

        $YT_PlayerPage = "http://www.youtube.com/user/" . $user . "#play/uploads/";

        $video_nr = 0;

        if(!$feed->get_items())
        return '<p>' . t('There are not any films currently available.') . '</p>';

        $videos = array();
        foreach($feed->get_items() as $item)
        {
            $enclosure = $item->get_enclosure();

            if ($enclosure)
            {
                $player = $enclosure->get_player();
                $permalink = urldecode($item->get_permalink());
                $YT_VidID = substr(strstr($permalink, 'v='), 2, 11);


                $video_feed_url = "http://gdata.youtube.com/feeds/api/videos?vq=" . $YT_VidID;
                $video_xml = simplexml_load_file($video_feed_url);

                $href = $YT_PlayerPage . $video_nr . "/" . $YT_VidID;
                $title = $item->get_title();
                $published = strtotime($video_xml->entry->published);
                $img_src = $enclosure->get_thumbnail();
                $description = $item->get_description();
                //$categories = $item->get_categories();

                $videos[$published] = array
                (
                        'title' => $title,
                        'date' => $published,
                        'href' => $href,
                        'id' => $YT_VidID,
                        'player' => $player,
                        'description' => $description,
                        'thumbnail' => $img_src,

                );
            }
        }


        krsort($videos);
        $i = 0;
        $video = array_shift($videos);
        $video_id = $video["id"];

    }
    else {
        $video_id = $custom_video_id;
    }

    $_ = '<iframe width="430" height="321" src="http://www.youtube.com/embed/'.$video_id.'" frameborder="0" allowfullscreen></iframe>';


    return $_;
}


function banany_pager($tags = array(), $limit = 10, $element = 0, $parameters = array(), $quantity = 9)
{
    global $pager_page_array, $pager_total;

    $pager_middle = ceil($quantity / 2);
    $pager_current = $pager_page_array[$element] + 1;
    $pager_first = $pager_current - $pager_middle + 1;
    $pager_last = $pager_current + $quantity - $pager_middle;
    $pager_max = $pager_total[$element];

    $i = $pager_first;

    if ($pager_last > $pager_max)
    {
        $i = $i + ($pager_max - $pager_last);
        $pager_last = $pager_max;
    }

    if ($i <= 0)
    {
        $pager_last = $pager_last + (1 - $i);
        $i = 1;
    }

    $previous = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('previous')), $limit, $element, 1, $parameters);
    $previous = str_replace('">',' prev">',$previous);
    $next = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('next')), $limit, $element, 1, $parameters);
    $next = str_replace('">',' next">',$next);

    if ($pager_total[$element] > 1)
    {
        $output =  '';
        $output .= '<div class="pager">' . "\n";
        $output .= t('Pagination') . ": \n";
        if ($previous)
            $output .= $previous . "\n";

        if ($i != $pager_max)
        {
            if ($i > 1)
            $output .= '…';

            for (; $i <= $pager_last && $i <= $pager_max; $i++)
            {
                if ($i < $pager_current)
                    $output .= theme('pager_previous', $i, $limit, $element, ($pager_current - $i), $parameters) . "\n";

                if ($i == $pager_current)
                    $output .= '<b>' . $i . '</b>' . "\n";

                if ($i > $pager_current)
                    $output .= theme('pager_next', $i, $limit, $element, ($i - $pager_current), $parameters) . "\n";
            }

            if ($i < $pager_max)
            $output .= '…';
        }

        if ($next)
            $output .= $next . "\n";

        $output .= '</div>';
        return $output;
    }
}


function trim_text($input, $length)
{
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length)
    {
        $input = str_replace('<p>','',$input);
        $input = str_replace('</p>','',$input);
        return $input;
    }

    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
    $trimmed_text = str_replace('<p>','',$trimmed_text);
    $trimmed_text = str_replace('</p>','',$trimmed_text);

    if (strripos($trimmed_text, '<a'))
    {
        $begin = strripos($trimmed_text, '<a');
        $end = strripos($trimmed_text, '</a>');

        if($end === false || $end < $begin)
        {
            $trimmed_text = substr($trimmed_text, 0, $begin);
        }
    }

    return $trimmed_text . '…';
}


function choose_language($site_url, $base_url, $nid = '')
{
    $_ = '';

    foreach($site_url as $lang => $url)
    {
        $lang_title = strtoupper($lang);
        if($url == $base_url)
        {
            $_ .= "<b>$lang_title</b>\n";
        }
        /*else if($nid)
        {
            $_ .= '<a href="'.$url.'/node/'.$nid.'">' . $lang_title . '</a>' . "\n";
        }*/
        else
        {
            $_ .= '<a href="'.$url.'">' . $lang_title . '</a>' . "\n";
        }
    }

    return $_;
}

function get_title($nid)
{
    return db_result(db_query('SELECT title FROM {node} WHERE nid = %d AND status = 1',$nid));
}

function get_nid_from_normal_path($path)
{
    return db_result(db_query('SELECT pid FROM {url_alias} WHERE src = %d', $path));
}


function sitemap($tree)
{
    $output = '';
    $items = array();

    // Pull out just the menu items we are going to render so that we
    // get an accurate count for the first/last classes.
    foreach ($tree as $data)
    {
        if (!$data['link']['hidden'])
        {
            $items[] = $data;
        }
    }

    $num_items = count($items);
    foreach ($items as $i => $data)
    {
        $extra_class = array();
        if ($i == 0)
        {
            $extra_class[] = 'first';
        }
        if ($i == $num_items - 1)
        {
            $extra_class[] = 'last';
        }
        $extra_class = implode(' ', $extra_class);
        $link = theme('menu_item_link', $data['link']);
        if ($data['below'])
        {
            //$output .= theme('menu_item', $link, $data['link']['has_children'], menu_tree_output($data['below']), $data['link']['in_active_trail'], $extra_class);
            $output .= '<li>' . $link . sitemap($data['below']) . '</li>';
        }
        else
        {
            $output .= theme('menu_item', $link, $data['link']['has_children'], '', $data['link']['in_active_trail'], $extra_class);
        }
    }

    return '<ul id="map">' . $output. '</ul>';
}

function get_photo_list_url()
{
    $d = db_fetch_object(db_query("SELECT nid FROM {node} WHERE type = 'fotogalerie_list'"));
    return url("node/".$d->nid);
}

function get_home_photo()
{
    $_ .= '<div class="clr">' . "\n";
    
    $sql = "SELECT n.nid, n.title, filepath
        FROM {content_type_fotogalerie} f
        INNER JOIN {node} n ON n.nid = f.nid
        INNER JOIN {files} ON field_fotogalerie_ilustracni_fid = fid
        WHERE n.status = 1 ORDER BY created DESC LIMIT 3";
    $i = 0;
    
    $res = db_query($sql);
    while ($photo = db_fetch_object($res))
    {
        
        $class = "";
        if($i % 3 == 2) {
            $class = "l";
        }

        $_ .= '<div class="'.$class.'">' . "\n";
        $t = htmlspecialchars($photo->title,ENT_QUOTES);
        $_ .= '<a href="'.url("node/".$photo->nid).'">'.'<img alt="'.$t.'" src="'.imagecache_create_url("img_75_75", $photo->filepath).'" title="'.$t.'" /></a>' . "\n";
        $_ .= '</div>' . "\n";
        $i++;


    }
    $_ .= '</div>' . "\n";
    
    return $_;
}
