/*********************************************************************/
/**********************       DRAW GAME       ************************/
/**********************   Created 11/20/2018  ************************/
/****************The purpose is to update the screen******************/
/*********************************************************************/
/*********************************************************************/


/***GLOBAL VARIABLES***/
var inMenu = true;
var gameOver = false;
var enemyMoving = false;
var inBattle = false;
var cont = false; //pause at certain spots
var decided = false;
var win = false;
var youLose = false;
/***INITIALIZE ENEMIES***/
initEnemies();


/************************************************/
/**************      DRAW GAME   ****************/
/************************************************/
function drawGame()
{
  if(inMenu)
  {
    drawMenu();
  }
  else
  {
    if(allEnemiesDead()||gameOver)
    {
      gameOver = true;
      var image=new Image();

      context.fillStyle="#000000";
      if(youLose)
      {
        context.fillRect(0,0,304,304);
        image.src= "../images/LOSE.png";
        context.drawImage(image,50,70,200,100);
      }
      else
      {
        context.fillRect(0,0,304,304);
        image.src= "../images/WIN.png";
        context.drawImage(image,50,70,200,100);
      }

      context.strokeRect(90, 220, 125, 25);
      context.fillStyle="#FFFFFF";
      context.fillText("RESET",130,237);
    }

    if(!inBattle && !gameOver)
    {
  	   drawMap();
       printPlayer();
       printEnemies();
    }
    else if(inBattle && !gameOver)
    {
      var enemy = getBattleEnemy();
      drawBattle(enemy);
    }
  }

	requestAnimationFrame(drawGame);
}
