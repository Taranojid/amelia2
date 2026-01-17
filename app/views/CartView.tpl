{extends file="main.tpl"}

{block name="content"}
<div style="width:80%; margin: 2em auto;">
    {include file='messages.tpl'}
    
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="{$conf->action_url}productList" class="pure-button">← Powrót do sklepu</a>
    </div>

    <h1>🛒 Twój koszyk</h1>

    {if empty($cart_products)}
        <div class="l-box">
            <p>Twój koszyk jest pusty. <a href="{$conf->action_url}productList">Dodaj jakieś mydła!</a></p>
        </div>
    {else}
        <table class="pure-table pure-table-bordered" style="width: 100%;">
            <thead>
                <tr style="background: #eee;">
                    <th>Produkt</th>
                    <th>Cena jedn.</th>
                    <th>Ilość</th>
                    <th>Suma</th>
                </tr>
            </thead>
            <tbody>
                {foreach $cart_products as $p}
                    <tr>
                        <td>{$p['nazwa_produktu']}</td>
                        <td>{$p['cena']} zł</td>
                        <td>{$p['quantity']} szt.</td>
                        <td>{$p['cena'] * $p['quantity']} zł</td>
                    </tr>
                {/foreach}
            </tbody>
            <tfoot>
                <tr style="font-weight: bold; background: #f9f9f9;">
                    <td colspan="3" style="text-align: right;">ŁĄCZNIE:</td>
                    <td>{$total} zł</td>
                </tr>
            </tfoot>
        </table>

        <div style="margin-top: 30px; padding: 25px; background: #fdfdfd; border: 1px solid #ddd; border-radius: 5px;">
            <h3>📍 Dane do wysyłki</h3>
            <form action="{$conf->action_url}orderSave" method="post" class="pure-form pure-form-stacked">
                <label for="id_adres">Adres dostawy:</label>
                <textarea name="adres" id="id_adres" rows="4" 
                          style="width: 100%; margin-bottom: 20px; padding: 10px;" 
                          placeholder="np. ul. Mydlana 4/2, 00-001 Warszawa" required></textarea>
                
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <button type="submit" class="pure-button pure-button-primary" 
                            style="background: #27ae60; padding: 15px 30px; font-size: 1.1em;">
                        🚀 Potwierdzam zamówienie
                    </button>
                    
                    <a href="{$conf->action_url}cartClear" 
                       onclick="return confirm('Czy na pewno chcesz opróżnić koszyk?')"
                       style="color: #c0392b; text-decoration: none; font-weight: bold;">
                        🗑️ Wyczyść koszyk
                    </a>
                </div>
            </form>
        </div>
    {/if}
</div>
{/block}