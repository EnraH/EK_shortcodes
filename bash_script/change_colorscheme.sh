#!/bin/sh

cp style.css style.css.bak."$(date +%s%N)"
#new_background_color="#008373"
new_background_color="#005e7e" # official blue


# dark green in original template
old_green_1="#24890d"
#new_color_1="#830000"
new_color_1="#7e1900" 
# light green in original template
old_green_2="#41a62a"
#new_color_2="#a31b1b"
new_color_2="#7e1900"

old_green_3="#55d737"
#new_color_3="#a31b1b"
new_color_3="#7e1900"

# set background colors

## set colors for header 
sed -i "833s/#000/$new_background_color/" style.css

## set colors for left column
sed -i "3584s/#000/$new_background_color/" style.css
#sed -i "3597/transparent/$new_background_color/" style.css

## set color for footer
sed -i "2693s/#000/$new_background_color/" style.css

# set colors for links and highlighted content
sed -i "s/$old_green_1/$new_color_1/" style.css
sed -i "s/$old_green_2/$new_color_2/" style.css
sed -i "s/$old_green_3/$new_color_3/" style.css
