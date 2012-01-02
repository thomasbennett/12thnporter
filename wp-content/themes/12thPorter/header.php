<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/reset.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/calendar.css" type="text/css" media="screen" />

<?php wp_enqueue_script('jquery') ?>
<!--[if IE 7]>
<style>
.menu{
margin-top: 15px;
}
.event_full{
background-color: black !important;
}
</style>
<![endif]-->


<?php /*
<?php if (is_page('21')){ ?>
<?php wp_deregister_script(‘jquery’); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<?php } else { ?>
<?php } ?>
*/ ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="header">
 <div id="header_wrap">
  <h1><a class="logo" href="<?php bloginfo('siteurl'); ?>">Historically Located at 12th & Porter Nashville</a></h1>
 </div>
</div>

<div id="wrapper">

<div class="email floatRight">
   <p class="floatLeft">*Join the email list!</p> <script type="text/javascript" src="https://app.e2ma.net/app/view:SignupForm/signupId:74165/key:e2123ce4618e73fa5a9070258528a905/acctId:32146"></script><div id="load_check" class="signup_form_message" >This form needs Javascript to display, which your browser doesn't support. <a href="https://app.e2ma.net/app/view:Join/signupId:74165/acctId:32146"> Sign up here</a> instead </div><script type="text/javascript">signupFormObj.drawForm();</script>
  </div>
  
 <div id="navigation">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
 </div>
 <div class="clear"></div>
