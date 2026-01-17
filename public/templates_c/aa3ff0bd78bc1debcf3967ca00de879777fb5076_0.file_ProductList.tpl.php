<?php
/* Smarty version 5.4.5, created on 2026-01-17 01:39:51
  from 'file:ProductList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ada57accbb8_28894379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa3ff0bd78bc1debcf3967ca00de879777fb5076' => 
    array (
      0 => 'ProductList.tpl',
      1 => 1768610389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696ada57accbb8_28894379 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1314117223696ada57aaf8f9_21901458', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1314117223696ada57aaf8f9_21901458 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>


<div style="max-width: 1400px; margin: 0 auto; padding: 20px;">

	<h1 style="text-align: center; margin-bottom: 30px;">Katalog naszych mydeł</h1>

		<nav style="background: #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 5px;">
		<div>
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
mainPage" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🏠 Strona główna</a>
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🧼 Katalog</a>
			
						<?php if ((($tmp = $_smarty_tpl->getValue('isKlient') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartView" style="color: white; text-decoration: none; margin-right: 15px;">🛒 Koszyk</a>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderHistory" style="color: #3498db; text-decoration: none; margin-right: 15px;">📜 Moje zamówienia</a>
			<?php }?>

						<?php if ((($tmp = $_smarty_tpl->getValue('isPracownik') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderList" style="color: #f1c40f; text-decoration:  none; font-weight: bold; margin-right: 15px;">📦 Zarządzaj zamówieniami</a>
			<?php }?>

						<?php if ((($tmp = $_smarty_tpl->getValue('isAdmin') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userList" style="color: #8e44ad; text-decoration: none; font-weight: bold; margin-right: 15px;">👥 Użytkownicy</a>
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
logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-left: 10px;">Wyloguj</a>
			<?php } else { ?>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: white; text-decoration: none; margin-right: 15px;">Zaloguj się</a>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
registerRender" style="background: #3498db; color:  white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Załóż konto</a>
			<?php }?>
		</div>
	</nav>

		<?php if ((($tmp = $_smarty_tpl->getValue('isPracownik') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
		<div style="margin-bottom: 15px; display: flex; gap: 10px;">
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productNew" style="background: green; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">+ Dodaj nowe mydło</a>
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categoryList" style="background: #d35400; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">🏷️ Kategorie</a>
		</div>
	<?php }?>

		<div style="margin:  20px 0; padding: 15px; background:  #f9f9f9; border:  1px solid #ddd; border-radius: 5px;">
		<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" method="get" style="display: flex; gap:  10px; align-items: center; flex-wrap: wrap;">
			<input type="hidden" name="action" value="productList">
			
			<label style="font-weight: bold;">Szukaj mydła:</label>
			<input type="text" name="sf_nazwa" value="<?php echo (($tmp = $_smarty_tpl->getValue('searchForm')->nazwa ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" 
			       placeholder="Wpisz nazwę..." 
			       style="padding: 8px; border: 1px solid #ccc; border-radius: 3px; flex: 1; min-width: 200px;">
			
			<label style="font-weight: bold;">Kategoria:</label>
			<select name="sf_kategoria" style="padding:  8px; border: 1px solid #ccc; border-radius: 3px;">
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

		<table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%; background: white; border-radius: 5px; overflow: hidden;">
		<thead>
			<tr style="background: #eee;">
				<th style="width: 100px;">Zdjęcie</th>
				<th>Nazwa</th>
				<th style="width: 100px;">Cena</th>
				<th>Opis</th>
				<?php if (!((($tmp = $_smarty_tpl->getValue('isAdmin') ?? null)===null||$tmp==='' ? false ?? null : $tmp))) {?>
					<th style="width: 200px;">Opcje</th>
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
								<td style="padding: 10px; text-align: center; vertical-align: middle;">
					<?php if ($_smarty_tpl->getValue('p')['zdj_sciezka']) {?>
						<img src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/uploads/products/<?php echo $_smarty_tpl->getValue('p')['zdj_sciezka'];?>
" 
						     alt="<?php echo $_smarty_tpl->getValue('p')['nazwa_produktu'];?>
" 
						     style="max-width: 80px; max-height: 80px; border-radius: 5px; object-fit: cover; border: 1px solid #ddd;">
					<?php } else { ?>
						<div style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; background: #f5f5f5; border-radius: 5px; border: 1px solid #ddd;">
							<span style="color: #bbb; font-size: 2. 5em;">📦</span>
						</div>
					<?php }?>
				</td>
				
				<td style="vertical-align: middle;"><strong><?php echo $_smarty_tpl->getValue('p')['nazwa_produktu'];?>
</strong></td>
				<td style="color: #e74c3c; font-weight: bold; font-size: 1.2em; text-align: center; vertical-align: middle;"><?php echo $_smarty_tpl->getValue('p')['cena'];?>
 zł</td>
				<td style="vertical-align: middle;"><?php echo $_smarty_tpl->getValue('p')['opis'];?>
</td>
				
				<?php if (!((($tmp = $_smarty_tpl->getValue('isAdmin') ?? null)===null||$tmp==='' ? false ?? null : $tmp))) {?>
					<td style="vertical-align: middle; white-space: nowrap;">
						<?php if ((($tmp = $_smarty_tpl->getValue('isPracownik') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
							<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productEdit&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" 
							   style="color: #3498db; text-decoration: none; margin-right: 10px;">
								✏️ Edytuj
							</a>
							<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productDelete&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" 
							   onclick="return confirm('Czy na pewno usunąć ten produkt?');"
							   style="color: #e74c3c; text-decoration: none;">
								🗑️ Usuń
							</a>
						<?php }?>
						
						<?php if ((($tmp = $_smarty_tpl->getValue('isKlient') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
							<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartAdd&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" 
							   style="color: green; font-weight: bold; text-decoration: none;">
								🛒 Do koszyka
							</a>
						<?php }?>

						<?php if (!(true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
							<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: #3498db; text-decoration: none;">
								🔒 Zaloguj się aby kupić
							</a>
						<?php }?>
					</td>
				<?php }?>
			</tr>
		<?php
}
if ($foreach1DoElse) {
?>
			<tr>
				<td colspan="<?php if ((($tmp = $_smarty_tpl->getValue('isAdmin') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>4<?php } else { ?>5<?php }?>" style="text-align: center; padding: 40px; color: #7f8c8d;">
					<?php if ($_smarty_tpl->getValue('searchForm')->nazwa || ($_smarty_tpl->getValue('searchForm')->kategoria && $_smarty_tpl->getValue('searchForm')->kategoria != 'wszystkie')) {?>
						<strong>Nie znaleziono mydeł spełniających kryteria. </strong><br>
						<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: #3498db; text-decoration: none;">Pokaż wszystkie</a>
					<?php } else { ?>
						<strong>Brak mydeł w katalogu.</strong>
					<?php }?>
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
