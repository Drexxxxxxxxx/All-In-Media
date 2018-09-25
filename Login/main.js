function SessionLogin($Id)
{
    if (typeof(Storage) !== "undefined") {
        // Store
        sessionStorage.setItem("id", $Id);
        // Retrieve
        location.replace("Home.php");
    } else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
    }
}

function BodyonLoad()
{
    document.getElementById("result").innerHTML = sessionStorage.getItem("id");
}

function BodyonLoadSessionRequire()
{
    if(sessionStorage.getItem("id"))
    {
    document.getElementById("result").innerHTML = sessionStorage.getItem("id");
    }
    else
    {
        location.replace("Login.php"); 
    }
}