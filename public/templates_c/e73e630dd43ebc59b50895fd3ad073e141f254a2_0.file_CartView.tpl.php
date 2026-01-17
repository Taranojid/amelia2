<?php
/* Smarty version 5.4.5, created on 2026-01-17 02:58:15
  from 'file:CartView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696aecb73678d5_16126352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e73e630dd43ebc59b50895fd3ad073e141f254a2' => 
    array (
      0 => 'CartView.tpl',
      1 => 1768602380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696aecb73678d5_16126352 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_416377576696aecb735a6d6_44088996', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_416377576696aecb735a6d6_44088996 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="width:80%; margin: 2em auto;">
    <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button">← Powrót do sklepu</a>
    </div>

    <h1>🛒 Twój koszyk</h1>

    <?php if (( !$_smarty_tpl->hasVariable('cart_products') || empty($_smarty_tpl->getValue('cart_products')))) {?>
        <div class="l-box">
            <p>Twój koszyk jest pusty. <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList">Dodaj jakieś mydła!</a></p>
        </div>
    <?php } else { ?>
        <table class="pure-table pure-table-bordered" style="width: 100%;">
            <thead>
                <tr style="background: #eee;">
                    <th>Produkt</th>
                    <th>Cena jedn.</th>
                    <th>Ilość</th>
                    <th>Suma</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cart_products'), 'p');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('p')['nazwa_produktu'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('p')['cena'];?>
 zł</td>
                        <td><?php echo $_smarty_tpl->getValue('p')['quantity'];?>
 szt.</td>
                        <td><?php echo $_smarty_tpl->getValue('p')['cena']*$_smarty_tpl->getValue('p')['quantity'];?>
 zł</td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
            <tfoot>
                <tr style="font-weight: bold; background: #f9f9f9;">
                    <td colspan="3" style="text-align: right;">ŁĄCZNIE:</td>
                    <td><?php echo $_smarty_tpl->getValue('total');?>
 zł</td>
                </tr>
            </tfoot>
        </table>

        <div style="margin-top: 30px; padding: 25px; background: #fdfdfd; border: 1px solid #ddd; border-radius: 5px;">
            <h3>📍 Dane do wysyłki</h3>
            <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderSave" method="post" class="pure-form pure-form-stacked">
                <label for="id_adres">Adres dostawy:</label>
                <textarea name="adres" id="id_adres" rows="4" 
                          style="width: 100%; margin-bottom: 20px; padding: 10px;" 
                          placeholder="np. ul. Mydlana 4/2, 00-001 Warszawa" required></textarea>
                
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <button type="submit" class="pure-button pure-button-primary" 
                            style="background: #27ae60; padding: 15px 30px; font-size: 1.1em;">
                        🚀 Potwierdzam zamówienie
                    </button>
                    
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartClear" 
                       onclick="return confirm('Czy na pewno chcesz opróżnić koszyk?')"
                       style="color: #c0392b; text-decoration: none; font-weight: bold;">
                        🗑️ Wyczyść koszyk
                    </a>
                </div>
            </form>
        </div>
    <?php }?>
</div>
<?php
}
}
/* {/block "content"} */
}
