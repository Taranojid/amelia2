{extends file="main.tpl"}

{block name="content"}
<style>
    .admin-container { width: 95%; margin: 2em auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .admin-header { border-bottom: 3px solid #8e44ad; padding-bottom: 15px; color: #2c3e50; display: flex; align-items: center; gap: 10px; }
    
    .user-table { width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .user-table thead tr { background: #2c3e50; color: white; text-align: left; }
    .user-table th, .user-table td { padding: 15px; border-bottom: 1px solid #eee; }
    .user-table tbody tr:hover { background-color: #f9f9f9; transition: 0.2s; }

    .role-badge { 
        padding: 4px 10px; border-radius: 20px; font-size: 0.85em; font-weight: 600; text-transform: uppercase;
        background: #ecf0f1; border: 1px solid #bdc3c7; color: #7f8c8d;
    }
    
    .btn-role { 
        padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 0.8em; font-weight: bold; 
        transition: opacity 0.2s; display: inline-block;
    }
    .btn-role:hover { opacity: 0.8; color: white !important; }

    .status-active { color: #27ae60; font-weight: bold; }
    .status-blocked { color: #e74c3c; font-weight: bold; }

    .action-btn {
        padding: 8px 16px; border-radius: 4px; color: white; text-decoration: none; 
        font-size: 0.85em; font-weight: 600; display: inline-block; min-width: 100px; text-align: center;
    }
</style>

<div class="admin-container">
    <h2 class="admin-header">👥 Zarządzanie użytkownikami</h2>

    {include file="messages.tpl"}

    <div style="margin: 20px 0;">
        <a href="{$conf->action_url}productList" class="pure-button" style="border-radius: 4px;">← Powrót do katalogu</a>
    </div>

    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Rola</th>
                <th>Status</th>
                <th>Zmień uprawnienia</th>
                <th style="text-align: right;">Akcje</th>
            </tr>
        </thead>
        <tbody>
    {foreach $users as $u}
        {* POMIJAJ UŻYTKOWNIKÓW Z ROLĄ ADMIN *}
        {if $u['rola_nazwa'] == 'admin'}{continue}{/if}
        
        <tr>
            <td><small style="color: #95a5a6;">#{$u['id_user']}</small></td>
            <td><strong>{$u['login']}</strong></td>
            <td>
                <span class="role-badge">
                    {$u['rola_nazwa']|default:'brak'}
                </span>
            </td>
            <td>
                {if $u['czy_aktywny'] == 1}
                    <span class="status-active">● Aktywny</span>
                {else}
                    <span class="status-blocked">● Zablokowany</span>
                {/if}
            </td>
            <td>
                <div style="display: flex; gap: 8px;">
                    <a href="{$conf->action_url}userChangeRole&id={$u['id_user']}&role=admin" class="btn-role" style="background: #8e44ad; color: white;">Admin</a>
                    <a href="{$conf->action_url}userChangeRole&id={$u['id_user']}&role=pracownik" class="btn-role" style="background: #f1c40f; color: #2c3e50;">Pracownik</a>
                    <a href="{$conf->action_url}userChangeRole&id={$u['id_user']}&role=klient" class="btn-role" style="background: #3498db; color: white;">Klient</a>
                </div>
            </td>
            <td style="text-align: right;">
                <a href="{$conf->action_url}userActive&id={$u['id_user']}&active={if $u['czy_aktywny']==1}0{else}1{/if}" 
                   class="action-btn" 
                   style="background: {if $u['czy_aktywny']==1}#e74c3c{else}#2ecc71{/if};"
                   onclick="return confirm('Czy na pewno chcesz zmienić status tego użytkownika?')">
                    {if $u['czy_aktywny']==1}🔒 Zablokuj{else}🔓 Odblokuj{/if}
                </a>
            </td>
        </tr>
    {foreachelse}
        <tr>
            <td colspan="6" style="text-align: center; padding: 40px; color: #7f8c8d;">Brak użytkowników (nie-administratorów) w systemie.</td>
        </tr>
    {/foreach}
</tbody>
    </table>
</div>
{/block}