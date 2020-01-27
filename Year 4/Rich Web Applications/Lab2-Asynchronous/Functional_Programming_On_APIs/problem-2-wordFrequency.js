const fetch = require("node-fetch");

fetch('https://jsonplaceholder.typicode.com/posts')
	.then(response => response.json())
	.then(response => 
			{
				let bodyWords = response.map(i => i.body); // Isolate the body.
				
				//console.log(typeof bodyWords);
				
				let FullString = JSON.stringify(bodyWords); // change the array of objects to a sctring
				
				// remove unnecessary characters.
				let CleanString = FullString.replace(/\\n/g, ' '); 
				let SqueakyClean = CleanString.replace(/["',]/g, '');
				
				let words = SqueakyClean.split(" "); //split the large string into individual words.
				
				// create a map from word to frequency.
				let freq = words.reduce(function(map, word) 
				{
					map[word] = (map[word] || 0) + 1;
					return map;
				}, {});
				
				// Convert the above map to an array.
				let CountedWords = Object.keys(freq).map(function(key) 
				{
				   return { word: key, count: freq[key] }; // Display the words and their frequencies.
				});
				
				console.log(CountedWords); // Display the array.
			}
		 )
		 
