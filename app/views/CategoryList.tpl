{extends file="main.tpl"}

{block name="content"}
<div style="width:80%; margin: 2em auto;">
    <h2>Zarządzanie kategoriami produktów</h2>

    {include file="messages.tpl"}

    {* 1. Zabezpieczenie formularza dodawania - tylko dla Admina/Pracownika *}
    {if $isPracownik}
        <div style="background: #f4f4f4; padding: 1em; border-radius: 5px; margin-bottom: 2em;">
            <form action="{$conf->action_url}categorySave" method="post" class="pure-form">
                <label for="nazwa">Nowa kategoria:</label>
                <input type="text" name="nazwa_kategorii" id="nazwa" 
                       placeholder="np. Mydła peelingujące" 
                       minlength="3" 
                       required>
                <button type="submit" class="pure-button pure-button-primary">Dodaj kategorię</button>
            </form>
        </div>
    {/if}

    {* Tabela z kategoriami *}
    <table class="pure-table pure-table-bordered" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa kategorii</th>
                {if $isPracownik}<th>Opcje</th>{/if}
            </tr>
        </thead>
        <tbody>
        {foreach $categories as $c}
            <tr>
                <td>{$c['id_category']}</td>
                <td>{$c['nazwa_kategori']}</td>
                
                {if $isPracownik}
                    <td>
                        <a href="{$conf->action_url}categoryDelete&id={$c['id_category']}" 
                           onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?')"
                           style="color: red; text-decoration: none; font-weight: bold;">Usuń</a>
                    </td>
                {/if}
            </tr>
        {foreachelse}
            <tr>
                <td colspan="{if $isPracownik}3{else}2{/if}">Brak zdefiniowanych kategorii. </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
    
    <div style="margin-top: 2em;">
        <a href="{$conf->action_url}productList" class="pure-button">Powrót do produktów</a>
    </div>
</div>
{/block}