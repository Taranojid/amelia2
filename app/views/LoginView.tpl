{extends file="main.tpl"}

{block name=content}
<div class="row padding">
    <div class="col span_8" style="float: none; margin: 0 auto;">
        <div class="l-box">
            <form action="{$conf->action_url}login" method="post" class="pure-form pure-form-stacked">
                <fieldset>
                    <legend>Logowanie do systemu</legend>
                    
                    <label for="id_login">Login:</label>
                    <input id="id_login" type="text" name="login" value="{$form->login|default:''}">
                    
                    <label for="id_pass">Hasło:</label>
                    {* Zmiana typu na password dla bezpieczeństwa *}
                    <input id="id_pass" type="password" name="pass">
                    
                    <div style="margin-top: 1em;">
                        <input type="submit" value="Zaloguj" class="btn btn-primary"/>
                    </div>
                </fieldset>
            </form>    
        </div>

        <hr>

        {* Warunek !isset($user) jest poprawny, ale skoro w ProductList używamy 
           już mechanizmu ról, warto być konsekwentnym.
        *}
        {if !isset($user)}
            <p>
                Nie masz konta? <a href="{$conf->action_url}registerRender">Zarejestruj się tutaj</a> 
            </p>
        {/if}
        
        <div style="margin-top: 1em;">
            {include file='messages.tpl'}
        </div>
    </div>
</div>
{/block}