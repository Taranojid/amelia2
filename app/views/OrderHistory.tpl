{extends file="main.tpl"}

{block name="content"}
<div style="width:90%; margin: 2em auto; font-family: Arial, sans-serif;">
    <h2 style="border-bottom: 2px solid #3498db; padding-bottom: 10px;">📦 Moja Historia Zamówień</h2>

    {include file="messages.tpl"}

    <table class="pure-table pure-table-bordered" style="width:100%; margin-top: 20px; background-color: white;">
        <thead>
            <tr style="background-color: #34495e; color: white;">
                <th>Numer</th>
                <th>Data złożenia</th>
                <th>Adres dostawy</th>
                <th>Łączny koszt</th>
                <th>Status</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
        {foreach $orders as $o}
            <tr style="text-align: center;">
                {* Użycie domyślnych kluczy dla elastyczności *}
                <td><b>#{$o['id_order']|default:$o['ORDERS_ID']}</b></td>
                <td>{$o['data_zamowienia']}</td>
                <td>{$o['adres_dostawy']}</td>
                <td><span style="color: #2c3e50; font-weight: bold;">{$o['koszt_zamowienia']} zł</span></td>
                <td>
                    {if $o['status'] == 'wysłane'}
                        <span style="background: #27ae60; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.9em;">Wysłane</span>
                    {elseif $o['status'] == 'nowe'}
                        <span style="background: #f39c12; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.9em;">Nowe</span>
                    {else}
                        <span style="background: #2980b9; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.9em;">{$o['status']}</span>
                    {/if}
                </td>
                <td>
                    <a href="{$conf->action_url}orderDetails&id={$o['id_order']|default:$o['ORDERS_ID']}" 
                       class="pure-button" style="background: #3498db; color: white; border-radius: 3px;">
                        🔎 Zobacz detale
                    </a>
                </td>
            </tr>
        {foreachelse}
            <tr>
                {* Poprawiono colspan na 6, aby pasował do liczby nagłówków *}
                <td colspan="6" style="text-align: center; padding: 20px; color: #7f8c8d;">
                    Nie złożyłeś jeszcze żadnych zamówień. <br>
                    <a href="{$conf->action_url}productList" style="color: #3498db;">Zrób swoje pierwsze zakupy!</a>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <a href="{$conf->action_url}productList" class="pure-button" style="background: #34495e; color: white;">
            ⬅ Powrót do sklepu
        </a>
    </div>
</div>
{/block}