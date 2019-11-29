window.onhashchange = function() {
    var url = window.location.hash;
    url = url.substring(1);
    var split = url.split("?");
    url = split[0];
    var params = split[1];
    requestPage(url,params);
}
window.addEventListener("load",function(){
    var url = window.location.hash;
    url = url.substring(1);
    var split = url.split("?");
    url = split[0];
    var params = split[1];
    requestPage(url, params);
});


var content = document.getElementById('content');
$('.stop').click(function(e){
    e.preventDefault();
    window.location.hash = e.target.id;
});

function requestPage(link, params) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          content.innerHTML = xhttp.responseText;
        } else if (this.status == 404) {
            window.location.hash = 'home';
        } else {
            content.innerHTML = xhttp.responseText;
        }
      };
    if(params == '')
        xhttp.open("GET", "pages/"+link+".php", true);
    else
        xhttp.open("GET", "pages/"+link+".php?"+params, true);
    xhttp.send();
}
