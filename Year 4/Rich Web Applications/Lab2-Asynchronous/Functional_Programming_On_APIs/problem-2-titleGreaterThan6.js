const fetch = require("node-fetch");

fetch('https://jsonplaceholder.typicode.com/posts')
	.then(response => response.json())
	.then(response => 
			{
				let posts = response.filter(i => i.title.split(" ").length > 6); // filter the response where the title has more than 6 words.
				console.log(posts); // Display posts
			}
		 )