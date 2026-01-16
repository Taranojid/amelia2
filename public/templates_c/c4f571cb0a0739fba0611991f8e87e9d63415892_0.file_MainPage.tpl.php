<?php
/* Smarty version 5.4.5, created on 2026-01-16 22:46:31
  from 'file:MainPage.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ab1b71c0329_92138542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4f571cb0a0739fba0611991f8e87e9d63415892' => 
    array (
      0 => 'MainPage.tpl',
      1 => 1768467287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696ab1b71c0329_92138542 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_91265743696ab1b71b8460_83556735', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_91265743696ab1b71b8460_83556735 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="background: url('<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/soap-bg.jpg'); background-size: cover; padding: 100px 20px; text-align: center; color: white;">
    <h1 style="font-size: 3em; text-shadow: 2px 2px 4px #000;">Naturalne Mydła Jana</h1>
    <p style="font-size: 1.5em;">Ręcznie robione, ekologiczne, prosto z natury.</p>
    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button pure-button-primary" style="padding: 15px 30px; font-size: 1.2em;">Sprawdź nasze produkty</a>
</div>

<div style="display: flex; justify-content: space-around; padding: 50px 10%; background: #f9f9f9; text-align: center;">
    <div>
        <h3>🌿 100% Eko</h3>
        <p>Tylko naturalne składniki.</p>
    </div>
    <div>
        <h3>🧼 Ręczna robota</h3>
        <p>Każda kostka jest unikalna.</p>
    </div>
    <div>
        <h3>🚚 Szybka dostawa</h3>
        <p>Mydło u Ciebie w 48h.</p>
    </div>
</div>

<div style="padding: 50px 10%;">
    <h2 style="text-align: center;">Nasze Bestsellery</h2>
    <div style="display: flex; gap: 20px; justify-content: center;">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('promoted'), 'p');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach0DoElse = false;
?>
            <div style="border: 1px solid #ddd; padding: 15px; width: 250px; text-align: center;">
                <h4><?php echo $_smarty_tpl->getValue('p')['nazwa_produktu'];?>
</h4>
                <p><?php echo $_smarty_tpl->getValue('p')['cena'];?>
 zł</p>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: #3498db;">Zobacz więcej</a>
            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
