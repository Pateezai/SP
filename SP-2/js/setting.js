var addSwatch = document.getElementById('add-swatch');
var modeToggle = document.getElementById('mode-toggle');
var swatches = document.getElementsByClassName('default-swatches')[0];
var colorIndicator = document.getElementById('color-indicator');
var HeadColorText = document.getElementById('HFC');
var userSwatches = document.getElementById('user-swatches');
/** Custom Add Color Swatches */
/** Custom Add Color Swatches */




var spectrumCanvas = document.getElementById('spectrum-canvas');
var spectrumCtx = spectrumCanvas.getContext('2d');
var spectrumCursor = document.getElementById('spectrum-cursor');
var spectrumRect = spectrumCanvas.getBoundingClientRect();

var hueCanvas = document.getElementById('hue-canvas');
var hueCtx = hueCanvas.getContext('2d');
var hueCursor = document.getElementById('hue-cursor');
var hueRect = hueCanvas.getBoundingClientRect();

var currentColor = '';
var hue = 0;
var saturation = 1;
var lightness = .5;

var rgbFields = document.getElementById('rgb-fields');
var hexField = document.getElementById('hex-field');

var red = document.getElementById('red');
var blue = document.getElementById('blue');
var green = document.getElementById('green');
var hex = document.getElementById('hex');
/**-------------WEBSOCKET---------------- */
var gateway = `ws://${window.location.hostname}/ws`;
var websocket;
window.addEventListener('load', onload);

function onload(event) {
    initWebSocket();
}

function getValues(){
    websocket.send("getValues");
}

function initWebSocket() {
    console.log('Trying to open a WebSocket connection…');
    websocket = new WebSocket(gateway);
    websocket.onopen = onOpen;
    websocket.onclose = onClose;
}

function onOpen(event) {
    console.log('Connection opened');
    getValues();
}

function onClose(event) {
    console.log('Connection closed');
    setTimeout(initWebSocket, 2000);
}
/**-------------WEBSOCKET---------------- */
function ColorPicker() {
  this.addDefaultSwatches();
  createShadeSpectrum();
  createHueSpectrum();
};

ColorPicker.prototype.defaultSwatches = [
  '#FF0012',
  '#FF7F00',
  '#FFFF00',
  '#00FF00', 
  '#00D0FF', 
  '#0000FF', 
  '#7B00FF', 
  '#FF00C3', 
  '#9F0000', 
  '#996100', 
  '#CCFF00', 
  '#009400', 
  '#00FF95', 
  '#000086', 
  '#44008c', 
  '#E64AA9'
];
var test4 = []
var test77 = "";
var count = 1;
function createSwatch(target, color, number) {
  var swatch = document.createElement('button');
  swatch.classList.add('swatch');
  swatch.setAttribute('title', color);
  swatch.style.backgroundColor = color;
  console.log("test"+swatch.style.backgroundColor);
  if (number == 1){
    test4.push(swatch.style.backgroundColor)
    test77 = swatch.style.backgroundColor
    websocket.send("p"+count+":"+test77);
    console.log(count+":"+test77);
    count++;
    ;}
  swatch.addEventListener('click', function(){
    var color = tinycolor(this.style.backgroundColor);
    colorToPos(color);
    setColorValues(color);
  });
  target.appendChild(swatch);
  refreshElementRects();
};


ColorPicker.prototype.addDefaultSwatches = function() {
  for( var i = 0; i < this.defaultSwatches.length; ++i) {
    createSwatch(swatches, this.defaultSwatches[i], 0);
  }
}
/**
 */

/** Custom Own Code */


/** Custom Own Code */

function refreshElementRects() {
  spectrumRect = spectrumCanvas.getBoundingClientRect();
  hueRect = hueCanvas.getBoundingClientRect();
}

function createShadeSpectrum(color) {
  canvas = spectrumCanvas;
  ctx = spectrumCtx;
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  
  if(!color) color = '#f00';
  ctx.fillStyle = color;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  
  var whiteGradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
  whiteGradient.addColorStop(0, "#fff");
  whiteGradient.addColorStop(1, "transparent");
  ctx.fillStyle = whiteGradient;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  
  var blackGradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
  blackGradient.addColorStop(0, "transparent");
  blackGradient.addColorStop(1, "#000");
  ctx.fillStyle = blackGradient;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  
  canvas.addEventListener('mousedown', function(e) {
    startGetSpectrumColor(e);
  });
};

function createHueSpectrum() {
  var canvas = hueCanvas;
  var ctx = hueCtx;
  var hueGradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
  hueGradient.addColorStop(0.00, "hsl(0, 100%, 50%)");
  hueGradient.addColorStop(0.17, "hsl(298.8, 100%, 50%)");
  hueGradient.addColorStop(0.33, "hsl(241.2, 100%, 50%)");
  hueGradient.addColorStop(0.50, "hsl(180, 100%, 50%)");
  hueGradient.addColorStop(0.67, "hsl(118.8, 100%, 50%)");
  hueGradient.addColorStop(0.83, "hsl(61.2, 100%, 50%)");
  hueGradient.addColorStop(1.00, "hsl(360, 100%, 50%)");
  ctx.fillStyle = hueGradient;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  canvas.addEventListener('mousedown', function(e) {
    startGetHueColor(e);
  });
};

function colorToHue(color) {
  var color = tinycolor(color);
  var hueString = tinycolor('hsl ' + color.toHsl().h + ' 1 .5').toHslString();
  return hueString;
};

function colorToPos(color) {
  var color = tinycolor(color);
  var hsl = color.toHsl();
  hue = hsl.h;
  var hsv = color.toHsv();
  var x = spectrumRect.width * hsv.s;
  var y = spectrumRect.height * (1 - hsv.v);
  var hueY = hueRect.height - ((hue / 360) * hueRect.height);
  updateSpectrumCursor(x, y);
  updateHueCursor(hueY);
  setCurrentColor(color);
  createShadeSpectrum(colorToHue(color));
};

function setColorValues(color) {
  var color = tinycolor(color);
  var rgbValues = color.toRgb();
  var hexValue = color.toHex();
  
  red.value = rgbValues.r;
  green.value = rgbValues.g;
  blue.value = rgbValues.b;
  hex.value = hexValue;

  console.log("r:"+red.value);
  console.log("g:"+green.value);
  console.log("b:"+blue.value);
  console.log("h:"+hue);
  console.log("s:"+saturation);
  console.log("l"+lightness);
  
  websocket.send("h:"+hue);/**Range 0 to 255 */
  websocket.send("s:"+saturation);/** 0 to 100 Percent */
  websocket.send("l:"+lightness);/** 0 to 100 */

  websocket.send("r:"+red.value);
  websocket.send("g:"+green.value);
  websocket.send("b:"+blue.value);
  
};
/*if want to change color to color selected do these following steps
1. declare id or class (better id or both) to the things u want to do
2. declare the variable of that thing in js on top of the page eg. var HeadColorText = document.getElementById('HFC');
3. put it in setCurrentColor function
4. try figure it out by urself 
 */
function setCurrentColor(color) {
  color = tinycolor(color);
  currentColor = color;
  colorIndicator.style.backgroundColor = color;
  HeadColorText.style.color = color;
  spectrumCursor.style.backgroundColor = color;
  hueCursor.style.backgroundColor = 'hsl(' + color.toHsl().h +',100%, 50%)';
};
/**Brightness Slider */
function updateSliderPWM(element) {
  var sliderNumber = element.id.charAt(element.id.length-1);
  var sliderValue = document.getElementById(element.id).value;
  document.getElementById("sliderValue"+sliderNumber).innerHTML = sliderValue;
  console.log(sliderValue);
  websocket.send(sliderNumber+"s"+sliderValue.toString());
}

function onMessage(event) {
  console.log(event.data);
  var myObj = JSON.parse(event.data);
  var keys = Object.keys(myObj);

  for (var i = 0; i < keys.length; i++){
      var key = keys[i];
      document.getElementById(key).innerHTML = myObj[key];
      document.getElementById("slider"+ (i+1).toString()).value = myObj[key];
  }
}
/**Brightness Slider */

/**Style Loop */
var value = 0;
//you can put the checkbox in a variable, 
//this way you do not need to do a javascript query every time you access the value of the checkbox
var checkbox1 = document.getElementById("checkbox1")
checkbox1.checked = value
document.getElementById("checkbox1").addEventListener("change", function(element){
  console.log("loop:"+checkbox1.checked)
  websocket.send("loop:"+checkbox1.checked)
});
var value1 = 0;
//you can put the checkbox in a variable, 
//this way you do not need to do a javascript query every time you access the value of the checkbox
var checkbox2 = document.getElementById("checkbox2")
checkbox2.checked = value1
document.getElementById("checkbox2").addEventListener("change", function(element){
  console.log("blink:"+checkbox2.checked)
  websocket.send("blink:"+checkbox2.checked)
});
/**Style Loop */


function updateHueCursor(y) {
  hueCursor.style.top = y + "px";
}

function updateSpectrumCursor(x, y) {
  spectrumCursor.style.left = x + 'px';
  spectrumCursor.style.top = y + 'px';
  spectrumCursor.style.right = x + 'px';
  spectrumCursor.style.bottom = y + 'px';
};

var startGetSpectrumColor = function(e) {
  getSpectrumColor(e);
  spectrumCursor.classList.add('dragging');
  window.addEventListener('mousemove', getSpectrumColor);
  window.addEventListener('mouseup', endGetSpectrumColor);
};

function getSpectrumColor(e) {
  e.preventDefault();
  
  var x = e.pageX - spectrumRect.left;
  var y = e.pageY - spectrumRect.top;
  
  if(x > spectrumRect.width) {x = spectrumRect.width}
  if(x < 0) {x = 0}
  if(y > spectrumRect.height) {y = spectrumRect.height}
  if(y < 0) {y = .1}
  
  var xRatio = x / spectrumRect.width * 100;
  var yRatio = y / spectrumRect.height * 100;
  var hsvValue = 1 - (yRatio / 100);
  var hsvSaturation = xRatio / 100;
  lightness = (hsvValue / 2) * (2 - hsvSaturation);
  saturation = (hsvValue * hsvSaturation) / (1 - Math.abs(2 * lightness -1));
  var color = tinycolor('hsl ' + hue + ' ' + saturation + ' ' + lightness);
  setCurrentColor(color);
  setColorValues(color);
  updateSpectrumCursor(x, y);
};

function endGetSpectrumColor(e) {
  spectrumCursor.classList.remove('dragging');
  window.removeEventListener('mousemove', getSpectrumColor);
};

function startGetHueColor(e) {
  getHueColor(e);
  hueCursor.classList.add('dragging');
  window.addEventListener('mousemove', getHueColor);
  window.addEventListener('mouseup', endGetHueColor);
}

function getHueColor(e) {
  e.preventDefault();
  var y = e.pageY - hueRect.top;
  if (y > hueRect.height){ y = hueRect.height};
  if (y < 0) { y = 0};
  var percent = y / hueRect.height;
  hue = 360 - (360 * percent);
  var hueColor = tinycolor('hsl ' + hue + ' 1 .5').toHslString();
  var color = tinycolor('hsl ' + hue + ' ' + saturation + ' ' + lightness).toHslString();
  createShadeSpectrum(hueColor);
  updateHueCursor(y, hueColor);
  setCurrentColor(color);
  setColorValues(color);
};

function endGetHueColor(e) {
  hueCursor.classList.remove('dragging');
  window.removeEventListener('mousemove', getHueColor);
};

red.addEventListener('change', function() {
  var color = tinycolor('rgb ' + red.value + ' ' + green.value + ' ' + blue.value);
  colorToPos(color);
});

green.addEventListener('change', function() {
  var color = tinycolor('rgb ' + red.value + ' ' + green.value + ' ' + blue.value);
  colorToPos(color);
});

blue.addEventListener('change', function() {
  var color = tinycolor('rgb ' + red.value + ' ' + green.value + ' ' + blue.value);
  colorToPos(color);
});

addSwatch.addEventListener('click', function() {
  
  var test = userSwatches.childElementCount;
  if(test < 16 ){
    createSwatch(userSwatches , currentColor, 1);
  }
  else{
    alert("Max 16");
  }
  console.log(test4);
});

modeToggle.addEventListener('click', function() {
  if(rgbFields.classList.contains('active') ? rgbFields.classList.remove('active') : rgbFields.classList.add('active'));
  if(hexField.classList.contains('active') ? hexField.classList.remove('active') : hexField.classList.add('active'));
});

window.addEventListener('resize', function() {
  refreshElementRects();
});

new ColorPicker();