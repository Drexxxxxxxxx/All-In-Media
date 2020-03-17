document.getElementById("file-uploadVideo").onchange = function () {
    document.getElementById("formUploadVideo").submit();
}

document.getElementById("file-uploadImage").onchange = function () {
    $("#submit_image").click();
}

var valor = 0;
$(document).ready(function () {
    //loadChat(1);
    ChatName();
});
function ChatName() {
    var urlval = getUrlVars()["idgrupo"];
    $.post('../PHP/Handlers/ChatHandler.php?action=ChatName&idgrupo=' + urlval, function (response) {
        $('#nomegrupoId').html(response);
    });
}

function EnterText() {
    var message = $('.emojionearea-editor').html();
    var urlval = getUrlVars()["idgrupo"];
    $.post('../PHP/Handlers/ChatHandler.php?action=SendMessage&message=' + message + '&idgrupo=' + urlval, function (response) {
        $('.emojionearea-editor').html('');
    });
}
function loadChat(firsTime) {
    var urlval = getUrlVars()["idgrupo"];

    valor = $('.eachclass').last().attr('id');

    $.post('../PHP/Handlers/ChatHandler.php?action=getChat&idgrupo=' + urlval + '&ultimo=' + valor, function (response) {
        $('#chathistory').append(response);
        valor = $('.eachclass').last().attr('id');

        if (response) {
            $.post('../PHP/Handlers/ChatHandler.php?action=LastSeenMessage&idgrupo=' + urlval + '&ultimo=' + valor, function (response) {
            });
        }
    });
}
var primeiravez = 0;
setInterval(function () {
    loadChat(0);

    if (primeiravez == 0) {
        var urlval = getUrlVars()["idgrupo"];
        var LastRead = getUrlVars()["LastRead"];
        var element_to_scroll_to = document.getElementById(parseInt(LastRead));
        if (element_to_scroll_to != null) {
            primeiravez = 1;
            element_to_scroll_to.scrollIntoView();
        }
        $.post('../PHP/Handlers/ChatHandler.php?action=GetLastMessage&idgrupo=' + urlval, function (response) {
            var newurl = window.location.href;
            window.history.pushState({ path: newurl }, '', newurl);
        });
    }
}, 1000);


function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function AddPersonBtn1() {
    var urlval = getUrlVars()["idgrupo"];
    $.post('../PHP/Handlers/ChatHandler.php?action=AdicionarPessoa&idgrupo=' + urlval, function (response) {
        $('.Adicionarppldiv').toggle();
        $('.Adicionarppldiv').html(response);
    });
}

function Addpersonahref($id) {
    var urlval = getUrlVars()["idgrupo"];
    $.post('../PHP/Handlers/ChatHandler.php?action=AdicionarPersonahref&idpessoa=' + $id + '&idgrupo=' + urlval, function (response) {

        $('.Adicionarppldiv').html(response);
    });
}


function VerVideo($video) {
    $("#v1").html('<source src="' + $video + '" class="test" type="video/mp4"></source>');
    $("#AbrirVideo video")[0].load();
    $("#AbrirVideo").fadeToggle("3000");
}


function DivVideo() {
    $('#v1').get(0).pause();
    $("#AbrirVideo").fadeToggle("3000");
}