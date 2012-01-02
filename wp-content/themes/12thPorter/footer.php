<div class="clear"></div> <div id="footer">
  <div class="footer_wrap">
   <!--<h1><a class="footer_logo floatLeft" href="#">114 12th Avenue N Nashville, TN  37203 
   ph# (615)-320-3754</a></h1>-->
  
   <p class="floatRight footer_meta">&copy; copyright <?php echo date('Y'); ?> 12 Nashville LLC.<br />
Design and Developed by <br><a href="http://www.togaentertainment.com">TOGA Entertainment</a> &amp; <a href="http://www.flipscyde.com/">Flipscyde</a></p>

<div id="footernav">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
</div><div class="clear"></div>
 </div>
</div>

<?php wp_footer(); ?>
<?php /*if (is_front_page()){ ?>
<script language="javascript">
function imagify()
{
document.body.innerHTML=document.body.innerHTML.trim().replace(new
RegExp("http:\/\/i.ticketweb.com[\\S]*\\.jpg", "ig"),
function(target){return "<img src=\""+target+"\"\>";});
}
imagify();
</script>
<?php } else { ?>
<?php }*/ ?>

</body>
</html>
