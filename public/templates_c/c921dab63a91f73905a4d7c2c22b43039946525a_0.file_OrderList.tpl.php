<?php
/* Smarty version 5.4.5, created on 2026-01-16 12:30:31
  from 'file:OrderList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696a2157a4db72_08638500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c921dab63a91f73905a4d7c2c22b43039946525a' => 
    array (
      0 => 'OrderList.tpl',
      1 => 1768554058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696a2157a4db72_08638500 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1638222210696a2157a3b373_99054355', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1638222210696a2157a3b373_99054355 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="width:95%; margin: 2em auto;">

    <h1>📦 Panel obsługi zamówień</h1>
    
        <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <nav style="margin-bottom: 20px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button">← Powrót do katalogu mydeł</a>
    </nav>

    <table class="pure-table pure-table-bordered" style="width: 100%;">
        <thead>
            <tr style="background: #f2f2f2;">
                <th>ID</th>
                <th>Klient</th>
                <th>Data złożenia</th>
                <th>Suma</th>
                <th>Adres dostawy</th>
                <th>Status</th>
                <th>Akcje</th>
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
                                <td><b>#<?php echo (($tmp = $_smarty_tpl->getValue('o')['id_order'] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('o')['ORDERS_ID'] ?? null : $tmp);?>
</b></td>
                <td><?php echo $_smarty_tpl->getValue('o')['login'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('o')['data_zamowienia'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('o')['koszt_zamowienia'];?>
 zł</td>
                <td><?php echo $_smarty_tpl->getValue('o')['adres_dostawy'];?>
</td>
                <td>
                                        <span style="padding: 4px 8px; border-radius: 4px; color: #333; font-weight: bold; background: <?php if ($_smarty_tpl->getValue('o')['status'] == 'nowe') {?>#ffeb3b<?php } else { ?>#c8e6c9<?php }?>;">
                        <?php echo $_smarty_tpl->getValue('o')['status'];?>

                    </span>
                </td>
                <td>
                    <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderDetails&id=<?php echo (($tmp = $_smarty_tpl->getValue('o')['id_order'] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('o')['ORDERS_ID'] ?? null : $tmp);?>
" 
                           class="pure-button" style="font-size: 0.9em;">
                           🔍 Podgląd
                        </a>

                        <?php if ($_smarty_tpl->getValue('o')['status'] == 'nowe') {?>
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderShip&id=<?php echo (($tmp = $_smarty_tpl->getValue('o')['id_order'] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('o')['ORDERS_ID'] ?? null : $tmp);?>
" 
                               class="pure-button" 
                               style="background: #2196f3; color: white; font-size: 0.9em;"
                               onclick="return confirm('Czy na pewno oznaczyć zamówienie jako wysłane?')">
                               ✅ Wyślij
                            </a>
                        <?php } else { ?>
                            <span style="color: gray; font-size: 0.8em; align-self: center;">Brak akcji</span>
                        <?php }?>
                    </div>
                </td>
            </tr>
            <?php
}
if ($foreach0DoElse) {
?>
            <tr>
                <td colspan="7" style="text-align: center; padding: 2em;">Brak zamówień do wyświetlenia.</td>
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
