$(document).ready(function() {
  var diagramCanvas = document.querySelector("#myDiagram");
  var beamDiagram = document.querySelector("#beamDiagram");

  var innerBeam = beamDiagram.getContext("2d");
  var hilt = diagramCanvas.getContext("2d");
  var hiltDeco = diagramCanvas.getContext("2d");
  var brass = diagramCanvas.getContext("2d");
  var battery = diagramCanvas.getContext("2d");
  var crystal = diagramCanvas.getContext("2d");
  var highlight = diagramCanvas.getContext("2d");
  var infoLines = diagramCanvas.getContext("2d");
  var canvasWidth = diagramCanvas.width;
  var canvasHeight = diagramCanvas.height;

  var upsize = 100;
  var animDiagram = anime({
    targets: '#myDiagram',
    translateX: [-1000, 0],
    translateY: [200, 200],
    //scale: 1.2,
    easing: 'easeOutQuad',
    //delay: 500
    autoplay: false
  });
  var animBeam = anime({
    targets: '#beamDiagram',
    opacity: [0, 0.75],
    //scale: 1.2,
    easing: 'easeOutQuad',
    delay: 1500

  });
  //tie this to a button later
  animDiagram.play();

  function drawDiagram() {

    //draw beam
    innerBeam.beginPath();
    innerBeam.fillStyle = "#06adff";
    innerBeam.fillRect(385, 30, 395, 5);
    innerBeam.fillRect(760, 0, 395, 65);
    innerBeam.moveTo(760, 0);
    innerBeam.lineTo(725, 33);
    innerBeam.lineTo(760, 66);
    //innerBeam.lineTo(760, 0);
    innerBeam.fill();
    innerBeam.closePath();

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
    hilt.fillRect(30, 135, 490, 80);
    hilt.fillStyle = "#878787";
    hilt.fillRect(545, 135, 50, 80);
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
    //draw inner beam effect
    /*
    beam.beginPath();
    beam.fillStyle = "#00d8ff";
    beam.fillRect(300, 375, 200, 20);
    beamd.closePath();
*/
    //draw pointing lines
    infoLines.beginPath();
    infoLines.strokeStyle = "#001a34";
    infoLines.lineWidth = 3;
    infoLines.font = 'bold 20px sans-serif';
    infoLines.fillStyle = "#001a34";
    //top lines
    infoLines.moveTo(425, 145);
    infoLines.lineTo(425, 100);
    infoLines.lineTo(475, 50);
    infoLines.fillText("Cycling Field Energizers", 485, 55);
    //bottom lines
    infoLines.moveTo(100, 175);
    infoLines.lineTo(100, 325);
    infoLines.lineTo(150, 375);
    infoLines.fillText("Battery", 160, 385);

    infoLines.moveTo(300, 185);
    infoLines.lineTo(300, 325);
    infoLines.lineTo(350, 375);
    infoLines.fillText("Crystal", 360, 385);

    infoLines.moveTo(425, 182);
    infoLines.lineTo(425, 325);
    infoLines.lineTo(475, 375);
    infoLines.fillText("Energy Channel", 485, 385);

    infoLines.moveTo(570, 200);
    infoLines.lineTo(570, 280);
    infoLines.lineTo(620, 330);
    infoLines.fillText("Emitter", 630, 340);

    infoLines.stroke();
    infoLines.closePath();

  }

  drawDiagram();
})
