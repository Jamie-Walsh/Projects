var CurrentID;
var UniqueID = 0;

// Handle the colour button click events with RxJS instead of the built-in html onclick
let AddButton = document.getElementById("AddButton");
const colourStream$ = Rx.Observable.fromEvent(AddButton, 'click'); //Add Rxjs Observable instead of EventListener
colourStream$.subscribe(() => AddNote());

// Light Blue Button
let LightBlueBtn = document.getElementById("lightBlueBtn");
const LightBlueBtnStream$ = Rx.Observable.fromEvent(LightBlueBtn, 'click');
LightBlueBtnStream$.subscribe(() => ChangeColour(1));

// Red Button
let RedBtn = document.getElementById("redBtn");
const RedBtnStream$ = Rx.Observable.fromEvent(RedBtn, 'click');
RedBtnStream$.subscribe(() => ChangeColour(2));

// Green Button
let GreenBtn = document.getElementById("greenBtn");
const GreenBtnStream$ = Rx.Observable.fromEvent(GreenBtn, 'click');
GreenBtnStream$.subscribe(() => ChangeColour(3));

// Yellow Button
let YellowBtn = document.getElementById("yellowBtn");
const YellowBtnStream$ = Rx.Observable.fromEvent(YellowBtn, 'click');
YellowBtnStream$.subscribe(() => ChangeColour(4));

// Blue Button
let BlueBtn = document.getElementById("blueBtn");
const BlueBtnStream$ = Rx.Observable.fromEvent(BlueBtn, 'click');
BlueBtnStream$.subscribe(() => ChangeColour(5));

// Pink Button
let PinkBtn = document.getElementById("pinkBtn");
const PinkBtnStream$ = Rx.Observable.fromEvent(PinkBtn, 'click');
PinkBtnStream$.subscribe(() => ChangeColour(6));

// Orange Button
let OrangeBtn = document.getElementById("orangeBtn");
const OrangeBtnStream$ = Rx.Observable.fromEvent(OrangeBtn, 'click');
OrangeBtnStream$.subscribe(() => ChangeColour(7));
// End of color buttons click handling

// Add a note.
function AddNote()
{
	if(document.getElementById('txtBox').value.length != 0)
	{
		// Variable initialisation.
		let Note = document.createElement("div");
		let container = document.getElementById("Container");
		//let divCount = container.getElementsByClassName("note").length;
		Note.id = UniqueID++; // Used to give a unique id to the divs.
		// Add an input field to allow user to edit the note.
		let NoteContent = document.createElement("textarea");
		NoteContent.classList.add("NoteTxt");
		NoteContent.value = document.getElementById('txtBox').value;
		
		// Delete Button.
		let DelNote = document.createElement("button");
		// RXJS CHANGES!!!
		const DeleteStream$ = Rx.Observable.fromEvent(DelNote, 'click') //Add Rxjs Observable instead of EventListener
		DeleteStream$.subscribe(() => DeleteNote(Note.id)); // Use subscribe to execute the DeleteNote function when the button is pressed
		DelNote.appendChild(document.createTextNode("X"));
		
		//Colour wheel
		let ColorWheel = document.createElement("button");
		ColorWheel.appendChild(document.createTextNode("Color"))		
		// RXJS CHANGES!!!
	    const colourStream$ = Rx.Observable.fromEvent(ColorWheel, 'click'); //Add Rxjs Observable instead of EventListener
		colourStream$.subscribe(() => ShowColourChooser(Note.id));
  
		// Add each element to the note div.
		Note.classList.add("note");
		Note.appendChild(ColorWheel);
		Note.appendChild(DelNote);
		Note.appendChild(document.createElement("br"));
		Note.appendChild(NoteContent);
	
		// Add the item to the list.
		document.getElementById('Container').appendChild(Note);
		
		// Clear the textbox so you can type another item instantly.
		document.getElementById('txtBox').value = '';
	}
	else
	{
		alert("Cannot add an empty note.");
	}
}

// Delete a note.
function DeleteNote(ID)
{
	//Get the ID of the div that the button was clicked from.
	let element = document.getElementById(ID);
	element.remove(); //delete the div (or note).
}

// Colour changer.
function ChangeColour(colorNum)
{
	let element = document.getElementById(CurrentID);
	
	// Switch between the numbers passed to the function to determine the colour.
	switch(colorNum) 
	{
		case 1: 
			element.style.backgroundColor = "#B0E0E6";
			break;
		case 2: 
			element.style.backgroundColor = "red";
			break;
		case 3: 
			element.style.backgroundColor = "green";
			break;
		case 4: 
			element.style.backgroundColor = "yellow";
			break;
		case 5: 
			element.style.backgroundColor = "blue";
			break;
		case 6: 
			element.style.backgroundColor = "pink";
			break;
		case 7: 
			element.style.backgroundColor = "orange";
			break;
	}
	//hide the colour selector once you've chosen a colour.
	ShowColourChooser();
}

//Bring up the selection of colours to choose from.
function ShowColourChooser(ThisID)
{
	let CurrentState = document.getElementById("ColourSelection");
	CurrentID = ThisID; // Set the global variable to the div id.
	
	//If the list of colours is showing, then hide it, and vice versa.
	if (CurrentState.style.display === "block") 
	{
		CurrentState.style.display = "none";
	} 
	else 
	{
		CurrentState.style.display = "block";
	}
}