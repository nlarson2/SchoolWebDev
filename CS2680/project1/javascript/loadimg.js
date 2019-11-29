var image = document.getElementsByClassName("image");
var text=document.getElementsByClassName("imageSummery");
var string = window.location.href.split('?')[1];

function loadimage()
{
  if(string == 1){image[0].src="images/hotDogs/bltDog.jpg"; text[0].innerHTML = "BLT Dog<br/>MMMMM BACON";}
  if( string==2){image[0].src = "images/hotDogs/corndogMuffin.jpg"; text[0].innerHTML = "Corndog Muffin<br/>SO CUTE";}
  if( string==3){image[0].src = "images/hotDogs/grilledCheeseDogs.jpg";text[0].innerHTML = "Grilled Cheese Dog<br/>CHEESY GOODNESS";}
  if( string==4){image[0].src = "images/hotDogs/jalapenoPopperDog.jpg";text[0].innerHTML = "Jalapeno Popper Dog<br/>SPICY!!!";}
  if( string==5){image[0].src = "images/hotDogs/macAndCheeseDog.jpg";text[0].innerHTML = "Mac and Cheese Dog<br/>???WHAT???";}
  if( string==6){image[0].src = "images/hotDogs/picklebackDog.jpg";text[0].innerHTML = "Pickleback Dog<br/> EVERYONE LIKES A GOOD PICKLE";}
  if( string==7){image[0].src = "images/hotDogs/pizzaDog.jpg";text[0].innerHTML = "Pizza Dog<br/> RANDOM AWESOMENESS";}
  if( string==8){image[0].src = "images/hotDogs/QuesaDogas.jpg";text[0].innerHTML = "QuesaDogas<br/>ALL WRAPPED UP";}
  if( string==9){image[0].src = "images/hotDogs/tacoDog.jpg";text[0].innerHTML = "Taco Dog<br/> WHERE HAS THE TACOBELL DOG BEEN??";}
  if( string==10){image[0].src = "images/hotDogs/waffleCornDog.jpg";text[0].innerHTML = "Waffle Corndog<br/>ANYTIME OF DAY";}
}
