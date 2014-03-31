#!/bin/bash
# generate a new style sheet with new colors
if [ -e style.css.original ]
  then
    cp style.css style.css.bak."$(date +%s%N)"
    cp style.css.original style.css
  else
    cp style.css style..css.original
fi

line=$(($1+2))
new_colors=( $( sed 's/,//g;'"$line"'q;d' colorschemes.csv ) )
old_colors=( $( sed 's/,//g;2q;d' colorschemes.csv ) )

# set background colors

## set colors for header 
sed -i "833s/${old_colors[2]}/${new_colors[2]}/" style.css

## set colors for left column
sed -i "3584s/${old_colors[2]}/${new_colors[2]}/" style.css
#sed -i "3597/transparent/$new_background_color/" style.css

## set color for footer
sed -i "2693s/${old_colors[2]}/${new_colors[2]}/" style.css

# set colors for links and highlighted content
sed -i "s/${old_colors[3]}/${new_colors[3]}/" style.css
sed -i "s/${old_colors[4]}/${new_colors[4]}/" style.css
sed -i "s/${old_colors[5]}/${new_colors[5]}/" style.css
