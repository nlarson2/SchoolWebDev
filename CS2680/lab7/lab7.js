// utility function definitions
// changeImg // changeText // hide // show

function changeImg(id,src) {
    var elem = document.getElementById(id);
    if(elem) {
        elem.src = src;
    }else {
        console.log("error: "+id+" DNE");
    }
}
function changeText(id, text) {
    var elem = document.getElementById(id);
    if(elem) {
        elem.innerHTML = text;
    }else {
        console.log("error: "+id+" DNE");
    }
}

function hide(id) {
    var elem = document.getElementById(id);
    if(elem) {
        elem.style.visibility = 'hidden';
    }else {
        console.log("error: "+id+" DNE");
    }
}
function show(id) {
    var elem = document.getElementById(id);
    if(elem) {
        elem.style.visibility = 'visible';
    }else {
        console.log("error: "+id+" DNE");
    }
}
