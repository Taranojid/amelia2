<?php
/* Smarty version 5.4.5, created on 2026-01-16 23:07:35
  from 'file:ProductEdit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ab6a71be249_49153773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42a1e72a5645f3dbe8359693852b031775ead277' => 
    array (
      0 => 'ProductEdit.tpl',
      1 => 1768601238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696ab6a71be249_49153773 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1325803514696ab6a71aca62_03932656', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1325803514696ab6a71aca62_03932656 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="width:60%; margin: 2em auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    
    <h2><?php if ((true && (true && null !== ($_smarty_tpl->getValue('form')->id_product ?? null))) && $_smarty_tpl->getValue('form')->id_product > 0) {?>Edycja<?php } else { ?>Dodawanie<?php }?> mydła</h2>

    <?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productSave" method="post" class="pure-form pure-form-stacked">
        <input type="hidden" name="id_product" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->id_product ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

        <fieldset>
            <label for="nazwa_produktu">Nazwa mydła:</label>
            <input id="nazwa_produktu" type="text" name="nazwa_produktu" 
                   value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->nazwa_produktu ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" 
                   class="pure-input-1" required>

            <label for="id_kategorii">Kategoria:</label>
            <select id="id_kategorii" name="id_kategorii" class="pure-input-1" required>
                <option value="">-- Wybierz kategorię --</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('cat')['id_category'];?>
" 
                    <?php if (((true && (true && null !== ($_smarty_tpl->getValue('form')->CATEGORIES_id_category ?? null))) && $_smarty_tpl->getValue('form')->CATEGORIES_id_category == $_smarty_tpl->getValue('cat')['id_category'])) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->getValue('cat')['nazwa_kategori'];?>

                    </option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>

            <label for="cena">Cena (zł):</label>
            <input id="cena" type="number" step="0.01" name="cena" 
                   value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->cena ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" 
                   class="pure-input-1" required>

            <label for="opis">Opis produktu:</label>
            <textarea id="opis" name="opis" class="pure-input-1" rows="5"><?php echo (($tmp = $_smarty_tpl->getValue('form')->opis ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>

            <div style="margin-top: 20px; display: flex; gap: 10px;">
                <button type="submit" class="pure-button pure-button-primary" style="background: #27ae60;">
                    💾 Zapisz produkt
                </button>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button" style="background: #7f8c8d; color: white;">
                    Anuluj
                </a>
            </div>
        </fieldset>
    </form>
</div>
<?php
}
}
/* {/block "content"} */
}
