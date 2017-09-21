<?php

// Adding Editor Styles
// Editor Styles allow you to provide the CSS used by WordPress’ Visual Editor so that it can match the frontend styling. This allows content creators a better picture of what their content will look like while they are creating it.

// In my theme, I have a “css” directory that holds additional CSS files. I create an editor-style.css file, then add this to my theme’s functions.php file:

add_editor_style( 'css/editor-style.css' );

// I’ve arranged my theme’s main stylesheet so that more generic styles come first, followed by theme-specific styling. Once I’m finished with the base styling, I copy the top half of my stylesheet into editor-style.css.

// I use @import to include any custom fonts (ex: Google Fonts, Icon Fonts…), and include the following sections from my main stylesheet: Base Typography (body, a, strong…), Headings, Images, Forms (input, select, buttons…), Gallery, Tables, Column Classes, and any Shortcake Styling.