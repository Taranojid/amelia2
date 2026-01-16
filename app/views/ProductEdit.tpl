{extends file="main.tpl"}

{block name="content"}
<div style="width:60%; margin: 2em auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    
    <h2>{if isset($form->id_product) && $form->id_product > 0}Edycja{else}Dodawanie{/if} mydła</h2>

    {* Standaryzowane komunikaty frameworka Amelia *}
    {include file='messages.tpl'}

    <form action="{$conf->action_url}productSave" method="post" class="pure-form pure-form-stacked">
        <input type="hidden" name="id_product" value="{$form->id_product|default:''}">

        <fieldset>
            <label for="nazwa_produktu">Nazwa mydła:</label>
            <input id="nazwa_produktu" type="text" name="nazwa_produktu" value="{$form->nazwa_produktu|default:''}" class="pure-input-1">

            <label for="id_kategorii">Kategoria:</label>
            <select id="id_kategorii" name="id_kategorii" class="pure-input-1">
                <option value="">-- Wybierz kategorię --</option>
                {foreach $categories as $cat}
                    <option value="{$cat['id_category']}" 
                    {if (isset($form->id_kategorii) && $form->id_kategorii == $cat['id_category'])}selected{/if}>
                        {$cat['nazwa_kategorii']|default:$cat['nazwa_kategori']}
                    </option>
                {/foreach}
            </select>

            <label for="cena">Cena (zł):</label>
            <input id="cena" type="number" step="0.01" name="cena" value="{$form->cena|default:''}" class="pure-input-1">

            <label for="opis">Opis produktu:</label>
            <textarea id="opis" name="opis" class="pure-input-1" rows="5">{$form->opis|default:''}</textarea>

            <div style="margin-top: 20px; display: flex; gap: 10px;">
                <button type="submit" class="pure-button pure-button-primary" style="background: #27ae60;">
                    💾 Zapisz produkt
                </button>
                <a href="{$conf->action_url}productList" class="pure-button" style="background: #7f8c8d; color: white;">
                    Anuluj
                </a>
            </div>
        </fieldset>
    </form>
</div>
{/block}