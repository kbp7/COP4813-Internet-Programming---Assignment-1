$(document).ready(function() {
  var mainCanvas = document.querySelector("#myCanvas");
  var head = mainCanvas.getContext("2d");
  var nose = mainCanvas.getContext("2d");
  var muzzle = mainCanvas.getContext("2d");
  var leftEye = mainCanvas.getContext("2d");
  var rightEye = mainCanvas.getContext("2d");
  var eyeHighlights = mainCanvas.getContext("2d");
  var ears = mainCanvas.getContext("2d");
  var canvasWidth = mainCanvas.width;
  var canvasHeight = mainCanvas.height;

  //for modifying position of all shapes
  var addX = 100;
  var addY = 100;

  //track mouse movement
  var cursorX;
  var cursorY;
  //for eye movement
  var trackX;
  var trackY;

  var cssSelector = anime({
    targets: '#myCanvas',
    translateY: -200,
    scale: 1.2
  });
  anime.speed = .75;

  document.onmousemove = function(e) {
    cursorX = e.pageX;
    cursorY = e.pageY;

    trackX = 5 * Math.cos(155 - cursorX);
  }
  function drawCircle() {
    head.beginPath();
    head.clearRect(0, 0, canvasWidth, canvasHeight);
    // color in the background
    //head.fillStyle = "#90fbcb";
    //head.fillRect(0, 0, canvasWidth, canvasHeight);

    // draw the circle
    head.beginPath();

    var radius = 175;
    head.arc(225 + addX, 225 + addY, radius, 0, Math.PI * 2, false);
    head.closePath();

    // color in the circle
    head.fillStyle = "#ffb000";
    head.fill();
    //outline
    head.lineWidth = 5;
    head.strokeStyle = '#181818';
    head.stroke();
    head.closePath();
    //draw leftEye
    leftEye.beginPath();
    leftEye.ellipse(150 + addX, 200 + addY, 50, 50, 0, 0, Math.PI*2);
    leftEye.fillStyle ="#ffffff";
    leftEye.fill();
    leftEye.lineWidth = 5;
    leftEye.strokeStyle = '#181818';
    leftEye.stroke();
    leftEye.closePath();
    //draw rightEye
    rightEye.beginPath();
    rightEye.ellipse(300 + addX, 200 + addY, 50, 50, 0, 0, Math.PI*2);
    rightEye.fillStyle ="#ffffff";
    rightEye.fill();
    rightEye.lineWidth = 5;
    rightEye.strokeStyle = '#181818';
    rightEye.stroke();
    rightEye.closePath();
    //draw eyeHighlights
    eyeHighlights.beginPath();
    leftEye.ellipse(155 + addX, 200 + addY, 45, 45, 0, 0, Math.PI*2);
    leftEye.ellipse(295 + addX, 200 + addY, 45, 45, 0, 0, Math.PI*2);
    leftEye.fillStyle ="#0b0b0b";
    leftEye.fill();
    eyeHighlights.closePath();
    //draw muzzle
    muzzle.beginPath();
    muzzle.moveTo(275 + addX, 250 + addY);
    muzzle.arc(225 + addX, 250 + addY, 50, 0, Math.PI, true);
    muzzle.lineTo(175 + addX, 250 + addY);
    muzzle.moveTo(215 + addX, 250 + addY);
    muzzle.arc(195 + addX, 250 + addY, 20, 0, Math.PI, false);
    muzzle.moveTo(215 + addX, 250 + addY);
    muzzle.lineTo(215 + addX, 220 + addY);
    muzzle.lineTo(235 + addX, 220 + addY);
    muzzle.lineTo(235 + addX, 250 + addY);
    muzzle.moveTo(275 + addX, 250 + addY);
    muzzle.arc(255 + addX, 250 + addY, 20, 0, Math.PI, false);
    muzzle.fillStyle = "#ffb000"
    muzzle.fill();
    muzzle.arc(225 + addX, 230 + addY, 25, 1.15, 1.90, false);
    muzzle.stroke();
    muzzle.closePath();
    //draw nose
    nose.beginPath();
    nose.ellipse(225 + addX, 225 + addY, 20, 15, 0, 0, Math.PI*2);
    nose.fillStyle ="#121212";
    nose.fill();
    nose.closePath();
    //draw ears
    ears.beginPath();
    ears.arc(70 + addX, 225 + addY, 20, 0, Math.PI, false);
    ears.moveTo(400 + addX, 225 + addY);
    ears.arc(380 + addX, 225 + addY, 20, 0, Math.PI, false);
    ears.stroke();
    ears.closePath();
    //draw highlights
    nose.beginPath();
    nose.ellipse(225 + addX, 220 + addY, 6, 3, 0, 0, Math.PI*2);
    nose.fillStyle="#ffffff";
    nose.fill();
    nose.closePath();

    //requestAnimationFrame(drawCircle);
  }
  drawCircle();
})
