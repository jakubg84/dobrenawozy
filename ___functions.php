<?php
/* ==========
	Get Split Nav
	include $menu_name for the menu you want and $raw=true if you want to return just the menu objects
========== */
function get_split_nav($menu_name=null, $raw=false){
	$menu_name = 'main-menu';
	
	if($menu_name == null || !is_string($menu_name)){
		return false;
	}
	$output = new stdClass();

    if(($locations = get_nav_menu_locations()) && isset($locations[$menu_name])){
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		//Create a new array with just the
		$newMenu = array();
		foreach($menu_items as $item){
			if($item->menu_item_parent != 0) continue;
            //get subnav
            $parentID = $item->ID;
            $item->subnav = array_filter($menu_items, function($v) use ($parentID){
                if($v->menu_item_parent == $parentID) return $v;
              }
            );
			array_push($newMenu, $item);
		}
		//Split menu array in half
		$len = count($newMenu);
		$firsthalf = array_slice($newMenu, 0, $len / 2);
		$secondhalf = array_slice($newMenu, $len / 2);

		if($raw==true){
			$output->left_menu = $firsthalf;
			$output->right_menu = $secondhalf;
		}else{
			//Create left menu
			$menuMarkup = '';
			$menuMarkup .= '<div id="headerMenuLeft">
					<ul class="menu">';
			foreach($firsthalf as $item){
				$menuMarkup .= "<li>
                    <a href='".$item->url."'>".$item->title."</a>";
                if($item->subnav){
                    $menuMarkup .= "<ul>";
                    foreach($item->subnav as $item){
                        $menuMarkup .= "<li><a href='".$item->url."'>".$item->title."</a></li>";
                    }
                    $menuMarkup .= "</ul>";
                }
                $menuMarkup .= "</li>";
			}
			$menuMarkup .= '</ul>
				</div>';
			$output->left_menu = $menuMarkup;

			//Create right menu
			$menuMarkup = '';
			$menuMarkup .= '<div id="headerMenuRight">
					<ul class="menu">';
			foreach($secondhalf as $item){
                $menuMarkup .= "<li>
                    <a href='".$item->url."'>".$item->title."</a>";
                if($item->subnav){
                    $menuMarkup .= "<ul>";
                    foreach($item->subnav as $item){
                        $menuMarkup .= "<li><a href='".$item->url."'>".$item->title."</a></li>";
                    }
                    $menuMarkup .= "</ul>";
                }
                $menuMarkup .= "</li>";
			}
			$menuMarkup .= '</ul>
				</div>';
			$output->right_menu = $menuMarkup;
		}
		return $output;
	}
}


/* ==========
	Get Split Nav - current children
	include $menu_name for the menu you want and $raw=true if you want to return just the menu objects
========== */
function get_split_nav_children($menu_name=null, $raw=false){
	if($menu_name==null || !is_string($menu_name)){
		return false;
	}
	$output = new stdClass();
	
	if(($locations = get_nav_menu_locations()) && isset($locations[$menu_name])){
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		//Get current menu item
		$item = null;
		$v = $post->ID;
		foreach($menu_items as $obj) {
		    if ($v == $obj->object_id) {
		        $item = $obj;
		        break;
		    }
		}
		//Is $item a child?
		if($item->menu_item_parent != 0){
			$p = $item->menu_item_parent;
			$item = null;
			$v = $p;
			foreach($menu_items as $obj) {
			    if ($v == $obj->ID) {
			        $item = $obj;
			        break;
			    }
			}
			$parent = $item->object_id;
		}else{
			$parent = $item->object_id;
		}
		//Create a new array with just the post objects
		$newMenu = array();
		foreach($menu_items as $item){
			$parentID = get_post_meta( $item->menu_item_parent, '_menu_item_object_id', true );
			if($parentID != $parent) continue;
			array_push($newMenu, $item);
		}
		//Split menu array in half
		$len = count($newMenu);
		$firsthalf = array_slice($newMenu, 0, $len / 2);
		$secondhalf = array_slice($newMenu, $len / 2);
		
		if($raw==true){
			$output->left_menu = $firsthalf;
			$output->current_item = get_post($parent);
			$output->right_menu = $secondhalf;
		}else{			
			//Create left menu
			$menuMarkup = '';
			$menuMarkup .= '<div id="subnavLeft">
					<ul class="menu">';
			foreach($firsthalf as $item){
				$menuMarkup .= "<li>
		                    <a href='".$item->url."'>".$item->title."</a>";
		                if($item->subnav){
		                    $menuMarkup .= "<ul>";
		                    foreach($item->subnav as $item){
		                        $menuMarkup .= "<li><a href='".$item->url."'>".$item->title."</a></li>";
		                    }
		                    $menuMarkup .= "</ul>";
		                }
		                $menuMarkup .= "</li>";
			}
			$menuMarkup .= '</ul>
				</div>';
			$output->left_menu = $menuMarkup;
	
			
			$post = get_post($parent);
			$menuMarkup = "<div id='subnavCurrent'>
					<a href='".$post->guid."'>".$post->post_title."</a>
				  </div>";
			$output->current_item = $menuMarkup;
	
			//Create right menu
			$menuMarkup = '';
			$menuMarkup .= '<div id="subnavRight">
					<ul class="menu">';
			foreach($secondhalf as $item){
				$menuMarkup .= "<li>
		                    <a href='".$item->url."'>".$item->title."</a>";
		                if($item->subnav){
		                    $menuMarkup .= "<ul>";
		                    foreach($item->subnav as $item){
		                        $menuMarkup .= "<li><a href='".$item->url."'>".$item->title."</a></li>";
		                    }
		                    $menuMarkup .= "</ul>";
		                }
		                $menuMarkup .= "</li>";
			}
			$menuMarkup .= '</ul>
				</div>';
			$output->right_menu = $menuMarkup;
		}
		
		return $output;
	}
}
