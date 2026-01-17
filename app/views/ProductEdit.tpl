{extends file="main.tpl"}

{block name="content"}

<div style="max-width: 800px; margin: 0 auto; padding: 20px;">

	<h1 style="text-align: center; margin-bottom: 30px;">
		{if $product->id_product}
			✏️ Edycja mydła
		{else}
			➕ Dodaj nowe mydło
		{/if}
	</h1>

	{* Nawigacja *}
	<nav style="background: #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 5px;">
		<div>
			<a href="{$conf->action_url}mainPage" style="color: white; text-decoration:  none; font-weight: bold; margin-right: 15px;">🏠 Strona główna</a>
			<a href="{$conf->action_url}productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🧼 Katalog</a>
		</div>
		<div>
			{if isset($user)}
				<span>Zalogowany jako: <b>{$user->login}</b></span>
				<a href="{$conf->action_url}logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-left: 10px;">Wyloguj</a>
			{/if}
		</div>
	</nav>

	{* Formularz *}
	<div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
		
		{* Wyświetl aktualne zdjęcie jeśli edytujemy *}
		{if $product->id_product && $product->zdj_sciezka}
		<div style="text-align:  center; margin-bottom: 20px;">
			<p style="font-weight: bold; margin-bottom: 10px;">Aktualne zdjęcie:</p>
			<img src="{$conf->app_url}/uploads/products/{$product->zdj_sciezka}" 
			     alt="{$product->nazwa_produktu}" 
			     style="max-width: 300px; border-radius: 8px; border: 2px solid #ddd;">
		</div>
		{/if}

		<form action="{$conf->action_url}productSave" method="post" enctype="multipart/form-data">
			
			{* Ukryte pole ID (jeśli edycja) *}
			{if $product->id_product}
				<input type="hidden" name="id_product" value="{$product->id_product}">
			{/if}

			{* Nazwa produktu *}
			<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight: bold; margin-bottom: 5px;">
					Nazwa mydła:  <span style="color: red;">*</span>
				</label>
				<input type="text" 
				       name="nazwa_produktu" 
				       value="{$product->nazwa_produktu|default:''}" 
				       required
				       style="width: 100%; padding:  10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
			</div>

			{* Kategoria *}
			<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight:  bold; margin-bottom: 5px;">
					Kategoria:  <span style="color: red;">*</span>
				</label>
				<select name="kategoria_id" 
				        required
				        style="width:  100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
					<option value="">-- Wybierz kategorię --</option>
					{foreach $categories as $cat}
						<option value="{$cat['id_category']}" 
						        {if $product->CATEGORIES_id_category == $cat['id_category']}selected{/if}>
							{$cat['nazwa_kategori']}
						</option>
					{/foreach}
				</select>
			</div>

			{* Cena *}
			<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight: bold; margin-bottom: 5px;">
					Cena (zł): <span style="color: red;">*</span>
				</label>
				<input type="number" 
				       name="cena" 
				       value="{$product->cena|default:''}" 
				       step="0.01" 
				       min="0" 
				       required
				       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
			</div>

			{* Opis *}
			<div style="margin-bottom: 20px;">
				<label style="display: block; font-weight: bold; margin-bottom: 5px;">
					Opis: 
				</label>
				<textarea name="opis" 
				          rows="5"
				          style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em; resize: vertical;">{$product->opis|default:''}</textarea>
			</div>

			{* Upload zdjęcia *}
			<div style="margin-bottom:  20px;">
				<label style="display: block; font-weight:  bold; margin-bottom: 5px;">
					📸 Zdjęcie produktu:
				</label>
				<input type="file" 
				       name="zdjecie" 
				       accept="image/jpeg,image/png,image/jpg,image/webp"
				       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em;">
				<small style="color: #666; display: block; margin-top: 5px;">
					Dozwolone formaty: JPG, PNG, WEBP.  Maksymalny rozmiar: 5MB.
					{if $product->zdj_sciezka}
						<br><strong>Uwaga:</strong> Wybór nowego zdjęcia zastąpi obecne. 
					{/if}
				</small>
			</div>

			{* Przyciski *}
			<div style="display: flex; gap: 10px; justify-content: center; margin-top: 30px;">
				<button type="submit" 
				        style="background: #27ae60; color: white; padding:  12px 30px; border: none; border-radius: 5px; font-size: 1.1em; font-weight: bold; cursor: pointer;">
					💾 Zapisz
				</button>
				<a href="{$conf->action_url}productList" 
				   style="background: #95a5a6; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 1.1em; font-weight: bold; display: inline-block;">
					❌ Anuluj
				</a>
			</div>
		</form>
	</div>

</div>

{/block}