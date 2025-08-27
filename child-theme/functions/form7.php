<?php

// Clean up Form 7
add_filter('wpcf7_load_css', '__return_false', 999);
add_filter('wpcf7_autop', '__return_false', 999);
add_filter('wpcf7_autop_or_not', '__return_false', 999);