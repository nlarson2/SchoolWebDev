/*********************************************************************/
/********************     ADVENTUREISH MENU     **********************/
/**********************   Started 11/21/2018  ************************/
/*****************   create a start menu for game   ******************/
/*********************************************************************/
/*********************************************************************/


var start = false;
function drawMenu()
{
  var image = new Image();
  image.src = "../images/sprites/blackSquare.png";
  for (var i = 0; i<19 ; i++)//columns
  {
    for (var j= 0; j<19 ; j++)//rows
    {
      //draw the image to the screen//last two variables are the sprite size
      context.drawImage(image,printPosX,printPosY,16,16);
      //adjust 1 sprite width over
      printPosX+=16;
   }
   printPosX=0;//reset to left of screen
   printPosY+=16;//drop down 1 sprite size

  }
  printPosX=0;//reset both to top left
  printPosY=0;

  var title = new Image();
  title.src = "../images/title.png";
  context.drawImage(title,20,50,250,80);

  context.strokeStyle ="#FFFFFF";
  context.strokeRect(109, 182, 75, 25);
  context.fillText("START",125,200);


}
