<?php
/* Smarty version 5.4.5, created on 2026-01-16 22:46:40
  from 'file:LoginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ab1c03f2623_62506572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f5494ee308627ecf7c1def834014271f2b04541' => 
    array (
      0 => 'LoginView.tpl',
      1 => 1768553991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696ab1c03f2623_62506572 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2096744767696ab1c03e9089_38799964', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_2096744767696ab1c03e9089_38799964 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div class="row padding">
    <div class="col span_8" style="float: none; margin: 0 auto;">
        <div class="l-box">
            <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" method="post" class="pure-form pure-form-stacked">
                <fieldset>
                    <legend>Logowanie do systemu</legend>
                    
                    <label for="id_login">Login:</label>
                    <input id="id_login" type="text" name="login" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->login ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    
                    <label for="id_pass">Hasło:</label>
                                        <input id="id_pass" type="password" name="pass">
                    
                    <div style="margin-top: 1em;">
                        <input type="submit" value="Zaloguj" class="btn btn-primary"/>
                    </div>
                </fieldset>
            </form>    
        </div>

        <hr>

                <?php if (!(true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
            <p>
                Nie masz konta? <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
registerRender">Zarejestruj się tutaj</a> 
            </p>
        <?php }?>
        
        <div style="margin-top: 1em;">
            <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
}
