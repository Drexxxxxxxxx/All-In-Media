<?php
include_once '_header.php';
?>
<div id="Perfil">
<?php
PerfilData();
Amigos();
mydisplay();
?>
</div>
<button onclick="$('#CurrentPassWordDivID').toggle();">Change Password</button>
<div class="input-group" id="CurrentPassWordDivID"  style="display: none;">
    <input type="password" class="form-control" placeholder="Insert youre current password" id="CurrentPassWordInputID">
    <div class="input-group-append">
        <Button class="input-group-text" onclick="CurrentPassWordFuncID();">&ThickSpace; Search &ThickSpace;</Button>
    </div>
</div>

<div class="input-group" id="NewPassWordDivID"  style="display: none;">
    <input type="password" class="form-control" placeholder="Insert the new password" id="NewPassWordInputID">
    <input type="password" class="form-control" placeholder="Insert Same password" id="NewPassWordInputID2">
    <div class="input-group-append">
        <Button class="input-group-text" onclick="ChangePassWordFuncID();">&ThickSpace; Search &ThickSpace;</Button>
    </div>
</div>
<script>
function CurrentPassWordFuncID()
{
    $.post('handlers/ajax.php?action=CheckPassword&Password=' + $('#CurrentPassWordInputID').val(), function(response){			
        if(response)
        {
            alert('Now insert the new password');
            $("#CurrentPassWordDivID").toggle();
            $("#NewPassWordDivID").toggle();
        }
        else
        {
            alert('Password Errada');
        }
    });        
}
function ChangePassWordFuncID()
{
    if($('#NewPassWordInputID').val() == $('#NewPassWordInputID2').val())
    {
        $.post('handlers/ajax.php?action=ChangePassword&Password=' + $('#NewPassWordInputID').val(), function(response){			
            if(response)
            {
                alert('The password was successfully changed');
                location.reload();
            }
            else
            {
                alert('An uncexpected error as occured, sorry');
            }
        });        
    }
    else
    {
        alert('The passwords are diferent! and the password cant be empty');
    }
}
</script>
