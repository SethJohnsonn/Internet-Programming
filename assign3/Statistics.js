
var count = 0;
var sum = 0;
var variance;



function summation(numbers){

  for(i = 0; i < numbers.length; i++){
    sum += numbers[i];

  }
    document.getElementById("summation").innerHTML = " " + sum;
}

function counter(numbers){
	count = numbers.length;
	document.getElementById("count").innerHTML = " " + count;
}

function mean(numbers){
	var mean;

	mean = sum / count;
	document.getElementById("mean").innerHTML = " " + mean;
}

function findVariance(numbers){

	variance = (Math.pow(sum,2) - (Math.pow(sum,2)/count)) / (count - 1);
  document.getElementById("variance").innerHTML = " " + variance;
}

function standardDeviation(numbers){
	var SD;

	SD = Math.sqrt(variance);
  document.getElementById("standard deviation").innerHTML = " " + SD;
}

function findMedian(numbers){
  var median;
  numbers.sort(function(a, b){return a - b});

  if(numbers.length % 2 == 0){
    median = (numbers[numbers.length / 2 - 1] + numbers[numbers.length / 2]) / 2;
  }
  else{
    median = numbers[(numbers.length - 1) / 2];
  }
  document.getElementById("median").innerHTML = " " + median;
}

function findMode(numbers){
  var counts = {};
  var modes = [];
  var max = 0;

for (var i = 0; i < numbers.length; i++){
  if (!(numbers[i] in counts))
    counts[numbers[i]] = 0;
    counts[numbers[i]]++;

  if(counts[numbers[i]] == max)
    modes.push(numbers[i]);

  else if (counts[numbers[i]] > max){
    max = counts[numbers[i]];
    modes = [numbers[i]];
  }
}

var modeFinal = [];
for (var i = 0; i < modes.length; i++){
  modeFinal.push(modes[i]);
}

if(modeFinal.length > 1)
  document.getElementById("mode").innerHTML = "Multimodes: " + modes;
else if (modes.length == 1)
  document.getElementById("mode").innerHTML = "Single mode: " + modes;
else
  document.getElementById("mode").innerHTML = "No mode";
}
