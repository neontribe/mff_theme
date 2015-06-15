<?php
/**
* Override or insert PHPTemplate variables into the search_theme_form template.
*
* @param $vars
*   A sequential array of variables to pass to the theme template.
* @param $hook
*   The name of the theme function being called (not used in this case.)
*/

function banany_preprocess_search_theme_form(&$variables) 
{
	unset($variables['form']['search_theme_form']['#title']);
	unset($variables['form']['search_theme_form']['#printed']);
	
	$variables['form']['submit']['#value'] = 'vyhledat';
	$variables['search']['search_theme_form'] = drupal_render($variables['form']['search_theme_form']);
	$variables['search_form'] = implode($variables['search']);
}

function banany_textfield($element) {
  $size = empty($element['#size']) ? '' : ' size="'. $element['#size'] .'"';
  $maxlength = empty($element['#maxlength']) ? '' : ' maxlength="'. $element['#maxlength'] .'"';
  $class = array('text');
  $extra = '';
  $output = '';

  if ($element['#autocomplete_path'] && menu_valid_path(array('link_path' => $element['#autocomplete_path']))) {
    drupal_add_js('misc/autocomplete.js');
    $class[] = 'form-autocomplete';
    $extra =  '<input class="autocomplete" type="hidden" id="'. $element['#id'] .'-autocomplete" value="'. check_url(url($element['#autocomplete_path'], array('absolute' => TRUE))) .'" disabled="disabled" />';
  }
  _form_set_class($element, $class);

  if (isset($element['#field_prefix'])) {
    $output .= '<span class="field-prefix">'. $element['#field_prefix'] .'</span> ';
  }

  $output .= '<input type="text"'. $maxlength .' name="'. $element['#name'] .'" id="'. $element['#id'] .'"'. $size .' value="'. check_plain($element['#value']) .'"'. drupal_attributes($element['#attributes']) .' />';

  if (isset($element['#field_suffix'])) {
    $output .= ' <span class="field-suffix">'. $element['#field_suffix'] .'</span>';
  }

  return theme('form_element', $element, $output) . $extra;
}

function banany_checkbox($element) {
  _form_set_class($element, array('checkbox'));
  $checkbox = '<input ';
  $checkbox .= 'type="checkbox" ';
  $checkbox .= 'name="'. $element['#name'] .'" ';
  $checkbox .= 'id="'. $element['#id'] .'" ' ;
  $checkbox .= 'value="'. $element['#return_value'] .'" ';
  $checkbox .= $element['#value'] ? ' checked="checked" ' : ' ';
  $checkbox .= drupal_attributes($element['#attributes']) .' />';

  if (!is_null($element['#title'])) {
    $checkbox = '<label class="option" for="'. $element['#id'] .'">'. $checkbox .' '. $element['#title'] .'</label>';
  }

  unset($element['#title']);
  return theme('form_element', $element, $checkbox);
}

function banany_button($element) {
  // Make sure not to overwrite classes.
  if (isset($element['#attributes']['class'])) {
    $element['#attributes']['class'] = 'sub form-'. $element['#button_type'] .' '. $element['#attributes']['class'];
  }
  else {
    $element['#attributes']['class'] = 'sub form-'. $element['#button_type'];
  }

  return '<input type="submit" '. (empty($element['#name']) ? '' : 'name="'. $element['#name'] .'" ') .'id="'. $element['#id'] .'" value="'. check_plain($element['#value']) .'" '. drupal_attributes($element['#attributes']) ." />\n";
}


function banany_textarea($element) {
  //$class = array('textarea');

  // Add teaser behavior (must come before resizable)
  if (!empty($element['#teaser'])) {
    drupal_add_js('misc/teaser.js');
    // Note: arrays are merged in drupal_get_js().
    drupal_add_js(array('teaserCheckbox' => array($element['#id'] => $element['#teaser_checkbox'])), 'setting');
    drupal_add_js(array('teaser' => array($element['#id'] => $element['#teaser'])), 'setting');
    $class[] = 'teaser';
  }

  //_form_set_class($element, $class);
  return theme('form_element', $element, '<textarea cols="'. $element['#cols'] .'" rows="'. $element['#rows'] .'" name="'. $element['#name'] .'" id="'. $element['#id'] .'" '. drupal_attributes($element['#attributes']) .'>'. check_plain($element['#value']) .'</textarea>');
}
