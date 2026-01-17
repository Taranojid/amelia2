<?php
/* Smarty version 5.4.5, created on 2026-01-17 01:30:47
  from 'file:ProductEdit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ad83770aaa6_57078599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42a1e72a5645f3dbe8359693852b031775ead277' => 
    array (
      0 => 'ProductEdit.tpl',
      1 => 1768609840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696ad83770aaa6_57078599 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1977850462696ad8376f8438_57737615', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1977850462696ad8376f8438_57737615 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>


<div style="max-width: 800px; margin: 0 auto; padding: 20px;">

	<h1 style="text-align: center; margin-bottom: 30px;">
		<?php if ($_smarty_tpl->getValue('product')->id_product) {?>
			✏️ Edycja mydła
		<?php } else { ?>
			➕ Dodaj nowe mydło
		<?php }?>
	</h1>

		<nav style="background: #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 5px;">
		<div>
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
mainPage" style="color: white; text-decoration:  none; font-weight: bold; margin-right: 15px;">🏠 Strona główna</a>
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🧼 Katalog</a>
		</div>
		<div>
			<?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
				<span>Zalogowany jako: <b><?php echo $_smarty_tpl->getValue('user')->login;?>
</b></span>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-left: 10px;">Wyloguj</a>
			<?php }?>
		</div>
	</nav>

		<div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
		
				<?php if ($_smarty_tpl->getValue('product')->id_product && $_smarty_tpl->getValue('product')->zdj_sciezka) {?>
		<div style="text-align:  center; margin-bottom: 20px;">
			<p style="font-weight: bold; margin-bottom: 10px;">Aktualne zdjęcie:</p>
			<img src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/uploads/products/<?php echo $_smarty_tpl->getValue('product')->zdj_sciezka;?>
" 
			     alt="<?php echo $_smarty_tpl->getValue('product')->nazwa_produktu;?>
" 
			     style="max-width: 300px; border-radius: 8px; border: 2px solid #ddd;">
		</div>
		<?php }?>

		<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productSave" method="post" enctype="multipart/form-data">
			
						<?php if ($_smarty_tpl->getValue('product')->id_product) {?>
				<input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->getValue('product')->id_product;?>
">
			<?php }?>

						<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight: bold; margin-bottom: 5px;">
					Nazwa mydła:  <span style="color: red;">*</span>
				</label>
				<input type="text" 
				       name="nazwa_produktu" 
				       value="<?php echo (($tmp = $_smarty_tpl->getValue('product')->nazwa_produktu ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" 
				       required
				       style="width: 100%; padding:  10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
			</div>

						<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight:  bold; margin-bottom: 5px;">
					Kategoria:  <span style="color: red;">*</span>
				</label>
				<select name="kategoria_id" 
				        required
				        style="width:  100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
					<option value="">-- Wybierz kategorię --</option>
					<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
						<option value="<?php echo $_smarty_tpl->getValue('cat')['id_category'];?>
" 
						        <?php if ($_smarty_tpl->getValue('product')->CATEGORIES_id_category == $_smarty_tpl->getValue('cat')['id_category']) {?>selected<?php }?>>
							<?php echo $_smarty_tpl->getValue('cat')['nazwa_kategori'];?>

						</option>
					<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
				</select>
			</div>

						<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight: bold; margin-bottom: 5px;">
					Cena (zł): <span style="color: red;">*</span>
				</label>
				<input type="number" 
				       name="cena" 
				       value="<?php echo (($tmp = $_smarty_tpl->getValue('product')->cena ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" 
				       step="0.01" 
				       min="0" 
				       required
				       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
			</div>

						<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight: bold; margin-bottom: 5px;">
					Opis: 
				</label>
				<textarea name="opis" 
				          rows="5"
				          style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em; resize: vertical;"><?php echo (($tmp = $_smarty_tpl->getValue('product')->opis ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
			</div>

						<div style="margin-bottom:  20px;">
				<label style="display: block; font-weight:  bold; margin-bottom: 5px;">
					📸 Zdjęcie produktu:
				</label>
				<input type="file" 
				       name="zdjecie" 
				       accept="image/jpeg,image/png,image/jpg,image/webp"
				       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
				<small style="color: #666; display: block; margin-top: 5px;">
					Dozwolone formaty: JPG, PNG, WEBP.  Maksymalny rozmiar: 5MB.
					<?php if ($_smarty_tpl->getValue('product')->zdj_sciezka) {?>
						<br><strong>Uwaga:</strong> Wybór nowego zdjęcia zastąpi obecne. 
					<?php }?>
				</small>
			</div>

						<div style="display: flex; gap: 10px; justify-content: center; margin-top: 30px;">
				<button type="submit" 
				        style="background: #27ae60; color: white; padding:  12px 30px; border: none; border-radius: 5px; font-size: 1.1em; font-weight: bold; cursor: pointer;">
					💾 Zapisz
				</button>
				<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" 
				   style="background: #95a5a6; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 1.1em; font-weight: bold; display: inline-block;">
					❌ Anuluj
				</a>
			</div>
		</form>
	</div>

</div>

<?php
}
}
/* {/block "content"} */
}
