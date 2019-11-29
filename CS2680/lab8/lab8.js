var leftN = document.getElementById('leftNumber');
var rightN = document.getElementById('rightNumber');
var grid = document.getElementById('grid');
leftN.addEventListener('change',function(){generateGrid();});
rightN.addEventListener('change',function(){generateGrid();});

function generateGrid()
{
  var leftVal = leftN.value, rightVal = rightN.value;

  var out="<table>";
  for(var i = 1; i<=10;i++)
  {
    out+="<tr>";
    for(var j = 1; j<=10;j++)
    {
      if(j==1&&  i==1)
        out+="<td>*</td>";
      else if((j==leftVal && i == 1)||i==rightVal && j == 1)
        out+="<td class='gridHighlight'>"+(j*i)+"</td>";
      else if(j==leftVal&&  i==rightVal)
        out+="<td class='gridHighlight'>"+(j*i)+"</td>";
      else
        out+="<td>"+(j*i)+"</td>";
     }
     out+="</tr>";
  }
  out+="</table>"
  grid.innerHTML=out;
}
