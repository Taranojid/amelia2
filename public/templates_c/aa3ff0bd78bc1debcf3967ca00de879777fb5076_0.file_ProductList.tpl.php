<?php
/* Smarty version 5.4.5, created on 2026-01-16 23:00:42
  from 'file:ProductList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ab50a0eec78_65770393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa3ff0bd78bc1debcf3967ca00de879777fb5076' => 
    array (
      0 => 'ProductList.tpl',
      1 => 1768600839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696ab50a0eec78_65770393 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?><h1>Katalog naszych mydeł</h1>

<div style="margin:  10px 0;">
    <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</div>

<nav style="background:  #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🏠 Sklep</a>
        
                <?php if ($_smarty_tpl->getValue('isKlient')) {?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartView" style="color: white; text-decoration: none; margin-right: 15px;">🛒 Koszyk</a>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderHistory" style="color: #3498db; text-decoration: none; margin-right: 15px;">📜 Moje zamówienia</a>
        <?php }?>

                <?php if ($_smarty_tpl->getValue('isPracownik')) {?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderList" style="color: #f1c40f; text-decoration: none; font-weight: bold; margin-right: 15px;">📦 Zarządzaj zamówieniami</a>
        <?php }?>

                <?php if ($_smarty_tpl->getValue('isAdmin')) {?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userList" style="color:  #8e44ad; text-decoration:  none; font-weight: bold; margin-right: 15px;">👥 Użytkownicy</a>
        <?php }?>
    </div>

    <div>
        <?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
            <span>Zalogowany jako: <b><?php echo $_smarty_tpl->getValue('user')->login;?>
</b> 
                <small style="color: #bbb;">(<?php echo $_smarty_tpl->getValue('user')->role;?>
)</small>
            </span>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius:  3px; margin-left:  10px;">Wyloguj</a>
        <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: white; text-decoration: none; margin-right:  15px;">Zaloguj się</a>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
registerRender" style="background: #3498db; color:  white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Załóż konto</a>
        <?php }?>
    </div>
</nav>

<?php if ($_smarty_tpl->getValue('isPracownik')) {?>
    <div style="margin-bottom: 15px; display:  flex; gap: 10px;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productNew" style="background: green; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">+ Dodaj nowe mydło</a>
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categoryList" style="background: #d35400; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">🏷️ Kategorie</a>
    </div>
<?php }?>

<div style="margin: 20px 0; padding: 15px; background:  #f9f9f9; border:  1px solid #ddd; border-radius: 5px;">
    <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" method="get" style="display: flex; gap:  10px; align-items: center; flex-wrap: wrap;">
        <input type="hidden" name="action" value="productList">
        
        <label style="font-weight: bold;">Szukaj mydła:</label>
        <input type="text" name="sf_nazwa" value="<?php echo (($tmp = $_smarty_tpl->getValue('searchForm')->nazwa ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" 
               placeholder="Wpisz nazwę..." 
               style="padding: 8px; border: 1px solid #ccc; border-radius:  3px; flex: 1; min-width: 200px;">
        
        <label style="font-weight: bold;">Kategoria:</label>
        <select name="sf_kategoria" style="padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
            <option value="wszystkie" <?php if (!$_smarty_tpl->getValue('searchForm')->kategoria || $_smarty_tpl->getValue('searchForm')->kategoria == 'wszystkie') {?>selected<?php }?>>
                Wszystkie
            </option>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('cat')['id_category'];?>
" 
                        <?php if ($_smarty_tpl->getValue('searchForm')->kategoria == $_smarty_tpl->getValue('cat')['id_category']) {?>selected<?php }?>>
                    <?php echo $_smarty_tpl->getValue('cat')['nazwa_kategori'];?>

                </option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
        
        <button type="submit" style="background: #3498db; color:  white; border: none; padding: 8px 20px; cursor: pointer; border-radius: 3px; font-weight: bold;">
            🔍 Filtruj
        </button>
        
                <?php if ($_smarty_tpl->getValue('searchForm')->nazwa || ($_smarty_tpl->getValue('searchForm')->kategoria && $_smarty_tpl->getValue('searchForm')->kategoria != 'wszystkie')) {?>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" 
               style="background: #95a5a6; color: white; padding: 8px 20px; text-decoration: none; border-radius: 3px; font-weight: bold;">
                ✖ Wyczyść
            </a>
        <?php }?>
    </form>
</div>

<table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background: #eee;">
            <th>Nazwa</th>
            <th>Cena</th>
            <th>Opis</th>
            <?php if (!$_smarty_tpl->getValue('isAdmin')) {?>
                <th>Opcje</th>
            <?php }?>
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
            
            <?php if (!$_smarty_tpl->getValue('isAdmin')) {?>
                <td>
                    <?php if ($_smarty_tpl->getValue('isPracownik')) {?>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productEdit&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
">Edytuj</a> | 
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productDelete&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" onclick="return confirm('Usunąć? ')">Usuń</a>
                    <?php }?>
                    
                    <?php if ($_smarty_tpl->getValue('isKlient')) {?>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartAdd&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" style="color: green; font-weight: bold;">🛒 Do koszyka</a>
                    <?php }?>

                    <?php if (!(true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: #3498db;">Zaloguj się aby kupić</a>
                    <?php }?>
                </td>
            <?php }?>
        </tr>
    <?php
}
if ($foreach1DoElse) {
?>
        <tr>
            <td colspan="<?php if ($_smarty_tpl->getValue('isAdmin')) {?>3<?php } else { ?>4<?php }?>" style="text-align: center; padding: 20px; color: #7f8c8d;">
                <?php if ($_smarty_tpl->getValue('searchForm')->nazwa || ($_smarty_tpl->getValue('searchForm')->kategoria && $_smarty_tpl->getValue('searchForm')->kategoria != 'wszystkie')) {?>
                    Nie znaleziono mydeł spełniających kryteria.  <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList">Pokaż wszystkie</a>
                <?php } else { ?>
                    Brak mydeł w katalogu. 
                <?php }?>
            </td>
        </tr>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
