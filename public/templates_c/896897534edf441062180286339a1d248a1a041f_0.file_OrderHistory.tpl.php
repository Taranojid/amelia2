<?php
/* Smarty version 5.4.5, created on 2026-01-17 03:26:18
  from 'file:OrderHistory.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696af34a03b588_81285655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '896897534edf441062180286339a1d248a1a041f' => 
    array (
      0 => 'OrderHistory.tpl',
      1 => 1768616776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696af34a03b588_81285655 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2052874600696af34a028718_95330000', "content");
?>
a<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_2052874600696af34a028718_95330000 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="width:90%; margin: 2em auto; font-family: Arial, sans-serif;">
    <h2 style="border-bottom: 2px solid #3498db; padding-bottom: 10px;">📦 Moja Historia Zamówień</h2>

    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <table class="pure-table pure-table-bordered" style="width:100%; margin-top: 20px; background-color: white;">
        <thead>
            <tr style="background-color: #34495e; color: white;">
                <th>Numer</th>
                <th>Data złożenia</th>
                <th>Adres dostawy</th>
                <th>Łączny koszt</th>
                <th>Status</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orders'), 'o');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('o')->value) {
$foreach0DoElse = false;
?>
            <tr style="text-align: center;">
                                <td><b>#<?php echo (($tmp = $_smarty_tpl->getValue('o')['id_order'] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('o')['ORDERS_ID'] ?? null : $tmp);?>
</b></td>
                <td><?php echo $_smarty_tpl->getValue('o')['data_zamowienia'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('o')['adres_dostawy'];?>
</td>
                <td><span style="color: #2c3e50; font-weight: bold;"><?php echo $_smarty_tpl->getValue('o')['koszt_zamowienia'];?>
 zł</span></td>
                <td>
                    <?php if ($_smarty_tpl->getValue('o')['status'] == 'wysłane') {?>
                        <span style="background: #27ae60; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.9em;">Wysłane</span>
                    <?php } elseif ($_smarty_tpl->getValue('o')['status'] == 'nowe') {?>
                        <span style="background: #f39c12; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.9em;">Nowe</span>
                    <?php } else { ?>
                        <span style="background: #2980b9; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.9em;"><?php echo $_smarty_tpl->getValue('o')['status'];?>
</span>
                    <?php }?>
                </td>
                <td>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderDetails&id=<?php echo (($tmp = $_smarty_tpl->getValue('o')['id_order'] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('o')['ORDERS_ID'] ?? null : $tmp);?>
" 
                       class="pure-button" style="background: #3498db; color: white; border-radius: 3px;">
                        🔎 Zobacz detale
                    </a>
                </td>
            </tr>
        <?php
}
if ($foreach0DoElse) {
?>
            <tr>
                                <td colspan="6" style="text-align: center; padding: 20px; color: #7f8c8d;">
                    Nie złożyłeś jeszcze żadnych zamówień. <br>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: #3498db;">Zrób swoje pierwsze zakupy!</a>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button" style="background: #34495e; color: white;">
            ⬅ Powrót do sklepu
        </a>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
