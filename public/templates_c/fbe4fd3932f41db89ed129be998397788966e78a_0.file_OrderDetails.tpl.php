<?php
/* Smarty version 5.4.5, created on 2026-01-17 03:22:53
  from 'file:OrderDetails.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696af27d431421_75927674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbe4fd3932f41db89ed129be998397788966e78a' => 
    array (
      0 => 'OrderDetails.tpl',
      1 => 1768616570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696af27d431421_75927674 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_475066390696af27d422021_07533504', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_475066390696af27d422021_07533504 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="width:80%; margin: 2em auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    
        <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
        📄 Szczegóły zamówienia #<?php echo (($tmp = $_smarty_tpl->getValue('orderInfo')['id_order'] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('orderInfo')['ORDERS_ID'] ?? null : $tmp);?>

    </h2>

    <div style="margin: 20px 0; line-height: 1.6;">
        <p><b>Data złożenia:</b> <?php echo $_smarty_tpl->getValue('orderInfo')['data_zamowienia'];?>
</p>
        <p><b>Adres dostawy:</b> <?php echo $_smarty_tpl->getValue('orderInfo')['adres_dostawy'];?>
</p>
        <p><b>Status:</b> 
            <span style="background: #3498db; color: white; padding: 3px 8px; border-radius: 4px;">
                <?php echo $_smarty_tpl->getValue('orderInfo')['status'];?>

            </span>
        </p>
    </div>

        <table class="pure-table pure-table-bordered" style="width:100%; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f8f9fa; text-align: left;">
                <th>Produkt</th>
                <th>Cena w dniu zakupu</th>
                <th>Ilość</th>
                <th>Wartość</th>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('items'), 'item');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getValue('item')['nazwa_produktu'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('item')['cena_zakupu'];?>
 zł</td>
                <td><?php echo $_smarty_tpl->getValue('item')['ilosc'];?>
 szt.</td>
                                <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')(($_smarty_tpl->getValue('item')['cena_zakupu']*$_smarty_tpl->getValue('item')['ilosc']),2);?>
 zł</td>
            </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
        <tfoot>
            <tr style="background: #f1f2f6; font-size: 1.2em; font-weight: bold;">
                <td colspan="3" style="text-align: right; padding: 15px;">Suma całkowita:</td>
                <td style="color: #e67e22;"><?php echo (($tmp = $_smarty_tpl->getValue('orderInfo')['total_price'] ?? null)===null||$tmp==='' ? $_smarty_tpl->getValue('orderInfo')['koszt_zamowienia'] ?? null : $tmp);?>
 zł</td>
            </tr>
        </tfoot>
    </table>

    <div style="margin-top: 30px; display: flex; gap: 15px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderHistory" class="pure-button" style="background: #7f8c8d; color: white; text-decoration: none;">
            ⬅ Powrót do historii
        </a>
        
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button">
            🏠 Do sklepu
        </a>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
