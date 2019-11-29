var deck=[];
var topCard = 0;
initDeck();
shuffleDeck();


// create a card class
function CardObject(imgSrc, value) {
    this.imgSrc = imgSrc;
    this.value = value;
}

function initDeck() {
     // loads images and creates array of card objects
     var httpImgSrc='../images/';
     for(var i=0; i<52; i++) {
         var imgSrc = httpImgSrc+(i+1)+'.png';
         var val = getCardValue(i); // pass i
         deck[i] = new CardObject(imgSrc,val); // Class Definitions
     }
 }

 function getCardValue(i) {
     var ACE = 11;
     var FACE = 10;
     switch(i) {
         case 0:case 1:case 2:case 3: return(1); // ACES
         case 4:case 5:case 6:case 7: return(13); //KINGS
         case 8:case 9: case 10: case 11: return(12); // QUEENS
         case 12:case 13:case 14:case 15: return(11); // JACKS
         case 16:case 17:case 18:case 19: return(10); // TENS
         case 20:case 21:case 22:case 23: return(9); // 9
         case 24:case 25:case 26:case 27: return(8); // 9
         case 28:case 29:case 30:case 31: return(7); // 9
         case 32:case 33:case 34:case 35: return(6); // 9
         case 36:case 37:case 38:case 39: return(5); // 9
         case 40:case 41:case 42:case 43: return(4); // 9
         case 44:case 45:case 46:case 47: return(3); // 9
         case 48:case 49:case 50:case 51: return(2); // 9
             // to be finished ....  DONE.
     }
 }

 function shuffleDeck() {
    topCard=0;
     for(var i=0; i<300; i++) {
         var x = Math.floor(Math.random() * 52); // 0..51
         var y = Math.floor(Math.random() * 52); // 0..51
         var tempCard = deck[x];
         deck[x] = deck[y];
         deck[y] = tempCard;
     }
 }

 function resetDeck(){
   topCard=0;
   shuffleDeck();
 }
 function draw(){
   if(topCard+1<52)
    return deck[topCard++];
    else {
      console.log('DECK IS EMPTY\nShuffled/reset');
      shuffleDeck();
      return deck[topCard++];
    }
 }
