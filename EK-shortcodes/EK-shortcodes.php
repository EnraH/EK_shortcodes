<?php

/**
  * Plugin Name: EK Shortcodes
  * Description: Custom Shortcodes for the "Evangelische Kirche Kenzingen"
*/

function add_contact($atts)
{
  extract(shortcode_atts(array(
    'name' => 'No Name given',
    'pos' => '',
    'tel' => '',
    'email' => '',
    'img_id' => '',
  ), $atts));

  if ($name == 'No Name given') 
  {
    return($name);
  } else {
    return '<div id="Contact_' . str_replace(' ', '_', $name) . '" style="overflow: auto;">' . get_image_tag($img_id,$name,$name, 'left', 'thumbnail') 
      . '<em>' . $pos. '</em><br />' 
      . $name . '<br />tel: <a href="tel:+49' . str_replace(' ','', $tel) . '">' . '0' . $tel . '</a> <br />' 
      . '<a href="mailto:' . $email . '">' . $email . '</a></div>';
  }
}
add_shortcode('EK_add_contact','add_contact');

function add_detailed_contact($atts, $content)
{
  extract(shortcode_atts(array(
    'name' => 'No Name given',
    'pos' => '',
    'tel' => '',
    'img_id' => '',
  ), $atts));

  if ($name == 'No Name given') 
  {
    return($name);
  } else {
    return '<div id="Contact_Details_' . str_replace(' ', '_', $name) . '" class="EK_detailed_contact">'
      . get_image_tag($img_id,$name,$name, 'left', 'thumbnail') 
      . '<em>' . $pos. '</em><br />' 
      . $name . '<br />'
      . $content . '<br />'
      . '<br />tel: <a href="tel:+49' . str_replace(' ','', $tel) . '">' . '0' . $tel . '</a> <br />' 
      . '<a href="mailto:' . $email . '">' . $email . '</a>'
      . '</div>';
  }
  
}
add_shortcode('EK_add_detailed_contact','add_detailed_contact');

function get_latest_posts_in_cat($atts)
{
  extract(shortcode_atts(array(
    'numberposts' => 3,
    'category' => '',
  ), $atts));

  $args = array(
    'numberposts' => $numberposts,
    'category' => get_cat_ID($category),
    'post_status' => 'publish');

  $recent_posts = wp_get_recent_posts( $args );
 
  echo '<div class="EK-latest-title">' . $category . '</div>';

  foreach( $recent_posts as $post)
  {
    echo '<header>' 
         . '<h1 class="EK-latest-header"><a class="EK-latest-header" rel="bookmark" href="' . get_permalink($post["ID"]) . '" title="Artikel <'.esc_attr($post["post_title"]).'> anschauen" >' .   $post["post_title"].'</a></h1>' 
         . '</header>'
         . '<div class="EK-latest-content">'
         . apply_filters('the_content', $post["post_content"])
         . '</div>';
  }

  echo '<hr />'
       .  '<a href="' . get_category_link(get_cat_id($category)) . '">Weitere Beiträge ' . $category . '</a>'
       . '<hr />';
}
add_shortcode('EK_latest_posts_in_cat','get_latest_posts_in_cat');


add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
  */
function register_plugin_styles() 
{
  wp_register_style( 'EK-shortcodes', plugins_url( 'EK-shortcodes/css/EK-styles.css' ) );
  wp_enqueue_style( 'EK-shortcodes' );
}

?>
