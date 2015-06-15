<?php
  $form['submitted']['news']['#title'] = '';
  $form['submitted']['address']['#title'] = '';
  $form['actions']['submit']['#value'] = t('Send');
?>

<div class="form decor2">
<?php print drupal_render($form); ?>
</div>
  
<?php
