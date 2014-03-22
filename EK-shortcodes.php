<?php

/**
  * Plugin Name: EK Shortcodes
  * Description: Custom Shortcodes for the "Evangelische Kirche Kenzingen"
*/

function add_contact($atts, $content = null)
{
  extract(shortcode_atts(array(
    'name' => 'No Name given',
    'tel' => '',
    'email' => '',
    'img_id' => '',
  ), $atts));
  if ($name == 'No Name given') 
  {
    return($name);
  } else {
    return '<div id="Cont_' . $name . '" style="overflow: auto;">' . get_image_tag($img_id,$name,$name, 'left', 'medium') . $name . '<br /><a href="tel:+49' . $tel . '">' .  $tel . '</a> <br /> <a href="mailto:' . $email . '">' . $email . '</a>'
  }
}
add_shortcode('EK_add_contact','add_contact');
