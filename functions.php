<?php
    require_once(__DIR__ . '/functions/acf.php');
    require_once(__DIR__ . '/functions/woocommerce.php');
    require_once(__DIR__ . '/functions/wordpress.php');

    // Define Nav Menus
    register_nav_menus(array (
        'main_menu' => 'Main Menu',
        'social_menu' => 'Social Menu',
    ));

    //Add Social Icons to Nav Menu
    add_filter('wp_nav_menu_objects', 'social_menu_icons', 10, 2);

    function social_menu_icons($items, $args) {
        if($args->theme_location == 'social_menu') {
            foreach($items as &$item) {
                $icon = file_get_contents(get_field('icon', $item));

                if($icon) {
                    $item->title = $icon . $item->title;
                }
            }

            return $items;
        }
        else {
            return $items;
        }
    }
?>