<?php
/* Smarty version 5.4.5, created on 2026-01-16 22:55:44
  from 'file:UserList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ab3e08ca334_55732179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fea2dad04a4d26026fa6cc0023b76c5a134be8e' => 
    array (
      0 => 'UserList.tpl',
      1 => 1768554116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696ab3e08ca334_55732179 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1582998370696ab3e08b5f73_80948033', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1582998370696ab3e08b5f73_80948033 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="width:95%; margin: 2em auto;">
    <h2 style="border-bottom: 2px solid #8e44ad; padding-bottom: 10px;">👥 Zarządzanie użytkownikami i uprawnieniami</h2>

        <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div style="margin-bottom: 20px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button">← Powrót do katalogu</a>
    </div>

    <table class="pure-table pure-table-bordered" style="width: 100%;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th>ID</th>
                <th>Login</th>
                <th>Obecna Rola</th>
                <th>Status konta</th>
                <th>Zmień rolę na:</th>
                <th>Zarządzanie dostępem</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'u');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('u')->value) {
$foreach0DoElse = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getValue('u')['id_user'];?>
</td>
                <td><b><?php echo $_smarty_tpl->getValue('u')['login'];?>
</b></td>
                <td>
                    <span style="background: #ecf0f1; padding: 2px 6px; border-radius: 3px; border: 1px solid #bdc3c7;">
                        <?php echo (($tmp = $_smarty_tpl->getValue('u')['rola_nazwa'] ?? null)===null||$tmp==='' ? 'brak' ?? null : $tmp);?>

                    </span>
                </td>
                <td>
                    <?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>
                        <b style="color: green;">✔ Aktywny</b>
                    <?php } else { ?>
                        <b style="color: red;">✖ Zablokowany</b>
                    <?php }?>
                </td>
                <td>
                    <div style="display: flex; gap: 5px;">
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userChangeRole&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&role=admin" class="pure-button" style="font-size: 0.8em; background: #8e44ad; color: white;">Admin</a>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userChangeRole&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&role=pracownik" class="pure-button" style="font-size: 0.8em; background: #f1c40f; color: black;">Pracownik</a>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userChangeRole&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&role=klient" class="pure-button" style="font-size: 0.8em; background: #3498db; color: white;">Klient</a>
                    </div>
                </td>
                <td>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userActive&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&active=<?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>0<?php } else { ?>1<?php }?>" 
                       class="pure-button <?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>button-error<?php } else { ?>button-success<?php }?>"
                       style="font-size: 0.9em; width: 100px; text-align: center; background: <?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>#e74c3c<?php } else { ?>#2ecc71<?php }?>; color: white; text-decoration: none; border-radius: 3px; display: inline-block;"
                       onclick="return confirm('Czy na pewno chcesz zmienić status tego użytkownika?')">
                        <?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>🔒 Zablokuj<?php } else { ?>🔓 Odblokuj<?php }?>
                    </a>
                </td>
            </tr>
            <?php
}
if ($foreach0DoElse) {
?>
                <tr><td colspan="6">Brak użytkowników w systemie.</td></tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
<?php
}
}
/* {/block "content"} */
}
