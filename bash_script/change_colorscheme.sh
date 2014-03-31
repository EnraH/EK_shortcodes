#!/bin/bash
# generate a new style sheet with new colors
cp style.css style.css.bak."$(date +%s%N)"

line=$(($1+2))
new_colors=( $( sed 's/,//g;'"$line"'q;d' colorschemes.csv ) )
old_colors=( $( sed 's/,//g;1q;d' colorschemes.csv ) )


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
