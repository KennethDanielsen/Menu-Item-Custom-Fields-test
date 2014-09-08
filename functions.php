<?php

include('menu-item-custom-fields-image.php');

class Custom_Nav_Walker extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $item_output = '';
       parent::start_el($item_html, $item, $depth, $args);
       
	   $class_names = $value = '';
	   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
	   $class_names = ' class="' . esc_attr( $class_names ) . '"';
       
       $item_output .= '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'><a href="' . $item->url . '">' . $item->title .'</a>';

       if ( $item->is_dropdown && $depth === 0 ) {
           $item_output = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_output );
           $item_output = str_replace( '</a>', ' <span><img src="' . get_template_directory_uri() . '/images/chevron.svg"</span></a>', $item_output );
       }
       
	   elseif ( $depth === 1 ) {
 
		   $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		   $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
		   		   
		   var_dump(get_post_meta( $item->ID, 'imageurl', true ));
		   	 
			$item_output = '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		    $item_output .= '<br /><img src="' . get_post_meta( $item->ID, 'imageurl', true ) . '"/>';
			
		   if($item->description) {
		   	$item_output .= '<br /><span class="sub">' . $item->description . '</span>';
		   }
		   	$item_output .= '</a>';
			$item_output .= '</li>';
       }

       $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current )
        $element->classes[] = 'active';

        $element->is_dropdown = !empty( $children_elements[$element->ID] );

        if ( $element->is_dropdown ) {
            if ( $depth === 0 ) {
                $element->classes[] = 'dropdown';
            } elseif ( $depth === 1 ) {
                // Extra level of dropdown menu, 
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-submenu';
            }
        }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

}

?>