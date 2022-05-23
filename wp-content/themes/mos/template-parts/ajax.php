<?php
//get listings for 'works at' on submit listing page
add_action('wp_ajax_nopriv_get_listing_names', 'ajax_listings');
add_action('wp_ajax_get_listing_names', 'ajax_listings');
ajax_listings();
function ajax_listings() {
	global $wpdb; //get access to the WordPress database object variable

	//get names of all businesses
//	$name = $wpdb->esc_like(stripslashes($_POST['name'])).'%'; //escape for use in LIKE statement
  print "aaa";
	$sql = "select post_title
		from $wpdb->posts";
    print $sql;
	//	where post_title like %s
	//	and post_type='job_listing' and post_status='publish'";

	$sql = $wpdb->prepare($sql, $name);

	$results = $wpdb->get_results($sql);

	//copy the business titles to a simple array
	$titles = array();
	foreach( $results as $r )
		$titles[] = addslashes($r->post_title);

	echo json_encode($titles); //encode into JSON format and output

	die(); //stop "0" from being output
}
?>
