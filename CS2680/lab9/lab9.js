var hDice=document.getElementById('hDice');
var hScore=document.getElementById('hScore');
var cDice=document.getElementById('cDice');
var cScore=document.getElementById('cScore');
var outCome=document.getElementById('outcomeContainer');

var playButtons = document.getElementById('buttons');
var resetButton = document.getElementById('resetButton');
resetButton.style.visibility='hidden';

document.getElementById('roll').addEventListener('click',function(){roll();});
document.getElementById('stand').addEventListener('click',function(){showComp();});
document.getElementById('reset').addEventListener('click',function(){reset();})


var humanScore=0;
var humanRolls=[];
var computerScore=0;
var computerRolls=[];
var i;//loop counter


function getRandomNumber()
{
  return (Math.floor(Math.random()*6))+1;
}

function roll()
{
  var out='';
  for(i =0;i<6;i++)
  {
    humanRolls[i]=getRandomNumber();
    humanScore+=humanRolls[i];
    out+="<img src='images/dice"+humanRolls[i]+".png'>";
    if(computerScore<80)
    {
      computerRolls[i]=getRandomNumber();
      computerScore+=computerRolls[i];
    }
  }
  hScore.innerHTML=humanScore;
  hDice.innerHTML=out;
  if(humanScore>100)
  {
      showComp();
  }
}

function showComp()
{
  cScore.innerHTML=computerScore;
  if(humanScore>100)
    outCome.innerHTML="BUST";
  else if (humanScore>computerScore && computerScore<=100)
    outCome.innerHTML="WIN";
  else
    outCome.innerHTML="LOSE";

  playButtons.style.visibility='hidden';
  resetButton.style.visibility='visible';

}

function reset()
{
  humanScore=0;
  computerScore=0;
  playButtons.style.visibility='visible';
  resetButton.style.visibility='hidden';
  hScore.innerHTML='';
  hDice.innerHTML='';
  cScore.innerHTML='';
  outCome.innerHTML='';
}
