function SearchUserName()	
{	
	let SearchedName = document.getElementById("UserNameInput").value;
	
	// Fetch the json from the api.
	try
	{
		fetch('https://api.github.com/users/' + SearchedName)
		.then(response => response.json())
		.then(response => 
				{
					if (response.message === "Not Found")
					{
						alert("Username not found.");
						Restart();
						return;
					}
					else
					{
						let User = response;
						ResetRepoTemplate(); // Reset the repo list incase another user was already searched for.
						ApplyProfileChanges(User);
					}
				}
			 )
	}
	catch(error)
	{
		alert(error);
		return;
	}
}

function ApplyProfileChanges(User)
{
	// Set the HTML to the data retrieved from the API.
	document.getElementById("Avatar").innerHTML = "";
	let ProfilePic = document.createElement("img");
	ProfilePic.id = "ProfilePic";
	ProfilePic.src = User.avatar_url;
	document.getElementById("Avatar").appendChild(ProfilePic);
	document.getElementById("Name").innerHTML = User.name;
	document.getElementById("UserName").innerHTML = User.login;
	document.getElementById("Email").innerHTML = User.email;
	document.getElementById("Location").innerHTML = User.location;
	document.getElementById("Gists").innerHTML = User.public_gists;
	DisplayRepos(User.repos_url);
}

function DisplayRepos(URL)
{
	let overflown;
	
	fetch(URL)
	.then(response => response.json())
	.then(response => 
			{
				let Count = Object.keys(response).length; // The number of keys will be the same as the number of Repo objects.
				for(let i=0; i < Count; i++)
				{
					if(i < 5)
					{
						// Change the contents of the existing 5 repo divs
						AddRepoInfo(response[i].name, response[i].description, i);
					}
					else
					{
						overflown = true; // More than 5 repos created.
						CreateNewRepoDiv(i); // Creates a new empty repo div
						AddRepoInfo(response[i].name, response[i].description, i); // Fill out divs with repo information.
					}
				}
				
				if(overflown)
				{
					// Make the repo list scrollable.
					document.getElementById("UserRepos").style.overflow = 'auto';
				}
			}
		 )
}

function AddRepoInfo(name, description, count)
{
	count++; // "Repo0" doesn't exist so start on 1.
	let RepoDiv = document.getElementById("Repo"+count);
	let nextLine = document.createElement('br');
	RepoDiv.innerHTML = name;
	RepoDiv.appendChild(nextLine);
	RepoDiv.innerHTML = RepoDiv.innerHTML + description;
}

function CreateNewRepoDiv(count)
{
	count++;
	let NewRepo = document.createElement("div"); // Create a new div
	NewRepo.id = "Repo"+count; // Give it a new unique id.
	NewRepo.classList.add("Repos"); // Add class
	document.getElementById("UserRepos").appendChild(NewRepo); // Add to the repo list.
}

function Restart()
// Function for when a username is not found so an old user's information isn't showing.
{
	document.getElementById("UserNameInput").value = "";
	document.getElementById("Avatar").innerHTML = "";
	document.getElementById("Name").innerHTML = "Name";
	document.getElementById("UserName").innerHTML = "Username";
	document.getElementById("Email").innerHTML = "Email";
	document.getElementById("Location").innerHTML = "Location";
	document.getElementById("Gists").innerHTML = "Number of Gists";
	ResetRepoTemplate();
}

function ResetRepoTemplate()
// Creates the template for the repo list with 5 "repositories".
{
	document.getElementById("UserRepos").innerHTML = "";
	for(let i=0; i < 5; i++)
	{
		CreateNewRepoDiv(i);
		AddRepoInfo("Name", "Description", i);
	}
}