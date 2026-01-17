{extends file="main.tpl"}

{block name="content"}
{* 1. Hero Section - Poprawiony czerwony przycisk *}
<div style="background: linear-gradient(rgba(204, 28, 28, 0.5), rgba(230, 0, 0, 0.5)), url('{$conf->app_url}/assets/soap-bg.jpg'); background-size: cover; background-position: center; padding: 120px 20px; text-align: center; color: white;">
    
    {* PRZYCISK: Zmieniony na czerwony z hoverem *}
    <a href="{$conf->action_url}productList" 
       style="display: inline-block; background: #c0392b; color: white; padding: 18px 40px; font-size: 1.2em; text-decoration: none; border-radius: 5px; font-weight: bold; transition: background 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
       Sprawdź nasze produkty
    </a>
</div>

{* 2. Sekcja Atutów - Lepsze odstępy *}
<div style="display: flex; justify-content: space-around; padding: 60px 10%; background: #ffffff; text-align: center; border-bottom: 1px solid #eee;">
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🌿 100% Eko</h3>
        <p style="color: #7f8c8d;">Tylko naturalne, certyfikowane składniki roślinne.</p>
    </div>
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🧼 Ręczna robota</h3>
        <p style="color: #7f8c8d;">Każda kostka jest unikalna i tworzona z pasją.</p>
    </div>
    <div style="max-width: 250px;">
        <h3 style="color: #2c3e50;">🚚 Szybka dostawa</h3>
        <p style="color: #7f8c8d;">Twoje zamówienie wyślemy w ciągu 48h.</p>
    </div>
</div>


{/block}