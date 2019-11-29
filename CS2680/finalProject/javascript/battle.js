
/*var playing = false;
var waiting = false;*/

var mouseX;
var mouseY;
var holdPlChoice,holdCoChoice;

function drawBattle(enemy)
{
    drawBackGroundAndNames();
    drawHealth(enemy);

    var eCh = enemy.getChoice();

    //setTimeout(function(){enemy.health-=1;},2000);

    if(enemy.health == 0)
    {
      inBattle = false;
      enemy.alive = false;
      enemy.battling = false;
      holdPlChoice = 0;
    }
    if(playerHealth == 0)
    {
      holdPlChoice = 0;
      gameOver = true;
      youLose = true;
    }
    if((playerChoice==1 && eCh==2)||(playerChoice==2 && eCh==3)||(playerChoice==3 && eCh==1))
    {
      playerHealth -=1;
      holdPlChoice = playerChoice;
      holdCoChoice = eCh;
      playerChoice = 0;
    }
    if((playerChoice==2 && eCh==1)||(playerChoice==3 && eCh==2)||(playerChoice==1 && eCh==3))
    {
      enemy.health-=1;
      holdPlChoice = playerChoice;
      holdCoChoice = eCh;
      playerChoice = 0;
    }
    if(playerChoice==eCh)
    {
      holdPlChoice = playerChoice;
      holdCoChoice = eCh;
    }

}



function drawBackGroundAndNames()
{

  //  playing = waiting = true;
    //context2.clearRect(0, 0, canvas.width, canvas.height);
    //context.requestAnimationFrame(displayMap);
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


    context.fillText("PLAYER",10,20);
    context.fillText("ENEMY",250,20);

    /*choices*/
      context.strokeStyle="#FFFFFF";
      context.strokeRect(20, 260, 75, 25);
      context.strokeRect(110, 260, 75, 25);
      context.strokeRect(200, 260, 75, 25);
      context.fillText("ROCK",38,278);
      context.fillText("PAPER",125,278);
      context.fillText("SCISSORS",203,278);


    if(holdPlChoice>0)
    {
      context.strokeRect(20, 100, 120, 120);
      context.strokeRect(165, 100, 120, 120);
      console.log("Player: "+holdPlChoice);
      console.log("Computer: "+holdCoChoice);
      context.drawImage(pChoice[holdPlChoice-1],20,100,120,120);
      context.drawImage(eChoice[holdCoChoice-1],165,100,120,120);
    }

}


var pChoice = [];
pChoice[0] = new Image();
pChoice[0].src = "../images/sprites/pRock.png";
pChoice[1] = new Image();
pChoice[1].src = "../images/sprites/pPaper.png";
pChoice[2] = new Image();
pChoice[2].src = "../images/sprites/pScissors.png";

var eChoice = [];
eChoice[0] = new Image();
eChoice[0].src = "../images/sprites/eRock.png";
eChoice[1] = new Image();
eChoice[1].src = "../images/sprites/ePaper.png";
eChoice[2] = new Image();
eChoice[2].src = "../images/sprites/eScissors.png";


function drawHealth(enemy)
{
  var heart = new Image();
  heart.src = "../images/sprites/heart.svg";

  var y = 30, x = 10;
  var counter = 0;
  for(var i= 0; i<playerHealth;i++)
  {
    context.drawImage(heart, x , y, 16,16);
    x+=20;
    if(counter==4)
      {y+=17; counter = 0;}
    else
      counter++;
    if(x==110){x=10}
  }

  x = 25;
  for(var i= 0; i<enemy.health;i++)
  {
    context.drawImage(heart, 304-x , 30, 16,16);
    x+=20;
  }
}
