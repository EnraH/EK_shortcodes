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
 
  foreach( $recent_posts as $post)
  {
    echo '<header>' 
         . '<h1 class="entry-title latest"><a class="latest" rel="bookmark" href="' . get_permalink($post["ID"]) . '" title="Artikel <'.esc_attr($post["post_title"]).'> anschauen" >' .   $post["post_title"].'</a></h1>' 
         . '</header>'
         . '<div>'
         . $post["post_content"] 
         . '</div>';
  }

  echo '<a href="' . get_category_link(get_cat_id($category)) . '">Weitere Beiträge ' . $category . '</a>';
}
add_shortcode('EK_latest_posts_in_cat','get_latest_posts_in_cat');

?>
