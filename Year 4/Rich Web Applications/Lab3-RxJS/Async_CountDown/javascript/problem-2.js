const timerStartBtn = document.getElementById('A_Start');
const timerStart$ = Rx.Observable
  .fromEvent(timerStartBtn, 'click') // When the start button is clicked for A.
  .subscribe(() => Countdown()); // Run the Countdown function

function Countdown()
{	
	// Save the user inputted values to variables.
	let hoursTxt = document.getElementById("A_Hour");
	let minTxt = document.getElementById("A_Min");
	let secTxt = document.getElementById("A_Sec");
	
	// Set B's time to A's (seems to be doing that in the screenshot?)
	document.getElementById("B_Hour").value = hoursTxt.value;
	document.getElementById("B_Min").value = minTxt.value;
	document.getElementById("B_Sec").value = secTxt.value;
	
	let totalSeconds = ConvertToSeconds(hoursTxt.value, minTxt.value, secTxt.value);
	
	Rx.Observable
	  .timer(0, 1000) // timer(firstDelay, interval)
	  .map(i => totalSeconds - i)
	  .take(totalSeconds + 1)
	  .subscribe(
		(i) => ShowUnderB(i),
		(error) => console.error(error), // Handle Error
		() => console.log('Completed') // Display when complete in console.
	  );
}

function ConvertToSeconds(h, m, s)
{
	// Change the values into seconds
	let hoursInSeconds = (parseInt(h) * 3600);
	let minInSeconds = (parseInt(m) * 60);
	let seconds = parseInt(s);
	
	// Check if any txtbox value is not a number, if so set to 0.
	if(isNaN(hoursInSeconds))
		hoursInSeconds = 0;
	if(isNaN(minInSeconds))
		minInSeconds = 0;
	if(isNaN(seconds))
		seconds = 0;
	
	let totalSeconds = hoursInSeconds + minInSeconds + seconds;
	
	return totalSeconds; // Return the time in seconds.
}

function ShowUnderB(currentTime)
{
	// Show B and hide C
	document.getElementById("B_Countdown").style.visibility = "visible";
	document.getElementById("C_Countdown").style.visibility = "hidden";
	
	if (currentTime > 0)
	{
		let Str = ConvertToHMS(currentTime); // change the seconds to HH:MM:SS to display to user.
		document.getElementById("B_Countdown").innerHTML = Str;
	}
	else
	{
		// Hide B then initialise and show C
		document.getElementById("B_Countdown").style.visibility = "hidden";
		document.getElementById("C_Countdown").innerHTML = "00";
		document.getElementById("C_Countdown").style.visibility = "visible";
	}
}

function ConvertToHMS(currentTime)
// Takes in a time in seconds and coverts it to a 'HH:MM:SS' formatted string.
{
	// Find Hours
	let hourRemainder = currentTime % 3600;
	let hours = (currentTime - hourRemainder) / 3600;
	// Find minutes
	let minuteRemainder = hourRemainder % 60;
	let minutes = (hourRemainder - minuteRemainder) / 60;
	// Find seconds
	let seconds = minuteRemainder;
	
	if (hours < 10)
		hours = '0'+hours;
	if (minutes < 10)
		minutes = '0'+minutes;
	if (seconds < 10)
		seconds = '0'+seconds;
	
	// Format the string.
	let StrTime = hours +":"+ minutes +":"+ seconds;
	return StrTime; // Return the time string.
}