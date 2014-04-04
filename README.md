EK_codes
=============

## Bash Scripting

Contains scripts to alter style.css in theme twentyfourteen in order to set colors of hightlighted content and background

Use the table colorscheme.csv to define a new colorschmeme. To change the colorscheme copy change_colorscheme.sh and colorscheme.csv into wp-content/themes/twentyfourteen/ and execute

> bash change_colorscheme.sh id

id: id of the colorscheme in table

## EK_shortcodes

Wordpress shortcodes

### inclusion of contact details

> [EK_add_contact name="" tel="" email="" pos="" img_id=""]

### embedding of latest posts of one category

> [EK_latest_posts_in_cat numberposts="" category=""]

### styling of sermons

> [EK_predigt datum="1.3.14" bibelstelle="Mk1,1-17" situation="Die Predigt ist in den Gottesdienst eingebettet"] sermon [/EK_predigt]

attributes 

* datum
* prediger (default: Andreas Hansen)
* bibelstelle (optional, Bibelstelle als Kürzel): erstellt link auf
entsprechende Seite von die-bibel.de
* uebersetzung (optional, default: LU): wählt Übersetzung für
Bibelstellenlink (siehe
http://www.die-bibel.de/online-bibeln/link-service/bibel-link-service/)
* situtation (optional)

The shortcode removes all (single) linebreaks. Double linebreaks are turned into paragraphs.
