{extends file="main.tpl"}

{block name="content"}
<div style="width:40%; margin: 2em auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    
    <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
        ✨ Załóż konto w naszym sklepie
    </h2>

    {* Standaryzowane komunikaty (błędy walidacji haseł, zajęty login itp.) *}
    <div style="margin: 1em 0;">
        {include file='messages.tpl'}
    </div>

    <form action="{$conf->action_url}register" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <label for="id_login">Login:</label>
            <input id="id_login" type="text" name="login" value="{$form->login|default:''}" class="pure-input-1" placeholder="Twój login">

            <label for="id_email">E-mail:</label>
            <input id="id_email" type="email" name="email" value="{$form->email|default:''}" class="pure-input-1" placeholder="np. jan@kowalski.pl">

            <label for="id_pass">Hasło:</label>
            <input id="id_pass" type="password" name="pass" class="pure-input-1">

            <label for="id_pass2">Powtórz hasło:</label>
            <input id="id_pass2" type="password" name="pass2" class="pure-input-1">

            <div style="margin-top: 20px; display: flex; align-items: center; gap: 15px;">
                <button type="submit" class="pure-button pure-button-primary" style="background: #3498db; padding: 10px 20px;">
                    Zarejestruj się
                </button>
                <a href="{$conf->action_url}login" style="color: #7f8c8d; text-decoration: none;">Masz już konto? Zaloguj się</a>
            </div>
        </fieldset>
    </form>

    <div style="margin-top: 15px;">
        <a href="{$conf->action_url}productList" class="pure-button" style="font-size: 0.9em;">← Powrót do sklepu</a>
    </div>
</div>
{/block}