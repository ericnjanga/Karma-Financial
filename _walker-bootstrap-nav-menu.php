<?php
    class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

        // Add a dropdown menu for parent items with children
        function start_lvl(&$output, $depth = 0, $args = array()) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">\n";
        }

        // Customize parent items with children
        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
            $indent = ($depth) ? str_repeat("\t", $depth) : '';

            $li_attributes = '';
            $class_names = $value = '';

            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'nav-item';
            $classes[] = 'dropdown';
            $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
            $classes[] = 'menu-item-' . $item->ID;

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = ' class="' . esc_attr($class_names) . '"';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

            if ($args->walker->has_children) {
                $attributes .= ' class="nav-link dropdown-toggle"';
                $attributes .= ' id="navbarDropdown" data-bs-toggle="dropdown"';
            } else {
                $attributes .= ' class="nav-link"';
            }

            $item_output = $args->before;
            $item_output .= '<a ' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;


    
            if ($depth > 0) {
                $item_output = str_replace('a ', 'a class="dropdown-item" ', $item_output);
            }

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }
?>