<?php
/* Smarty version 5.4.5, created on 2026-01-17 00:40:18
  from 'file:MainPage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696acc62cd5ca5_20147257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4f571cb0a0739fba0611991f8e87e9d63415892' => 
    array (
      0 => 'MainPage.tpl',
      1 => 1768606554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696acc62cd5ca5_20147257 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_705352095696acc62cd2b25_88205133', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_705352095696acc62cd2b25_88205133 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="background: linear-gradient(rgba(204, 28, 28, 0.5), rgba(230, 0, 0, 0.5)), url('<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/soap-bg.jpg'); background-size: cover; background-position: center; padding: 120px 20px; text-align: center; color: white;">
    
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" 
       style="display: inline-block; background: #c0392b; color: white; padding: 18px 40px; font-size: 1.2em; text-decoration: none; border-radius: 5px; font-weight: bold; transition: background 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
       Sprawdź nasze produkty
    </a>
</div>

<div style="display: flex; justify-content: space-around; padding: 60px 10%; background: #ffffff; text-align: center; border-bottom: 1px solid #eee;">
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🌿 100% Eko</h3>
        <p style="color: #7f8c8d;">Tylko naturalne, certyfikowane składniki roślinne.</p>
    </div>
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🧼 Ręczna robota</h3>
        <p style="color: #7f8c8d;">Każda kostka jest unikalna i tworzona z pasją.</p>
    </div>
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🚚 Szybka dostawa</h3>
        <p style="color: #7f8c8d;">Twoje zamówienie wyślemy w ciągu 48h.</p>
    </div>
</div>


<?php
}
}
/* {/block "content"} */
}
