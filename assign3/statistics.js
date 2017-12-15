var inputArray;
    var number;
    var sum;
    var mean;
    var median;
    var mode;
    var variance;
    var stdDeviation;

    $(document).ready(function() {
      $("#submit").click(function() {
        inputArray = ($("#input").val().split(" "));
        calculateResults(inputArray);
        $("#tests").removeClass("hidden");
        //$("tests").removeClass("hidden");
      });
      $("#reset").on("click", function() {
        clearResults();
      });
    });

    function calculateResults(array) {
      //alert(inputArray);
      sum = findSum(array);
      number = findN(array);
      mean = findMean(array);
      median = findMedian(array);
      mode = findMode(array);
      variance = findVariance(array);
      stdDeviation = findStandardDeviation(array);

      $("#results").html("Sorted Input: " + array + "<br>");
      $("#results").append("N = " + number + "<br>");
      $("#results").append("Sum = " + sum + "<br>");
      $("#results").append("Mean = " + mean + "<br>");
      $("#results").append("Median = " + median + "<br>");
      $("#results").append("Mode = " + mode + "<br>");
      $("#results").append("Variance = " + variance + "<br>");
      $("#results").append("Standard Deviation = " + stdDeviation + "<br>");

    }

    function clearResults() {
      number = 0;
      sum = 0;
      mode = 0;
      //clear messages
      $("#results").html("");
      $("#tests").addClass("hidden");
    }

    function findN(array) {
      number = array.length;
      return parseInt(number);
    }

    function findMean(array) {
      return sum / number;
    }

    function findSum(array) {
      sum = 0;
      for (var i = 0; i < array.length; i++) {
        sum += array[i] << 0;
      }
      return parseInt(sum);
    }

    function findMedian(array) {
      array.sort(function(a, b) {
        return a - b
      });
      //alert("sorted: " + array);
      var half = Math.floor(number / 2);
      if (number % 2) {
        return array[half];
      } else {
        var mid1 = parseInt(array[half - 1]);
        var mid2 = parseInt(array[half]);
        return (mid1 + mid2) / 2.0;
      }
    }

    function findMode(array) {
      if (number == 0) {
        return null;
      }
      var counts = {};
      var theMode = "";
      var most = 1;
      for (var i = 0; i < number; i++) {
        var num = array[i];
        if (counts[num] == null) {
          counts[num] = 1;
        } else {
          counts[num]++;
        }
        if (counts[num] > most) {
          theMode = num;
          most = counts[num];
        } else if (counts[num] == most) {
          theMode += ", " + num;
        }
      }
      return theMode;
    }

    function findVariance(array) {
      var sumSquareDifferences = 0;
      for (var i = 0; i < number; i++) {
        var difference = mean - array[i];
        sumSquareDifferences += (difference * difference);
      }
      return sumSquareDifferences / (number - 1);
    }

    function findStandardDeviation(array) {
      return Math.sqrt(variance);
    }
