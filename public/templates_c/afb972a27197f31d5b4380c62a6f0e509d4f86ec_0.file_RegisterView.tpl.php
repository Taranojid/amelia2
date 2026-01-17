<?php
/* Smarty version 5.4.5, created on 2026-01-17 02:46:01
  from 'file:RegisterView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_696ae9d9edf888_72135650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afb972a27197f31d5b4380c62a6f0e509d4f86ec' => 
    array (
      0 => 'RegisterView.tpl',
      1 => 1768614358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_696ae9d9edf888_72135650 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1666380103696ae9d9edc625_33487843', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_1666380103696ae9d9edc625_33487843 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
?>


<div style="max-width: 500px; margin: 50px auto; padding: 30px; background:  white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

	<h1 style="text-align: center; margin-bottom: 30px; color: #2c3e50;">
		📝 Rejestracja nowego konta
	</h1>

		<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
register" method="post">
		
				<div style="margin-bottom: 20px;">
			<label style="display:  block; font-weight: bold; margin-bottom: 5px; color: #34495e;">
				Login:  <span style="color: red;">*</span>
			</label>
			<input type="text" 
			       name="login" 
			       required
			       minlength="3"
			       maxlength="50"
			       placeholder="Wybierz login (min.  3 znaki)"
			       style="width: 100%; padding: 10px; border:  1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

				<div style="margin-bottom:  20px;">
			<label style="display: block; font-weight: bold; margin-bottom:  5px; color: #34495e;">
				Email: <span style="color: red;">*</span>
			</label>
			<input type="email" 
			       name="email" 
			       required
			       placeholder="twoj@email.com"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

				<div style="margin-bottom: 20px;">
			<label style="display:  block; font-weight: bold; margin-bottom: 5px; color: #34495e;">
				Imię: <span style="color: red;">*</span>
			</label>
			<input type="text" 
			       name="imie" 
			       required
			       minlength="2"
			       maxlength="50"
			       placeholder="Twoje imię"
			       style="width: 100%; padding:  10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

				<div style="margin-bottom: 20px;">
			<label style="display: block; font-weight:  bold; margin-bottom: 5px; color: #34495e;">
				Nazwisko: <span style="color: red;">*</span>
			</label>
			<input type="text" 
			       name="nazwisko" 
			       required
			       minlength="2"
			       maxlength="50"
			       placeholder="Twoje nazwisko"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

				<div style="margin-bottom: 20px;">
			<label style="display: block; font-weight: bold; margin-bottom: 5px; color: #34495e;">
				Hasło: <span style="color: red;">*</span>
			</label>
			<input type="password" 
			       name="password" 
			       required
			       minlength="6"
			       placeholder="Min. 6 znaków"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

				<div style="margin-bottom: 30px;">
			<label style="display: block; font-weight:  bold; margin-bottom: 5px; color: #34495e;">
				Powtórz hasło: <span style="color: red;">*</span>
			</label>
			<input type="password" 
			       name="password2" 
			       required
			       minlength="6"
			       placeholder="Powtórz hasło"
			       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
		</div>

				<button type="submit" 
		        style="width: 100%; background: #27ae60; color: white; padding: 12px; border: none; border-radius: 5px; font-size: 1.1em; font-weight: bold; cursor: pointer; transition: background 0.2s;"
		        onmouseover="this.style. background='#229954'" 
		        onmouseout="this.style.background='#27ae60'">
			✅ Zarejestruj się
		</button>

				<div style="text-align: center; margin-top: 20px; color: #7f8c8d;">
			Masz już konto? 
			<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: #3498db; text-decoration: none; font-weight: bold;">
				Zaloguj się
			</a>
		</div>
	</form>

</div>

<?php
}
}
/* {/block "content"} */
}
