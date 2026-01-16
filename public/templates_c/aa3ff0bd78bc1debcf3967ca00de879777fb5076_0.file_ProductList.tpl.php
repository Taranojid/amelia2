<?php
/* Smarty version 5.4.5, created on 2026-01-16 10:18:05
  from 'file:ProductList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696a024dcdb551_88087374',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa3ff0bd78bc1debcf3967ca00de879777fb5076' => 
    array (
      0 => 'ProductList.tpl',
      1 => 1768554505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696a024dcdb551_88087374 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?><h1>Katalog naszych mydeł</h1>

<div style="background: #fff3cd; border: 1px solid #ffeeba; padding: 15px; font-size: 0.85em; margin-bottom: 20px; border-radius: 5px; color: #856404;">
    <strong>🛠 DEBUG INFO:</strong><br>
    • Ilość ról w Amelii: <b><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('conf')->roles);?>
</b> <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('conf')->roles) > 0) {?>(<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('conf')->roles, 'role');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('role')->value) {
$foreach0DoElse = false;
echo $_smarty_tpl->getValue('role');?>
 <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>)<?php }?><br>
    • Czy obiekt $user istnieje w Smarty: <b><?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>TAK (Login: <?php echo $_smarty_tpl->getValue('user')->login;?>
)<?php } else { ?>NIE<?php }?></b><br>
    • Czy sesja PHP zawiera role: <b><?php if ((true && (true && null !== ($_SESSION['_amelia_roles'] ?? null)))) {?>TAK<?php } else { ?>NIE<?php }?></b><br>
    <small style="color: #666;">*Jeśli po kliknięciu "Do koszyka" ilość ról spada do 0, brakuje RoleUtils::addRole(null) w init.php</small>
</div>

<div style="margin: 10px 0;">
    <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</div>

<nav style="background: #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🏠 Sklep</a>
        
        <?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartView" style="color: white; text-decoration: none; margin-right: 15px;">🛒 Koszyk</a>
            
            <?php if ($_smarty_tpl->getValue('isKlient')) {?>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderHistory" style="color: #3498db; text-decoration: none; margin-right: 15px;">📜 Moje zamówienia</a>
            <?php }?>

            <?php if ($_smarty_tpl->getValue('isAdmin') || $_smarty_tpl->getValue('isPracownik')) {?>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderList" style="color: #f1c40f; text-decoration: none; font-weight: bold; margin-right: 15px;">📦 Zarządzaj zamówieniami</a>
            <?php }?>
        <?php }?>
    </div>

    <div>
        <?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
            <span>Zalogowany jako: <b><?php echo $_smarty_tpl->getValue('user')->login;?>
</b></span>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-left: 10px;">Wyloguj</a>
        <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: white; text-decoration: none; margin-right: 15px;">Zaloguj się</a>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
registerRender" style="background: #3498db; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Załóż konto</a>
        <?php }?>
    </div>
</nav>


<?php if ($_smarty_tpl->getValue('isAdmin') || $_smarty_tpl->getValue('isPracownik')) {?>
    <div style="margin-bottom: 15px; display: flex; gap: 10px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productNew" style="background: green; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">+ Dodaj nowe mydło</a>
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categoryList" style="background: #d35400; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">🏷️ Kategorie</a>
        <?php if ($_smarty_tpl->getValue('isAdmin')) {?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userList" style="background: #8e44ad; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">👥 Użytkownicy</a>
        <?php }?>
    </div>
<?php }?>

<div style="margin: 20px 0; padding: 15px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 5px;">
    <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" method="get">
        <input type="hidden" name="action" value="productList">
        <label>Szukaj mydła: </label>
        <input type="text" name="sf_nazwa" value="<?php echo (($tmp = $_smarty_tpl->getValue('searchForm')->nazwa ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="padding: 5px;">
        <button type="submit" style="background: #3498db; color: white; border: none; padding: 5px 15px; cursor: pointer;">Filtruj</button>
    </form>
</div>

<table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background: #eee;">
            <th>Nazwa</th>
            <th>Cena</th>
            <th>Opis</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('produkty'), 'p');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach1DoElse = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->getValue('p')['nazwa_produktu'];?>
</td>
            <td><?php echo $_smarty_tpl->getValue('p')['cena'];?>
 zł</td>
            <td><?php echo $_smarty_tpl->getValue('p')['opis'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->getValue('isAdmin') || $_smarty_tpl->getValue('isPracownik')) {?>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productEdit&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
">Edytuj</a> | 
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productDelete&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" onclick="return confirm('Usunąć?')">Usunąć?</a>
                <?php }?>
                <?php if ($_smarty_tpl->getValue('isKlient')) {?>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartAdd&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" style="color: green; font-weight: bold;">🛒 Do koszyka</a>
                <?php }?>
            </td>
        </tr>
    <?php
}
if ($foreach1DoElse) {
?>
        <tr><td colspan="4">Brak mydeł w katalogu.</td></tr>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
