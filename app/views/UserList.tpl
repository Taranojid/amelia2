{extends file="main.tpl"}

{block name="content"}
<div style="width:95%; margin: 2em auto;">
    <h2 style="border-bottom: 2px solid #8e44ad; padding-bottom: 10px;">👥 Zarządzanie użytkownikami i uprawnieniami</h2>

    {* Standaryzowane komunikaty (np. "Rola została zmieniona") *}
    {include file="messages.tpl"}

    <div style="margin-bottom: 20px;">
        <a href="{$conf->action_url}productList" class="pure-button">← Powrót do katalogu</a>
    </div>

    <table class="pure-table pure-table-bordered" style="width: 100%;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th>ID</th>
                <th>Login</th>
                <th>Obecna Rola</th>
                <th>Status konta</th>
                <th>Zmień rolę na:</th>
                <th>Zarządzanie dostępem</th>
            </tr>
        </thead>
        <tbody>
            {foreach $users as $u}
            <tr>
                <td>{$u['id_user']}</td>
                <td><b>{$u['login']}</b></td>
                <td>
                    <span style="background: #ecf0f1; padding: 2px 6px; border-radius: 3px; border: 1px solid #bdc3c7;">
                        {$u['rola_nazwa']|default:'brak'}
                    </span>
                </td>
                <td>
                    {if $u['czy_aktywny'] == 1}
                        <b style="color: green;">✔ Aktywny</b>
                    {else}
                        <b style="color: red;">✖ Zablokowany</b>
                    {/if}
                </td>
                <td>
                    <div style="display: flex; gap: 5px;">
                        <a href="{$conf->action_url}userChangeRole&id={$u['id_user']}&role=admin" class="pure-button" style="font-size: 0.8em; background: #8e44ad; color: white;">Admin</a>
                        <a href="{$conf->action_url}userChangeRole&id={$u['id_user']}&role=pracownik" class="pure-button" style="font-size: 0.8em; background: #f1c40f; color: black;">Pracownik</a>
                        <a href="{$conf->action_url}userChangeRole&id={$u['id_user']}&role=klient" class="pure-button" style="font-size: 0.8em; background: #3498db; color: white;">Klient</a>
                    </div>
                </td>
                <td>
                    <a href="{$conf->action_url}userActive&id={$u['id_user']}&active={if $u['czy_aktywny']==1}0{else}1{/if}" 
                       class="pure-button {if $u['czy_aktywny']==1}button-error{else}button-success{/if}"
                       style="font-size: 0.9em; width: 100px; text-align: center; background: {if $u['czy_aktywny']==1}#e74c3c{else}#2ecc71{/if}; color: white; text-decoration: none; border-radius: 3px; display: inline-block;"
                       onclick="return confirm('Czy na pewno chcesz zmienić status tego użytkownika?')">
                        {if $u['czy_aktywny']==1}🔒 Zablokuj{else}🔓 Odblokuj{/if}
                    </a>
                </td>
            </tr>
            {foreachelse}
                <tr><td colspan="6">Brak użytkowników w systemie.</td></tr>
            {/foreach}
        </tbody>
    </table>
</div>
{/block}