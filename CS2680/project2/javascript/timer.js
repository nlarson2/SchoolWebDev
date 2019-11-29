var seconds =0;
var htmlMinutes = document.getElementById('minutes');
var htmlSeconds = document.getElementById('seconds');
var timerInterval;
resetTime();

function time() {
  ++seconds;
  htmlSeconds.innerHTML = pad(seconds % 60);
  htmlMinutes.innerHTML = pad(parseInt(seconds / 60));
}
function pad ( val ) { return val > 9 ? val : "0" + val; }
function resetTime()
{
  seconds = 0;
  timerInterval=setInterval(time,1000);
}
function pauseTime()
{
  clearInterval(timerInterval);
  timerInterval=0;
}
function getTime()
{
  return (pad(parseInt(seconds / 60))+':'+pad(seconds%60));
}
