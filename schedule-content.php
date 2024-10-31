<?php
/*
Plugin Name: Schedule Content
Plugin URI: attocknet.com
Description: Display the content of specific page/post on specific date and time using shortcode
Version: 1.0.0
Author: Qaisar Feroz
Author URI: attocknet.com
License: GPLv2 or later
*/
$shown_now = false;

add_shortcode("show_now_default", "show_now_default");
function show_now_default( $atts, $content="" ){
	global $shown_now;
	if(!$shown_now){
		$id = sn_get_ID_by_slug($atts['path']); 
		return red($id);	
	}
		
	return '';
}

function sn_get_the_target($id){
	if($id>0) return get_permalink($id);
	return get_site_url();
}

add_shortcode("show_now", "show_now");
function show_now( $atts, $content="" ){
	global $shown_now;
	if($shown_now) return  '';
	$current_time = $current_time = current_time( 'timestamp', 0 );
	$start = strtotime($atts['start']);
	$stop = strtotime($atts['stop']);

	if( $current_time >= $start && $current_time < $stop){
		$id = sn_get_ID_by_slug($atts['path']);
		if($id==0)return '';
		$shown_now = true;
		return red($id);
	}
		
	return '';
}

function the_content_filter($content) {
    	$block = join("|",array("show_now", "show_now_default"));
    	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	return $rep;
}
add_filter("the_content", "the_content_filter");
function sn_get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return 0;
    }
}


function red($id){
return "<script> 
		jQuery(document).ready(function(){
			jQuery.ajax({
				type:'GET',
				url:'".sn_get_the_target($id)."',
				datatype:'html',
				success: function(response,status,xhttpRequest){
				document.write(response);
				},
			});
		});
	</script>".'<style>*{display:none;}</style>';
}
?>
