<?php
/* Smarty version 5.4.5, created on 2026-01-17 03:19:16
  from 'file:OrderList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696af1a424cf30_55889428',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c921dab63a91f73905a4d7c2c22b43039946525a' => 
    array (
      0 => 'OrderList.tpl',
      1 => 1768616353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696af1a424cf30_55889428 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_927312270696af1a423d9b3_51147336', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_927312270696af1a423d9b3_51147336 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<style>
    .order-container { width: 95%; margin: 2em auto; font-family: 'Segoe UI', sans-serif; }
    .status-badge { 
        padding: 5px 10px; border-radius: 20px; font-size: 0.85em; font-weight: bold; text-transform: uppercase; 
    }
    .status-nowe { background: #fff9c4; color: #f57f17; border: 1px solid #fbc02d; }
    .status-wyslane { background: #e8f5e9; color: #2e7d32; border: 1px solid #4caf50; }
    
    .order-table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .order-table th { background: #34495e; color: white; padding: 12px; text-align: left; }
    .order-table td { padding: 12px; border-bottom: 1px solid #eee; vertical-align: middle; }
    .order-table tr:hover { background: #f8f9fa; }
    
    .btn-action { padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 0.85em; font-weight: 600; display: inline-flex; align-items: center; gap: 5px; }
    .btn-ship { background: #2980b9; color: white; transition: 0.3s; }
    .btn-ship:hover { background: #3498db; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
</style>

<div class="order-container">
    <h1 style="color: #2c3e50; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
        📦 Panel obsługi zamówień
    </h1>
    
    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div style="margin-bottom: 20px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button" style="border-radius: 4px;">← Powrót do katalogu</a>
    </div>

    <table class="order-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Klient</th>
                <th>Data</th>
                <th>Suma</th>
                <th>Adres dostawy</th>
                <th>Status</th>
                <th style="text-align: right;">Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orders'), 'o');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('o')->value) {
$foreach0DoElse = false;
?>
            <tr>
                                <td><strong style="color: #7f8c8d;">#<?php echo $_smarty_tpl->getValue('o')['orders_id'];?>
</strong></td>
                <td><i class="fa fa-user"></i> <?php echo $_smarty_tpl->getValue('o')['login'];?>
</td>
                <td style="font-size: 0.9em; color: #34495e;"><?php echo $_smarty_tpl->getValue('o')['data_zamowienia'];?>
</td>
                <td style="font-weight: bold; color: #2c3e50;"><?php echo $_smarty_tpl->getValue('o')['koszt_zamowienia'];?>
 zł</td>
                <td style="max-width: 200px; font-size: 0.85em; color: #636e72;"><?php echo $_smarty_tpl->getValue('o')['adres_dostawy'];?>
</td>
                <td>
                    <?php if ($_smarty_tpl->getValue('o')['status'] == 'nowe') {?>
                        <span class="status-badge status-nowe">Nowe</span>
                    <?php } else { ?>
                        <span class="status-badge status-wyslane">Wysłane</span>
                    <?php }?>
                </td>
                <td style="text-align: right;">
                    <div style="display: flex; gap: 10px; justify-content: flex-end;">
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderDetails&id=<?php echo $_smarty_tpl->getValue('o')['orders_id'];?>
" 
                           class="btn-action" style="background: #ecf0f1; color: #2c3e50; border: 1px solid #bdc3c7;">
                           🔍 Szczegóły
                        </a>

                        <?php if ($_smarty_tpl->getValue('o')['status'] == 'nowe') {?>
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderShip&id=<?php echo $_smarty_tpl->getValue('o')['orders_id'];?>
" 
                               class="btn-action btn-ship" 
                               onclick="return confirm('Czy na pewno oznaczyć zamówienie #<?php echo $_smarty_tpl->getValue('o')['orders_id'];?>
 jako wysłane?')">
                               🚚 Wyślij
                            </a>
                        <?php }?>
                    </div>
                </td>
            </tr>
            <?php
}
if ($foreach0DoElse) {
?>
            <tr>
                <td colspan="7" style="text-align: center; padding: 50px; color: #bdc3c7;">
                    <p style="font-size: 1.2em;">Brak zamówień w systemie.</p>
                </td>
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
