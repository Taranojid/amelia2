<?php
/* Smarty version 5.4.5, created on 2026-01-16 22:46:29
  from 'file:messages.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ab1b5a1b4f8_13523237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06047f52c7e398f559731c7b133ed8cf7f984b4e' => 
    array (
      0 => 'messages.tpl',
      1 => 1768477134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696ab1b5a1b4f8_13523237 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views\\templates';
if ($_smarty_tpl->getValue('msgs')->isMessage()) {?>
<div class="messages bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
	<li class="msg <?php if ($_smarty_tpl->getValue('msg')->type == 2) {?>error<?php }?> <?php if ($_smarty_tpl->getValue('msg')->type == 1) {?>warning<?php }?> <?php if ($_smarty_tpl->getValue('msg')->type == 0) {?>info<?php }?>">
        <?php echo $_smarty_tpl->getValue('msg')->text;?>

    </li>
	<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }
}
}
