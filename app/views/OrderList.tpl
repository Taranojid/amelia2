{extends file="main.tpl"}

{block name="content"}
<style>
    .order-container { width: 95%; margin: 2em auto; font-family: 'Segoe UI', sans-serif; }
    .status-badge { 
        padding: 5px 10px; border-radius: 20px; font-size: 0.85em; font-weight: bold; text-transform: uppercase; 
    }
    .status-nowe { background: #fff9c4; color: #f57f17; border: 1px solid #fbc02d; }
    .status-wyslane { background: #e8f5e9; color: #2e7d32; border: 1px solid #4caf50; }
    
    .order-table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .order-table th { background: #34495e; color: white; padding: 12px; text-align: left; }
    .order-table td { padding: 12px; border-bottom: 1px solid #eee; vertical-align: middle; }
    .order-table tr:hover { background: #f8f9fa; }
    
    .btn-action { padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 0.85em; font-weight: 600; display: inline-flex; align-items: center; gap: 5px; }
    .btn-ship { background: #2980b9; color: white; transition: 0.3s; }
    .btn-ship:hover { background: #3498db; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
</style>

<div class="order-container">
    <h1 style="color: #2c3e50; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
        📦 Panel obsługi zamówień
    </h1>
    
    {include file="messages.tpl"}

    <div style="margin-bottom: 20px;">
        <a href="{$conf->action_url}productList" class="pure-button" style="border-radius: 4px;">← Powrót do katalogu</a>
    </div>

    <table class="order-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Klient</th>
                <th>Data</th>
                <th>Suma</th>
                <th>Adres dostawy</th>
                <th>Status</th>
                <th style="text-align: right;">Akcje</th>
            </tr>
        </thead>
        <tbody>
            {foreach $orders as $o}
            <tr>
                {* KLUCZ: Używamy orders_id bo tak zadeklarowałeś w kontrolerze w action_orderList *}
                <td><strong style="color: #7f8c8d;">#{$o['orders_id']}</strong></td>
                <td><i class="fa fa-user"></i> {$o['login']}</td>
                <td style="font-size: 0.9em; color: #34495e;">{$o['data_zamowienia']}</td>
                <td style="font-weight: bold; color: #2c3e50;">{$o['koszt_zamowienia']} zł</td>
                <td style="max-width: 200px; font-size: 0.85em; color: #636e72;">{$o['adres_dostawy']}</td>
                <td>
                    {if $o['status'] == 'nowe'}
                        <span class="status-badge status-nowe">Nowe</span>
                    {else}
                        <span class="status-badge status-wyslane">Wysłane</span>
                    {/if}
                </td>
                <td style="text-align: right;">
                    <div style="display: flex; gap: 10px; justify-content: flex-end;">
                        <a href="{$conf->action_url}orderDetails&id={$o['orders_id']}" 
                           class="btn-action" style="background: #ecf0f1; color: #2c3e50; border: 1px solid #bdc3c7;">
                           🔍 Szczegóły
                        </a>

                        {if $o['status'] == 'nowe'}
                            <a href="{$conf->action_url}orderShip&id={$o['orders_id']}" 
                               class="btn-action btn-ship" 
                               onclick="return confirm('Czy na pewno oznaczyć zamówienie #{$o['orders_id']} jako wysłane?')">
                               🚚 Wyślij
                            </a>
                        {/if}
                    </div>
                </td>
            </tr>
            {foreachelse}
            <tr>
                <td colspan="7" style="text-align: center; padding: 50px; color: #bdc3c7;">
                    <p style="font-size: 1.2em;">Brak zamówień w systemie.</p>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{/block}