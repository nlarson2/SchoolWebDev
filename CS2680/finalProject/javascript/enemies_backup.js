/*********************************************************************/
/**********************      ENEMY CLASS      ************************/
/**********************   Created 11/20/2018  ************************/
/********  Enemy related functions for movement, printing,  **********/
/**************  attacking, and variable for battle  *****************/
/*********************************************************************/

/****holds enemy objects****/
var enemies =[];

/***used for initializing enemies***/
/*** [0]=x [1]=y [2]=direction [3]=health it is facing***/
var enemyPos =[
  [46,72,2,2],
  [86,1,2,2],
  [32,29,2,3],
  [6,7,1,3]
];


function initEnemies()
{
  for(var i = 0; i<enemyPos.length;i++)
      enemies[i]=new EnemyObject(enemyPos[i][0],enemyPos[i][1],enemyPos[i][2], enemyPos[i][3]);
}


function printEnemies()
{
  for(var i = 0; i < enemies.length; i++)
      enemies[i].printEnemy();
}

//checks to see if any of enemy entity is on the map
function enemyOnTile(j,i)
{
  for(var e = 0; e < enemies.length; e++)
    if(enemies[e].xPos == j && enemies[e].yPos == i && enemies[e].alive)
      return true;

    return false;
}

function getBattleEnemy()
{
  for(var e = 0; e < enemies.length; e++)
    if(enemies[e].battling==true)
      return enemies[e];
}

function allEnemiesDead()
{
  for(var i = 0; i<enemies.length;i++)
      if(enemies[i].health>0)
        return false;

  return true;
}

/*********************************************************************/
/**********************      ENEMY CLASS      ************************/
/*********************************************************************/

class EnemyObject {
  constructor(x,y,d,h) {
    this.xPos = x;
    this.yPos = y;
    this.direction = d; /***0=up, 1=right, 2 = down, 3 = left***/
    this.health=h;
    this.ImgSrc;
    this.setImgSrc();
    this.alive = true;//determine if the enemy can still attack
    this.battling=false;
  }
//prints this enemy
  printEnemy()
  {
    var xDif = this.xPos-playerPosX;//xDif and yDif get the difference
    var yDif = this.yPos-playerPosY;//between the player and this enemy

    //if its within 9 paces away
    if((xDif<=9 && xDif>=-9) && (yDif<=9 && yDif>=-9) && this.alive)
    {
      var printEnemyPosX=144-16*(playerPosX-this.xPos);/*X and Y print location*/
      var printEnemyPosY=144-16*(playerPosY-this.yPos);/*****of this enemy******/
      var image=new Image();
      image.src = this.ImgSrc;
      context.drawImage(image,printEnemyPosX,printEnemyPosY+16,16,-25);
      //checks to see if the layer is in sight of them
      this.checkForPlayer();
    }
  }

  getChoice()
  {
    //1=rock 2=paper 3=scissors
    var compChoice=Math.floor(Math.random()*3);
    return compChoice+1;
  }

  moveEnemy()
  {
    var xDif = this.xPos-playerPosX;
    var yDif = this.yPos-playerPosY;
    if(xDif < 0 || yDif < 0)//conversts difference to a positive number if it is negative
    {
      xDif*=(-1);
      yDif*=(-1);
    }

      switch(this.direction)
      {
        case 0:
          //y--
          enemyMoving=true;//set enemy to moving to stop player from moving
          if(yDif>1)//keep moving
            this.yPos--;
          if(yDif==1)//stop moving
          {
            enemyMoving=false;
            inBattle=true;
            this.battling=true;
          }

        break;
        case 1:
          //x++
          enemyMoving=true;
          if(xDif>1)
            this.xPos++;
          if(xDif==1)
          {
            enemyMoving=false;
            inBattle=true;
            this.battling=true;
          }

        break;
        case 2:
          //y++
          enemyMoving=true;
          if(yDif>1)
            this.yPos++;
          if(yDif==1)
          {
            enemyMoving=false;
            inBattle=true;
            this.battling=true;
          }
        break;
        case 3:
          //x--
          enemyMoving=true;
          if(xDif>1)
            this.xPos--;
          if(xDif==1)
          {
            enemyMoving=false;
            inBattle=true;
            this.battling=true;
          }

        break;
      }
  }
  checkForPlayer()
  {
    var tempPosX = this.xPos;
    var tempPosY = this.yPos;
      if(this.alive)
      {
        switch(this.direction)
        {
          case 0:
            //y--
            tempPosY--;
            for(var i = 0; i<5;i++)
            {

              if(playerPosY == tempPosY-- && this.xPos == playerPosX)
              {
                this.moveEnemy();
                break;
              }
            }
          break;
          case 1:
            //x++
            tempPosX++;
            for(var i = 0; i<5;i++)
            {
              if(playerPosX == tempPosX++&& this.yPos == playerPosY)
              {
                this.moveEnemy();
                break;
              }
            }
          break;
          case 2:
            //y++
            tempPosY++;
            for(var i = 0; i<5;i++)
            {
              if(playerPosY == tempPosY++&& this.xPos == playerPosX)
              {
                this.moveEnemy();
                break;
              }
            }
          break;
          case 3:
            //x--
            tempPosX--;
            for(var i = 0; i<5;i++)
            {
              if(playerPosX == tempPosX--&& this.yPos == playerPosY)
              {
                this.moveEnemy();
                break;
              }
            }
          break;
        }
      }
  }

  setImgSrc()
  {
    switch(this.direction)
    {
      case 0:
        this.ImgSrc = "images/sprites/enemy/eBack.png";
      break;
      case 1:
        this.ImgSrc = "images/sprites/enemy/eRight.png";
      break;
      case 2:
        this.ImgSrc = "images/sprites/enemy/eFront.png";
      break;
      case 3:
        this.ImgSrc = "images/sprites/enemy/eLeft.png";
      break;
    }
  }

}
