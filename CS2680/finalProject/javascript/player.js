var playerImg ="../images/sprites/player/pFront.png";
var playerPosX = 40;
var playerPosY = 53;
var playerHealth = 15;
var playerChoice= 0;

function printPlayer()
{
  var image = new Image();
  image.src=playerImg;
  context.drawImage(image,144,160,16,-25);
}

function movePlayerUp()
{
  if(tileWalkable(playerPosX,playerPosY-1)==1)
    playerPosY--;
  playerImg ="../images/sprites/player/pBack.png";

}
function movePlayerDown()
{
  if(tileWalkable(playerPosX,playerPosY+1)==1)
    playerPosY++;
  playerImg ="../images/sprites/player/pFront.png";
}
function movePlayerLeft()
{
  if(tileWalkable(playerPosX-1,playerPosY)==1)
    playerPosX--;
  playerImg ="../images/sprites/player/pLeft.png";
}
function movePlayerRight()
{
  if(tileWalkable(playerPosX+1,playerPosY)==1)
    playerPosX++;
  playerImg ="../images/sprites/player/pRight.png";
}
/*Controller*/
window.addEventListener('keydown',function(event)
{
  var keyPressed = event.key;
  if(!inBattle && !enemyMoving && !inMenu)
 {
    if(keyPressed =='w'||keyPressed=='W' || keyPressed=="ArrowUp" )
    {
      // passing 2 vars to look at map[playerPosY-1][playerPosX]
      //if(tiles[map2[playerPosY-1][playerPosX]].walkable)
        movePlayerUp();
        console.log("X: "+playerPosX+"  Y: "+playerPosY);
    }
    if(keyPressed =='s'||keyPressed=='S' || keyPressed=="ArrowDown" )
    {
      movePlayerDown();
      console.log("X: "+playerPosX+"  Y: "+playerPosY);
    }
    if(keyPressed =='a'||keyPressed=='A' || keyPressed=="ArrowLeft" )
    {
      movePlayerLeft();
    }
    if(keyPressed =='d'||keyPressed=='D' || keyPressed=="ArrowRight" )
    {
      movePlayerRight();
    }
  }
});
