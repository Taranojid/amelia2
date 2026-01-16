{extends file="main.tpl"}

{block name="content"}
<div style="width:95%; margin: 2em auto;">

    <h1>📦 Panel obsługi zamówień</h1>
    
    {* Poprawiona ścieżka do komunikatów zgodnie ze standardem Amelii *}
    {include file="messages.tpl"}

    <nav style="margin-bottom: 20px;">
        <a href="{$conf->action_url}productList" class="pure-button">← Powrót do katalogu mydeł</a>
    </nav>

    <table class="pure-table pure-table-bordered" style="width: 100%;">
        <thead>
            <tr style="background: #f2f2f2;">
                <th>ID</th>
                <th>Klient</th>
                <th>Data złożenia</th>
                <th>Suma</th>
                <th>Adres dostawy</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            {foreach $orders as $o}
            <tr>
                {* Użycie operatora default dla bezpieczeństwa kluczy ID *}
                <td><b>#{$o['id_order']|default:$o['ORDERS_ID']}</b></td>
                <td>{$o['login']}</td>
                <td>{$o['data_zamowienia']}</td>
                <td>{$o['koszt_zamowienia']} zł</td>
                <td>{$o['adres_dostawy']}</td>
                <td>
                    {* Dynamiczne stylowanie statusu *}
                    <span style="padding: 4px 8px; border-radius: 4px; color: #333; font-weight: bold; background: {if $o['status']=='nowe'}#ffeb3b{else}#c8e6c9{/if};">
                        {$o['status']}
                    </span>
                </td>
                <td>
                    <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                        <a href="{$conf->action_url}orderDetails&id={$o['id_order']|default:$o['ORDERS_ID']}" 
                           class="pure-button" style="font-size: 0.9em;">
                           🔍 Podgląd
                        </a>

                        {if $o['status'] == 'nowe'}
                            <a href="{$conf->action_url}orderShip&id={$o['id_order']|default:$o['ORDERS_ID']}" 
                               class="pure-button" 
                               style="background: #2196f3; color: white; font-size: 0.9em;"
                               onclick="return confirm('Czy na pewno oznaczyć zamówienie jako wysłane?')">
                               ✅ Wyślij
                            </a>
                        {else}
                            <span style="color: gray; font-size: 0.8em; align-self: center;">Brak akcji</span>
                        {/if}
                    </div>
                </td>
            </tr>
            {foreachelse}
            <tr>
                <td colspan="7" style="text-align: center; padding: 2em;">Brak zamówień do wyświetlenia.</td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{/block}