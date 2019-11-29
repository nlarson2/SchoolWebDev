/*********************************************************************/
/**********************      ADVENTUREISH     ************************/
/**********************   Started 11/20/2018  ************************/
/*****************   create the area for the game   ******************/
/*********************************************************************/
/*********************************************************************/

/***Update 11/21/2018*****/
/***Changing to a 3 canvas system//menu//game//battle***////(maybe)


  var canvas = document.getElementById('adventureIshGameArea');
  var context = canvas.getContext("2d");

  context.canvas.width= 304;
  context.canvas.height=304;
  /*var menuCanvas = document.createElement('canvas');
  var menuCtx = menuCanvas.getContext("2d");
  var gameCanvas = document.createElement('canvas');
  var gameCtx = gameCanvas.getContext("2d");
  var battleCanvas = document.createElement('canvas');
  var battleCtx = battleCanvas.getContext("2d");*/

	requestAnimationFrame(drawGame);
	context.font = "bold 10pt sans-serif";
  context.fillStyle = "white";



  document.getElementById('adventureIshGameArea').addEventListener("mousedown", function(e)
  {
    var rect = e.target.getBoundingClientRect();
    var x = e.clientX - rect.left; //x position within the element.
    var y = e.clientY - rect.top;

    if(!decided && inBattle)
    {
      if(x>=20*2 && x<=95*2 && y>=260*2 && y<=285*2)
      {
        playerChoice =  1;
      }
      if(x>=110*2 && x<=185*2 && y>=260*2 && y<=285*2)
      {
        playerChoice = 2;
      }
      if(x>=200*2 && x<=275*2 && y>=260*2 && y<=285*2)
      {
        playerChoice = 3;
      }
    }
    if (gameOver)
    {
      if(x>=90*2 && x<=215*2 && y>=220*2 && y<=245*2)
      {
        playerHealth = 15;
        gameOver = false;
        inMenu = true;
        enemyMoving = false;
        inBattle = false;
        cont = false; //pause at certain spots
        decided = false;
        win = false;
        youLose = false;

        initEnemies();

        playerPosX = 40;
        playerPosY = 50;
      }
    }

    if (inMenu)
    {
      context.strokeRect(109, 182, 75, 25);
      if(x>=109*2 && x<=184*2 && y>=182*2 && y<=207*2)
      {
        inMenu = false;
      }
    }




  },false);
