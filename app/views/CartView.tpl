<h1>Katalog naszych mydeł</h1>

{* 1. Wyświetlanie komunikatów systemowych *}
<div style="margin:  10px 0;">
    {include file='messages.tpl'}
</div>

{* 2. Sekcja nawigacji i statusu logowania *}
<nav style="background: #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="{$conf->action_url}productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🏠 Sklep</a>
        
        {* KOSZYK - tylko dla klientów *}
        {if $isKlient}
            <a href="{$conf->action_url}cartView" style="color: white; text-decoration: none; margin-right: 15px;">🛒 Koszyk</a>
            <a href="{$conf->action_url}orderHistory" style="color: #3498db; text-decoration:  none; margin-right: 15px;">📜 Moje zamówienia</a>
        {/if}

        {* ZARZĄDZANIE ZAMÓWIENIAMI - tylko dla pracowników *}
        {if $isPracownik}
            <a href="{$conf->action_url}orderList" style="color: #f1c40f; text-decoration:  none; font-weight: bold; margin-right: 15px;">📦 Zarządzaj zamówieniami</a>
        {/if}

        {* ZARZĄDZANIE UŻYTKOWNIKAMI - tylko dla adminów *}
        {if $isAdmin}
            <a href="{$conf->action_url}userList" style="color:  #8e44ad; text-decoration:  none; font-weight: bold; margin-right: 15px;">👥 Użytkownicy</a>
        {/if}
    </div>

    <div>
        {if isset($user)}
            <span>Zalogowany jako: <b>{$user->login}</b> 
                <small style="color: #bbb;">({$user->role})</small>
            </span>
            <a href="{$conf->action_url}logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-left: 10px;">Wyloguj</a>
        {else}
            <a href="{$conf->action_url}login" style="color: white; text-decoration: none; margin-right: 15px;">Zaloguj się</a>
            <a href="{$conf->action_url}registerRender" style="background: #3498db; color:  white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Załóż konto</a>
        {/if}
    </div>
</nav>

{* 3. Przyciski administracyjne - TYLKO DLA PRACOWNIKA *}
{if $isPracownik}
    <div style="margin-bottom: 15px; display: flex; gap: 10px;">
        <a href="{$conf->action_url}productNew" style="background: green; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">+ Dodaj nowe mydło</a>
        <a href="{$conf->action_url}categoryList" style="background: #d35400; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">🏷️ Kategorie</a>
    </div>
{/if}

{* 4. Wyszukiwarka *}
<div style="margin:  20px 0; padding: 15px; background:  #f9f9f9; border:  1px solid #ddd; border-radius: 5px;">
    <form action="{$conf->action_url}productList" method="get">
        <input type="hidden" name="action" value="productList">
        <label>Szukaj mydła:  </label>
        <input type="text" name="sf_nazwa" value="{$searchForm->nazwa|default:''}" style="padding: 5px;">
        <button type="submit" style="background: #3498db; color: white; border: none; padding: 5px 15px; cursor: pointer;">Filtruj</button>
    </form>
</div>

{* 5. Tabela produktów *}
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
    {foreach $produkty as $p}
        <tr>
            <td>{$p['nazwa_produktu']}</td>
            <td>{$p['cena']} zł</td>
            <td>{$p['opis']}</td>
            <td>
                {* Edycja/usuwanie - TYLKO DLA PRACOWNIKA *}
                {if $isPracownik}
                    <a href="{$conf->action_url}productEdit&id={$p['id_product']}">Edytuj</a> | 
                    <a href="{$conf->action_url}productDelete&id={$p['id_product']}" onclick="return confirm('Usunąć? ')">Usunąć? </a>
                {/if}
                
                {* Koszyk - TYLKO DLA KLIENTA *}
                {if $isKlient}
                    <a href="{$conf->action_url}cartAdd&id={$p['id_product']}" style="color: green; font-weight: bold;">🛒 Do koszyka</a>
                {/if}

                {* Admin widzi tylko produkty, bez akcji *}
                {if $isAdmin}
                    <span style="color: #999;">Brak akcji (admin)</span>
                {/if}

                {* Niezalogowany użytkownik *}
                {if !isset($user)}
                    <a href="{$conf->action_url}login" style="color: #3498db;">Zaloguj się aby kupić</a>
                {/if}
            </td>
        </tr>
    {foreachelse}
        <tr><td colspan="4">Brak mydeł w katalogu.</td></tr>
    {/foreach}
    </tbody>
</table>