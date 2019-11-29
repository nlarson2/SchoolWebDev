var string = window.location.href.split('?')[1];

function loadPage(page,name)
{
  var myWindow = window.open(page+".html?"+name, "_self");
}

$("#home").on('click',function(ev) {
    ev.preventDefault();
    loadPage("home",string);
  });
$("#adventureIsh").on('click',function(ev) {
    ev.preventDefault();
    loadPage("adventureIsh",string);
  });
  $("#adventureIshThumb").on('click',function(ev) {
      ev.preventDefault();
      loadPage("adventureIsh",string);
    });
$("#blackJack").on('click',function(ev) {
  ev.preventDefault();
  loadPage("comingSoon",string);
});
$("#highLow").on('click',function(ev) {
  ev.preventDefault();
  loadPage("comingSoon",string);
});
$("#rockPaperScissors").on('click',function(ev) {
  ev.preventDefault();
  loadPage("comingSoon",string);
});
$("#diceRoll").on('click',function(ev) {
    ev.preventDefault();
    loadPage("comingSoon",string);
  });


$("#namePlace").html("WELCOME&nbsp&nbsp&nbsp"+string);
