<?php
/* Smarty version 5.4.5, created on 2026-01-17 02:56:40
  from 'file:UserList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696aec58aa10a9_89391426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fea2dad04a4d26026fa6cc0023b76c5a134be8e' => 
    array (
      0 => 'UserList.tpl',
      1 => 1768614997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696aec58aa10a9_89391426 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1610549780696aec58a86455_07110976', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1610549780696aec58a86455_07110976 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<style>
    .admin-container { width: 95%; margin: 2em auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .admin-header { border-bottom: 3px solid #8e44ad; padding-bottom: 15px; color: #2c3e50; display: flex; align-items: center; gap: 10px; }
    
    .user-table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .user-table thead tr { background: #2c3e50; color: white; text-align: left; }
    .user-table th, .user-table td { padding: 15px; border-bottom: 1px solid #eee; }
    .user-table tbody tr:hover { background-color: #f9f9f9; transition: 0.2s; }

    .role-badge { 
        padding: 4px 10px; border-radius: 20px; font-size: 0.85em; font-weight: 600; text-transform: uppercase;
        background: #ecf0f1; border: 1px solid #bdc3c7; color: #7f8c8d;
    }
    
    .btn-role { 
        padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 0.8em; font-weight: bold; 
        transition: opacity 0.2s; display: inline-block;
    }
    .btn-role:hover { opacity: 0.8; color: white !important; }

    .status-active { color: #27ae60; font-weight: bold; }
    .status-blocked { color: #e74c3c; font-weight: bold; }

    .action-btn {
        padding: 8px 16px; border-radius: 4px; color: white; text-decoration: none; 
        font-size: 0.85em; font-weight: 600; display: inline-block; min-width: 100px; text-align: center;
    }
</style>

<div class="admin-container">
    <h2 class="admin-header">👥 Zarządzanie użytkownikami</h2>

    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div style="margin: 20px 0;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button" style="border-radius: 4px;">← Powrót do katalogu</a>
    </div>

    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Rola</th>
                <th>Status</th>
                <th>Zmień uprawnienia</th>
                <th style="text-align: right;">Akcje</th>
            </tr>
        </thead>
        <tbody>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'u');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('u')->value) {
$foreach0DoElse = false;
?>
                <?php if ($_smarty_tpl->getValue('u')['rola_nazwa'] == 'admin') {
continue 1;
}?>
        
        <tr>
            <td><small style="color: #95a5a6;">#<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
</small></td>
            <td><strong><?php echo $_smarty_tpl->getValue('u')['login'];?>
</strong></td>
            <td>
                <span class="role-badge">
                    <?php echo (($tmp = $_smarty_tpl->getValue('u')['rola_nazwa'] ?? null)===null||$tmp==='' ? 'brak' ?? null : $tmp);?>

                </span>
            </td>
            <td>
                <?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>
                    <span class="status-active">● Aktywny</span>
                <?php } else { ?>
                    <span class="status-blocked">● Zablokowany</span>
                <?php }?>
            </td>
            <td>
                <div style="display: flex; gap: 8px;">
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userChangeRole&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&role=admin" class="btn-role" style="background: #8e44ad; color: white;">Admin</a>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userChangeRole&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&role=pracownik" class="btn-role" style="background: #f1c40f; color: #2c3e50;">Pracownik</a>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userChangeRole&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&role=klient" class="btn-role" style="background: #3498db; color: white;">Klient</a>
                </div>
            </td>
            <td style="text-align: right;">
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userActive&id=<?php echo $_smarty_tpl->getValue('u')['id_user'];?>
&active=<?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>0<?php } else { ?>1<?php }?>" 
                   class="action-btn" 
                   style="background: <?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>#e74c3c<?php } else { ?>#2ecc71<?php }?>;"
                   onclick="return confirm('Czy na pewno chcesz zmienić status tego użytkownika?')">
                    <?php if ($_smarty_tpl->getValue('u')['czy_aktywny'] == 1) {?>🔒 Zablokuj<?php } else { ?>🔓 Odblokuj<?php }?>
                </a>
            </td>
        </tr>
    <?php
}
if ($foreach0DoElse) {
?>
        <tr>
            <td colspan="6" style="text-align: center; padding: 40px; color: #7f8c8d;">Brak użytkowników (nie-administratorów) w systemie.</td>
        </tr>
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
