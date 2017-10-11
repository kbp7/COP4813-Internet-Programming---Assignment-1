$(document).ready(function() {
  var diagramCanvas = document.querySelector("#myDiagram");

  var hilt = diagramCanvas.getContext("2d");
  var hiltDeco = diagramCanvas.getContext("2d");
  var brass = diagramCanvas.getContext("2d");
  var battery = diagramCanvas.getContext("2d");
  var crystal = diagramCanvas.getContext("2d");
  var beam = diagramCanvas.getContext("2d");
  var highlight = diagramCanvas.getContext("2d");
  var infoLines = diagramCanvas.getContext("2d");
  var canvasWidth = diagramCanvas.width;
  var canvasHeight = diagramCanvas.height;

  var upsize = 100;
  function drawDiagram() {
    /*
    //draw beam
    beam.beginPath();
    beam.fillStyle = "#06adff";
    beam.fillRect(315, 125, 1000, 45);
    highlight.fillStyle = "#e9faff";
    beam.fillRect(315, 135, 1000, 25);
    beam.closePath();
    */
    //draw the hilt
    hilt.beginPath();
    hilt.fillStyle = "#e0e0e0";
    hilt.fillRect(20, 125, 250 * 2, 50 * 2);
    hilt.fillRect(545, 105, 25 * 2, 70 * 2);
    hilt.fillRect(0, 130, 12 * 2, 40 * 2);
    //shroud
    hilt.moveTo(615, 125);
    hilt.lineTo(695, 125);
    hilt.lineTo(635, 225);
    hilt.lineTo(615, 225);

    hilt.fill();
    //hilt.fillStyle = "#0e0f13";
    hilt.fillRect(250, 115, 50 * 2, 60 * 2);
    hilt.fillRect(15, 120, 100 * 2, 10 * 2);
    hilt.fillRect(440, 110, 40 * 2, 10 * 2);
    hilt.fillRect(260, 235, 40 * 2, 10 * 2);
    //inner hilt
    hilt.fillStyle = "#2d2f33";
    hilt.fillRect(30, 135, 475, 80);
    hilt.closePath();
    //draw brass parts
    brass.beginPath();
    brass.fillStyle = "#ffbf00"
    brass.fillRect(370, 134, 115, 18);
    brass.fillRect(370, 164, 225, 22);
    brass.fillRect(370, 198, 115, 18);
    brass.fillRect(495, 154, 50, 44);
    brass.closePath();
    //draw battery
    battery.beginPath();
    battery.fillStyle = "#878787";
    battery.fillRect(40, 160, 180, 28);
    battery.closePath();
    //draw crystal
    crystal.beginPath();
    crystal.strokeStyle = "#d3fdff";
    crystal.fillStyle = "#00d8ff"
    crystal.moveTo(250, 175);
    crystal.lineTo(300, 150);
    crystal.lineTo(350, 175);
    crystal.lineTo(300, 200);
    crystal.lineTo(250, 175);
    //crystal edges
    crystal.lineTo(350, 175);
    crystal.moveTo(300, 150);
    crystal.lineTo(300, 200);
    crystal.fill();
    crystal.stroke();
    crystal.closePath();

    //draw pointing lines
    infoLines.beginPath();
    infoLines.strokeStyle = "#14151c";
    infoLines.closePath();

  }

  drawDiagram();
})
