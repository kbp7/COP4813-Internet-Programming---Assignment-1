$(document).ready(function() {
  var mainCanvas = document.querySelector("#myCanvas");

  var hilt = mainCanvas.getContext("2d");
  var hiltDeco = mainCanvas.getContext("2d");
  var beam = mainCanvas.getContext("2d");
  var highlight = mainCanvas.getContext("2d");

  var canvasWidth = mainCanvas.width;
  var canvasHeight = mainCanvas.height;

  function drawLightSaber() {
    //draw beam
    beam.beginPath();
    beam.fillStyle = "#06adff";
    beam.fillRect(315, 125, 1000, 45);
    highlight.fillStyle = "#e9faff";
    beam.fillRect(315, 135, 1000, 25);
    beam.closePath();
    //draw the hilt
    hilt.beginPath();
    hilt.fillStyle = "#e0e0e0";
    hilt.fillRect(20, 125, 250, 50);
    hilt.fillRect(280, 115, 25, 70);
    hilt.fillRect(0, 130, 15, 40);
    hilt.moveTo(315, 120);
    hilt.lineTo(355, 120);
    hilt.lineTo(325, 175);
    hilt.lineTo(315,175);
    hilt.fill();
    hilt.closePath();
    //draw dark
    hilt.beginPath();
    hilt.fillStyle = "#1e2126";
    hilt.fillRect(140, 120, 50, 60);
    hilt.fillRect(15, 120, 100, 10);
    hilt.fillRect(15, 135, 100, 10);
    hilt.fillRect(15, 150, 100, 10);
    hilt.fillRect(230, 120, 40, 10);
    hilt.fillRect(145, 180, 40, 10);
    hilt.closePath();

  }
  drawLightSaber();
})
