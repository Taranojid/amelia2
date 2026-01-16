{extends file="main.tpl"}

{block name="content"}
<div style="background: url('{$conf->app_url}/assets/soap-bg.jpg'); background-size: cover; padding: 100px 20px; text-align: center; color: white;">
    <h1 style="font-size: 3em; text-shadow: 2px 2px 4px #000;">Naturalne Mydła Jana</h1>
    <p style="font-size: 1.5em;">Ręcznie robione, ekologiczne, prosto z natury.</p>
    <a href="{$conf->action_url}productList" class="pure-button pure-button-primary" style="padding: 15px 30px; font-size: 1.2em;">Sprawdź nasze produkty</a>
</div>

<div style="display: flex; justify-content: space-around; padding: 50px 10%; background: #f9f9f9; text-align: center;">
    <div>
        <h3>🌿 100% Eko</h3>
        <p>Tylko naturalne składniki.</p>
    </div>
    <div>
        <h3>🧼 Ręczna robota</h3>
        <p>Każda kostka jest unikalna.</p>
    </div>
    <div>
        <h3>🚚 Szybka dostawa</h3>
        <p>Mydło u Ciebie w 48h.</p>
    </div>
</div>

<div style="padding: 50px 10%;">
    <h2 style="text-align: center;">Nasze Bestsellery</h2>
    <div style="display: flex; gap: 20px; justify-content: center;">
        {foreach $promoted as $p}
            <div style="border: 1px solid #ddd; padding: 15px; width: 250px; text-align: center;">
                <h4>{$p['nazwa_produktu']}</h4>
                <p>{$p['cena']} zł</p>
                <a href="{$conf->action_url}productList" style="color: #3498db;">Zobacz więcej</a>
            </div>
        {/foreach}
    </div>
</div>
{/block}