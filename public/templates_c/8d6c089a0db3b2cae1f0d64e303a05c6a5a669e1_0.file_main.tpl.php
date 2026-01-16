<?php
/* Smarty version 5.4.5, created on 2026-01-16 10:18:08
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696a02508fd3c7_85674191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d6c089a0db3b2cae1f0d64e303a05c6a5a669e1' => 
    array (
      0 => 'main.tpl',
      1 => 1768475852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696a02508fd3c7_85674191 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <html class=""> <![endif]-->    
<head>
	<meta charset="utf-8">
	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Domainer - free, responsive, AD-aware HTML template for domainers" ?? null : $tmp);?>
</title>

	<meta name="description" content="">
	<meta name="author" content="">

	<!--[if lt IE 9]> 
		<?php echo '<script'; ?>
 src="http://html5shiv.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
> 
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/whhg.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/grid.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/styles.css">

	<!-- TODO: uncomment skin styles. 
	     Note, you can use another skin found in the "css" folder, or create your own one --> 
	<!-- <link rel="stylesheet" href="css/skin-dark.css"> -->

	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie.css">
	<![endif]-->

	<link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/images/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/images/apple-touch-icon-114x114.png">

</head>
<body>
	
	<!--  LOGOTYPE LINE  -->
	<!--  TODO: Change domain name and call to action message below -->
	<div id="Head" class="container" >
		<div class="row" >
			<div class="col span_16" >
				<h1 id="Domain">Formularz logowania<br>
			</div>
			
		</div>
	</div>>
	<!-- END OF LOGOTYPE LINE  -->

	
	<!--  STATS LINE  -->
	<!--  TODO: enter your domain's stats below -->
	<!--  If you need a different number of columns here, please use:
	         - <div class="col span_24"> for 1 column
	         - <div class="col span_12"> for 2 columns
	         - <div class="col span_8"> for 3 columns
	         - <div class="col span_6"> for 4 columns
	         - <div class="col span_3"> for 8 columns
	-->
	<!--  
	      If you don't have such data or want to use this area as a text block, feel free to replace 
	      all <div class="col span_4">...</div> by a single <div class="col span_24"> - your text message - </div> 
	-->
	
	<!-- END OF STATS LINE  -->

	<!-- CONTENT -->
	<!-- TODO: Change content in the rows/columns below 
	     Please note, 24-columns grid is used in the template, so you can reorder the blocks 
	     to make, for example, 2-columns layout (use a pair of col span_12) or 4-column one
	     (use 4 copies of col span_6) -->
	<div id="Content" class="container">

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_631408193696a02508fbf43_86387378', 'content');
?>

	</div>
	<!-- END OF CONTENT -->

	<div id="Content-end" class="container"></div>
	<!-- FOOTER -->

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1396488104696a02508fc947_54337008', 'footer');
?>


<!-- TODO: In order to track visits, insert google analytics code here -->


<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/main.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block 'content'} */
class Block_631408193696a02508fbf43_86387378 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views\\templates';
?>


		<div class="row special">
			<div class="col span_24">
				<h3 class="align-center">Najlepszy na Świecie</h3>
			</div>
		</div>

		<div class="row">
			<div class="col span_24" style="text-align: center;">
				<a href="<?php echo $_smarty_tpl->getValue('app_url');?>
/ctrl.php?action=calcShow" class="btn btn-icon btn-block" style="margin-top:5px; margin-bottom: 30px; display: inline-block; width: 200px;"><i class="icon icon-calculator"></i> Kalkulator</a>
			</div>
			
		</div>
		<div class="row padding">
            
			
		</div> <!-- end of row -->
<?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_1396488104696a02508fc947_54337008 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views\\templates';
?>

	<div id="Footer" class="container">
		<div class="row top">
			<div class="col span_16">Kalkulator &copy; 2014, Domain holder. All rights reserved.</div>
			<div class="col span_8 align-right">Design: <a href="http://www.gettemplate.com/">GetTemplate</a></div>
		</div>
	</div>
<?php
}
}
/* {/block 'footer'} */
}
