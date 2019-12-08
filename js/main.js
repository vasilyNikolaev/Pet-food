document.getElementById("bottonLeft").onclick = sliderLeft;
document.getElementById('bottonRight').onclick = sliderRight;

var left = 0;

function sliderLeft() {
  var polosa = document.getElementById("polosa");
  left = left - 900;
  if ( left < -2700){
    left = 0;
  }
  polosa.style.left = left +'px';
};

function sliderRight() {
  var polosa = document.getElementById("polosa");
  left = left + 900;
  if ( left > 0){
    left = -2700;
  }
  polosa.style.left = left +'px';
};
