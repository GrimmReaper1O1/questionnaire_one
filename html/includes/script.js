"strict mode";

let totalWAtts;
let peakHours;
let offPeakHours;
let offPeakRate;
let peakRate;
// totalWatts = 1000;
// peakHours = 1;
// offPeakHours = 1;
// offPeakRate = 10;
// peakRate = 10;

// calcP = calcPeak;
// calcOP = calcOffPeak;
document.querySelector(".btnCalc").addEventListener("click", function () {
  totalWatts = Number(document.querySelector(".tWatts").value);
  peakHours = Number(document.getElementById("peakHoursID").value);
  offPeakHours = Number(document.getElementById("offPeakHoursID").value);
  offPeakRate = Number(document.getElementById("offPeakRateID").value);
  peakRate = Number(document.getElementById("peakRateID").value);
  document.getElementById("containerId").classList.remove("container");
  document.getElementById("containerId").classList.add("blue");

  let calcPeak = (((totalWatts * peakHours) / 1000) * peakRate) / 100;

  const calcOffPeak =
    (((totalWatts * offPeakHours) / 1000) * offPeakRate) / 100;

  i = calcPeak + calcOffPeak;
  console.log(totalWatts);
  document.getElementById("figureID").textContent = i;
});
