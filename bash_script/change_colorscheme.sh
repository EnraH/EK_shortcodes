#!/bin/sh

cp style.css style_old.css
new_background_color="#008373"
old_green_1="#24890D"
new_color_1=""
old_green_2="#41A62A"
new_color_1=""
sed -i "470;3596;3583;2692s/#000/$new_background_color/" style.css
sed -i "s/$old_green_1/$new_color_1/" style.css
sed -i "s/$old_green_2/$new_color_2/" style.css
