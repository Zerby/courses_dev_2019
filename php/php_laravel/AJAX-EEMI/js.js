function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;

function monAjax(element) {

}

var req = createInstance();

req.onreadystatechange = function () {
    if(req.readyState == 4){
        if(req.status == 200){
            monAffichage(req.responseText, element);
        }
        else{
            alert("erreur AJAX: " + req.status + " " + req.statusText);
        }
    }
};

req.open("GET", "ajax.php", true);
req.send(null);
}