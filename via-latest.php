<?php 

if (!class_exists('ViaLatest')) {
	class ViaLatest {

		// Class initialization
		function ViaLatest() {
			if (isset($_GET['show_yoast_widget'])) {
				if ($_GET['show_yoast_widget'] == "true") {
					update_option( 'show_yoast_widget', 'noshow' );
				} else {
					update_option( 'show_yoast_widget', 'show' );
				}
			} 
		
			// Add the widget to the dashboard
			add_action( 'wp_dashboard_setup', array(&$this, 'register_widget') );
			add_filter( 'wp_dashboard_widgets', array(&$this, 'add_widget') );
		}

		// Register this widget -- we use a hook/function to make the widget a dashboard-only widget
		function register_widget() {
			wp_register_sidebar_widget( 'via_posts', __( 'Latest about Store Locator for WordPress', 'yoast-posts' ), array(&$this, 'widget'), array( 'all_link' => 'http://www.viadat.com/category/store-locator', 'feed_link' => 'http://feeds.feedburner.com/viadat', 'edit_link' => 'options.php' ) );
		}

		// Modifies the array of dashboard widgets and adds this plugin's
		function add_widget( $widgets ) {
			global $wp_registered_widgets;
			if ( !isset($wp_registered_widgets['via_posts']) ) return $widgets;
			array_splice( $widgets, 2, 0, 'via_posts' );
			return $widgets;
		}

		function widget($args = array()) {
			$show = get_option('show_yoast_widget');
			if ($show != 'noshow') {
				if (is_array($args))
					extract( $args, EXTR_SKIP );
				echo $before_widget.$before_title.$widget_name.$after_title;
				
				include_once(ABSPATH . WPINC . '/rss.php');
				$rss = fetch_rss('http://feeds.feedburner.com/viadat');
				$items = array_slice($rss->items, 0, 4);
				?>
				<?php if (empty($items)) echo '<li>No items</li>';
				else
				foreach ( $items as $item ) : ?>
				<a style="font-size: 12px; font-weight:normal;" href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'><?php echo $item['title']; ?></a>   <span style="font-size: 10px; color: #666;"><?php echo date('F j, Y',strtotime($item['pubdate'])); ?></span><br/><br/> 
				
				<!--p><?php //echo substr($item['summary'],0,strpos($item['summary'], "This is a post from")); ?></p-->
				<?php endforeach;
				//echo '<br><a href="http://www.viadat.com/"><img style="margin: 0 0 5px 5px;" src="http://www.viadat.com/images/viadat_emblem_white.jpg" alt="Viadat Creations"/></a>';
				echo $after_widget;
			}
		}
	}

	// Start this plugin once all other plugins are fully loaded
	add_action( 'plugins_loaded', create_function( '', 'global $ViaLatest; $ViaLatest = new ViaLatest();' ) );
}
?>