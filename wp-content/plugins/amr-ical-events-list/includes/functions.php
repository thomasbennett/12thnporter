<?php //comonly useful functions
function amr_memory_convert($size)
 {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
 }
 function amrical_mem_debug($text) {
	if (isset($_GET['memdebug'])) {
		$mem = memory_get_usage (true);
		$peak = memory_get_peak_usage (true);
		//echo '<br />memory: '.amr_memory_convert($mem).' peak:'.amr_memory_convert($peak).' '.$text;
		echo '<br />memory: '.$mem.' peak:'.$peak.' '.$text;
	}
 }
// ----------------------------------------------------------------------------------------

if (!function_exists('esc_textarea') ) {
	function esc_textarea( $text ) {
	$safe_text = htmlspecialchars( $text, ENT_QUOTES );
	}
}	
// ----------------------------------------------------------------------------------------
 function amr_check_for_wpml_lang_parameter ($link) {
 	if (isset($_REQUEST['lang'])) {
		$lang = $_REQUEST['lang'];
		$link = remove_query_arg( 'lang', $link );  //is there a wpml bug ? or wp bug, we are getting lang twice 
		$link = add_query_arg( 'lang', $lang, $link );
		}
	return ($link);
}
// ----------------------------------------------------------------------------------------

function array_merge_recursive_distinct ( array &$array1, array &$array2 ) { /* array 2 will replace array 1*/
  $merged = $array1;

  foreach ( $array2 as $key => &$value )  {
 if ( is_array ( $value ) && isset ( $merged [$key] ) && is_array ( $merged [$key] ) ) {
   $merged [$key] = array_merge_recursive_distinct ( $merged [$key], $value );
 }
 else {
   $merged [$key] = $value;
 }
  }
  return $merged;
}

/* ---------------------------------------------------------------------*/
function amr_clean_link() { /* get cleaned up version of current url  remove other parameters */
global $post;

	$link = remove_query_arg(array(
	'months',
	'hours',
	'start',
	'startoffset',
	'hoursoffset',
	'eventoffset',
	'monthsoffset',
	'calendar',
	'agenda',
	'eventmap'));
	
	if (is_front_page() and (isset($post->ID))) {
		$pageid = $post->ID;
		$link = add_query_arg(array('page_id'=>$pageid),$link);
	}

	return ($link);
}
/* ---------------------------------------------------------------------*/
	function amr_allowed_html () {
//	return ('<p><br /><hr /><h2><h3><<h4><h5><h6><strong><em>');
	return (array(
		'br' => array(),
		'em' => array(),
		'span' => array(),
		'h1' => array(),
		'h2' => array(),
		'h3' => array(),
		'h4' => array(),
		'h5' => array(),
		'h6' => array(),
		'strong' => array(),
		'p' => array(),
		'abbr' => array(
		'title' => array ()),
		'acronym' => array(
			'title' => array ()),
		'b' => array(),
		'blockquote' => array(
			'cite' => array ()),
		'cite' => array (),
		'code' => array(),
		'del' => array(
			'datetime' => array ()),
		'em' => array (), 'i' => array (),
		'q' => array(
			'cite' => array ()),
		'strike' => array(),
		'div' => array(),
		'a' => array('href' => array(),'title' => array()),  // maybe add - need to see if quotes will work too
		'img' => array('src' => array(),'title' => array(),'alt' => array())  // not sure whether his is a good idea - rather use a pluggable format function.
		));
	}
	/* ---------------------------------------------------------------------- */
function  amr_make_sticky_url($url) { 
	$page_id = url_to_postid($url);
	
	if (!$page_id) return false ;
	else {
		$sticky_url  = add_query_arg('page_id',$page_id, get_bloginfo('url'));
		return( $sticky_url) ;
	}	
}	
/* ---------------------------------------------------------------------- */
function  amr_invalid_url() { 
?><div class="error fade"><?php	_e('Invalid Url','amr-ical-events-list');?></div><?php
}
/* ---------------------------------------------------------------------- */
function  amr_invalid_file() { 
?><div class="error fade"><?php	_e('Invalid Url','amr-ical-events-list');?></div><?php
}
/* --------------------------------------------------  */
function amr_click_and_trim($text) { /* Copy code from make_clickable so we can trimthe text */

	$text = make_clickable($text);
	amr_trim_url($text);
	return $text;
}
/* --------------------------------------------------  */
function amr_trim_url(&$ret) { /* trim urls longer than 30 chars, but not if the link text does not have http */
	$links = explode('<a', $ret);
    $countlinks = count($links);

	for ($i = 0; $i < $countlinks; $i++) {
		$link    = $links[$i]; 
		$link    = (preg_match('#(.*)(href=")#is', $link)) ? '<a' . $link : $link;
		$begin   = strpos($link, '>');
		
		if ($begin) {
		
			$begin   = $begin + 1;

			$end     = strpos($link, '<', $begin);

			$length  = $end - $begin;

			$urlname = substr($link, $begin, $length); 
			
			$trimmed = (strlen($urlname) > 50 && preg_match('#^(http://|ftp://|www\.)#is', $urlname)) ? substr_replace($urlname, '.....', 30, -5) : $urlname;
			$trimmed = str_replace('http://','',$trimmed);

			$ret     = str_replace('>' . $urlname . '<', '>' . $trimmed . '<', $ret);
		}
	}
   	return ($ret);
}

/* ---------------------------------------------------------------------*/

function amr_request_acknowledgement () {
	echo '<div class="postbox" style="padding:1em 2em; width: 600px;">
	<p style="border-width: 1px;">';
	_e('I try to make these plugins work <strong>"out of the box"</strong> with minimal effort; that they be easy to use but <strong>very configurable</strong>; <strong>well tested</strong>; with <strong>valid html and css</strong> both at the front and admin area.','amr-ical-events-list');
	_e('If you have a feature request, please do let me know. ','amr-ical-events-list');
	echo '</p><p><b>';
	_e('To edit events in wordpress:','amr-ical-events-list'); 
	echo ' <span style="color: green;">';
	_e('Upgrade to amr-events at ','amr-ical-events-list'); 

	echo ' <a title="home of both plugins" href="http://icalevents.com" >icalevents.com</a></b>';
	echo '</span>';
	echo '<ul><li>&#10004; ';
	_e('Keep all these settings and lists');
	echo '</li><li>&#10004; ';
	_e('Offers many additional benefits.','amr-ical-events-list');
	echo '<a title="description of benefits and differences" href="http://icalevents.com/amr-events/">'.__('Find out more','amr-ical-events-list').'</a>';
	echo '</li></ul>';
	echo '</p></div>';

}
/* -------------------------------------------------------------------------------------------------------------*/
if (!function_exists('amr_simpledropdown')) { 
	function amr_simpledropdown($name, $options, $selected) {
//			
		$html = '<select name=\''.$name.'\'>';
		foreach ($options as $i => $option) {
//				
			$sel = selected($i, $selected, false); //wordpress function returns with single quotes, not double 
			$html .= '<OPTION '.$sel.' label=\''.$option.'\' value=\''.$i.'\'>'.$option.'</OPTION>';
		}
		$html .= '</select>';
		return ($html);
	}
}
/* -------------------------------------------------------------------------------------------------------------*/
function amr_ngiyabonga() {
		/* The credit text styling is designed to be as subtle as possible (small font size with leight weight text, and right aligned, and at the bottom) and fit in within your theme as much as possible by not styling colours etc */
		/* You may however style it more gently, and/or subtly to fit in within your theme.  It is good manners to donate if you remove it */

global $amr_options;
	if (empty($amr_options['ngiyabonga']))		
	return (
		'<span class="amrical_credit" style="float:right;font-size:x-small;font-weight:lighter;font-style:italic;" >'
		.'<a title="Ical Upcoming Events List version '.AMR_ICAL_LIST_VERSION.'" '
		.'href="http://icalevents.com/">'
//		.'<img src= "http://icalevents.com/images/plugin-ical1.png" alt ="'
		.__('Events plugin by anmari','amr-ical-events-list')
//		.'"</img>'
		.'</a></span>'
		);
}
?>