<?php
/* Smarty version 5.4.5, created on 2026-01-16 23:12:41
  from 'file:CategoryList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ab7d98dde42_00961346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dfc9a04aac94fb7141c0d98cb482927d1720082' => 
    array (
      0 => 'CategoryList.tpl',
      1 => 1768601524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_696ab7d98dde42_00961346 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_302729886696ab7d98cfe23_33361818', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_302729886696ab7d98cfe23_33361818 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>

<div style="width:80%; margin: 2em auto;">
    <h2>Zarządzanie kategoriami produktów</h2>

    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

        <?php if ($_smarty_tpl->getValue('isPracownik')) {?>
        <div style="background: #f4f4f4; padding: 1em; border-radius: 5px; margin-bottom: 2em;">
            <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categorySave" method="post" class="pure-form">
                <label for="nazwa">Nowa kategoria:</label>
                <input type="text" name="nazwa_kategorii" id="nazwa" 
                       placeholder="np. Mydła peelingujące" 
                       minlength="3" 
                       required>
                <button type="submit" class="pure-button pure-button-primary">Dodaj kategorię</button>
            </form>
        </div>
    <?php }?>

        <table class="pure-table pure-table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa kategorii</th>
                <?php if ($_smarty_tpl->getValue('isPracownik')) {?><th>Opcje</th><?php }?>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'c');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('c')->value) {
$foreach0DoElse = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getValue('c')['id_category'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('c')['nazwa_kategori'];?>
</td>
                
                <?php if ($_smarty_tpl->getValue('isPracownik')) {?>
                    <td>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categoryDelete&id=<?php echo $_smarty_tpl->getValue('c')['id_category'];?>
" 
                           onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?')"
                           style="color: red; text-decoration: none; font-weight: bold;">Usuń</a>
                    </td>
                <?php }?>
            </tr>
        <?php
}
if ($foreach0DoElse) {
?>
            <tr>
                <td colspan="<?php if ($_smarty_tpl->getValue('isPracownik')) {?>3<?php } else { ?>2<?php }?>">Brak zdefiniowanych kategorii. </td>
            </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    
    <div style="margin-top: 2em;">
        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" class="pure-button">Powrót do produktów</a>
    </div>
</div>
<?php
}
}
/* {/block "content"} */
}
