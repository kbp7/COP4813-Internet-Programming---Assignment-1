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

  function drawCircle() {
    head.beginPath();
    head.clearRect(0, 0, canvasWidth, canvasHeight);
    // color in the background
    head.fillStyle = "#90fbcb";
    head.fillRect(0, 0, canvasWidth, canvasHeight);

    // draw the circle
    head.beginPath();

    var radius = 175;
    head.arc(225, 225, radius, 0, Math.PI * 2, false);
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
    leftEye.ellipse(150, 200, 50, 50, 0, 0, Math.PI*2);
    leftEye.fillStyle ="#ffffff";
    leftEye.fill();
    leftEye.lineWidth = 5;
    leftEye.strokeStyle = '#181818';
    leftEye.stroke();
    leftEye.closePath();
    //draw rightEye
    rightEye.beginPath();
    rightEye.ellipse(300, 200, 50, 50, 0, 0, Math.PI*2);
    rightEye.fillStyle ="#ffffff";
    rightEye.fill();
    rightEye.lineWidth = 5;
    rightEye.strokeStyle = '#181818';
    rightEye.stroke();
    rightEye.closePath();
    //draw eyeHighlights
    eyeHighlights.beginPath();
    leftEye.ellipse(155, 195, 45, 45, 0, 0, Math.PI*2);
    leftEye.ellipse(305, 195, 45, 45, 0, 0, Math.PI*2);
    leftEye.fillStyle ="#0b0b0b";
    leftEye.fill();
    eyeHighlights.closePath();
    //draw muzzle
    muzzle.beginPath();
    muzzle.moveTo(275, 250);
    muzzle.arc(225, 250, 50, 0, Math.PI, true);
    muzzle.lineTo(175, 250);
    muzzle.moveTo(215,250);
    muzzle.arc(195, 250, 20, 0, Math.PI, false);
    muzzle.moveTo(215,250);
    muzzle.lineTo(215, 220);
    muzzle.lineTo(235, 220);
    muzzle.lineTo(235, 250);
    muzzle.moveTo(275, 250);
    muzzle.arc(255, 250, 20, 0, Math.PI, false);
    muzzle.fillStyle = "#ffb000"
    muzzle.fill();
    muzzle.arc(225, 230, 25, 1.15, 1.90, false);
    muzzle.stroke();
    muzzle.closePath();
    //draw nose
    nose.beginPath();
    nose.ellipse(225, 225, 20, 15, 0, 0, Math.PI*2);
    nose.fillStyle ="#121212";
    nose.fill();
    nose.closePath();
    //draw ears
    ears.beginPath();
    ears.arc(70, 225, 20, 0, Math.PI, false);
    ears.moveTo(400, 225);
    ears.arc(380, 225, 20, 0, Math.PI, false);
    ears.stroke();
    ears.closePath();
    //draw highlights
    nose.beginPath();
    nose.ellipse(225, 220, 6, 3, 0, 0, Math.PI*2);
    nose.fillStyle="#ffffff";
    nose.fill();
    nose.closePath();
  }
  drawCircle();
})
