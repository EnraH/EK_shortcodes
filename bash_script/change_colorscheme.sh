#!/bin/sh

cp style.css style_old.css
new_background_color="#008373"
old_green_1=""
old_green_2=""
sed -i "470;3596;3583;2692s/#000/$new_background_color" style.css

