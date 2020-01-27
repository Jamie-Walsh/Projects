function AddContact()
{
	let Name   = document.getElementById('NameInput');
	let Mobile = document.getElementById('MobileInput');
	let Email  = document.getElementById('EmailInput');
	let Error  = document.getElementById('error').style.display;
	
	if (!ValidateInputs(Name, Mobile, Email)) // If there is an issue with one of the inputs
	{
		document.getElementById('error').style.display = "block"; // Show error div
		return; // Exit from the function
	}

	// If the error div is already showing, hide it.
	if (Error === "block") 
	{
		document.getElementById('error').style.display = "none";
	} 
	
	let ContactTable = document.getElementById('Contacts');
	let Rows         = ContactTable.rows.length;
	let NewRow       = ContactTable.insertRow(Rows);
	let NameCell     = NewRow.insertCell(0); //Add new cells (or columns) to the table
	let MobileCell   = NewRow.insertCell(1);
	let EmailCell    = NewRow.insertCell(2);
	
	NameCell.innerHTML = Name.value; // Set column innerHTML to the user's input.
	MobileCell.innerHTML = Mobile.value;
	EmailCell.innerHTML = Email.value;
	
	// Clear the input fields after they have been added to the contacts table
	document.getElementById('NameInput').value = '';
	document.getElementById('MobileInput').value = '';
	document.getElementById('EmailInput').value = '';
}

function ValidateInputs(Name, Mobile, Email)
{	
	// Check for any empty inputs
	if( (!Name.checkValidity()   ) ||
		(!Mobile.checkValidity() ) ||
		(!Email.checkValidity()) ) 
	{
		alert('Please fill out all fields.');
		return false;
	}
	
	// Ensure the name only contains letters.
	if(!Name.value.match(/^[A-Za-z\s]+$/))
    {
		alert('Names can only contain letters and spaces.');
		return false;
    }
	
	// Ensure Mobile No. only contains numbers.
	if((!Mobile.value.match(/^[0-9]+$/)) || (Mobile.value.length != 10))
    {
		alert('Mobile number can only contain numbers and must be 10 digits long.');
		return false;
    }
	
	// Email validation.
	if((!Email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)))
    {
		alert('Email is invalid.');
		return false;
    }
	
	// If all inputs have been validated without errors, return true.
	return true;
}

function SearchContacts()
{
	let Filter      = document.getElementById("MobileSearch").value;
	let ContactRows = document.getElementById("Contacts").getElementsByTagName("tr");
	let HiddenRows  = 0; 
	
	for (let i = 0; i < ContactRows.length; i++) // Loop throutgh each row in the table
	{
		let column = ContactRows[i].getElementsByTagName("td")[1]; // set variable to middle column (where the phone numbers are held)
		if (column) 
		{
			let PhoneNum = column.textContent || column.innerText;
			
			if (PhoneNum.indexOf(Filter) == 0) // If the phone number contains the filter at the start.
			{
				ContactRows[i].style.display = ""; // Display contact
			} 
			else 
			{
				ContactRows[i].style.display = "none"; // Hide contact
				HiddenRows += 1;
			}
		}       
	}
	
	if ((ContactRows.length - 1) === HiddenRows) // If all rows are hidden.
	{
		document.getElementById('noResult').style.display = "block"; // Show the noResult div
	}
	else
	{
		document.getElementById('noResult').style.display = "none"; // Hide the noResult div
	}
}

function SortContacts()
{
	let rows, i, currentRow, nextRow, shouldSwitch, switchcount = 0;
	let ContactTable = document.getElementById("Contacts");
	let loop = true;
	let direction = "a"; // Ascending order on first click.
	
	while (loop) 
	{
		loop = false;
		rows = ContactTable.rows;
		
		for (i = 1; i < (rows.length - 1); i++) // i=1 so that the table header isn't sorted.
		{
			Sort = false;
			currentRow = rows[i].getElementsByTagName("td")[0];
			nextRow = rows[i + 1].getElementsByTagName("td")[0];
			
			if (direction == "a") 
			{
				// If ascending then the current row should be smaller than the next row.
				if (currentRow.innerHTML.toLowerCase() > nextRow.innerHTML.toLowerCase())
				{
					Sort = true; // If not then it needs to be sorted.
					break;
				}
			}
			else if (direction == "d")
			{
				// In descending order, the current row should be greater than the next one.
				if (currentRow.innerHTML.toLowerCase() < nextRow.innerHTML.toLowerCase()) 
				{
					Sort = true;
					break;
				}	
			}
		}
		
		if (Sort) 
		{
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]); // 
			loop = true;
			switchcount ++;
		} 
		else 
		{
			// If nothing has been changed in ascending order, then change the direction to descending
			if (switchcount == 0 && direction == "a") 
			{
				direction = "d";
				loop = true;
			}
		}
	}
}