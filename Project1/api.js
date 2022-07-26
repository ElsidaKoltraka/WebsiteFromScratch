import {My_API_KEY} from './config.js';

fetch("https://quotes15.p.rapidapi.com/quotes/random/", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "quotes15.p.rapidapi.com",
		"x-rapidapi-key": My_API_KEY
	}
})
.then(response => response.json())
.then(response => {
	console.log(response);
   document.getElementById('quote').innerHTML = response.content;
   document.getElementById('author').innerHTML = '- ' + response.originator.name + ' -';
   
    // console.log(response.content);
})
.catch(err => {
	console.error(err);
});






function bmi(){
	
	var height = parseFloat(document.getElementById("Height").value)
    var weight = parseFloat(document.getElementById("Weight").value)
	var bmi=weight/(height*height);
	var userBMI=document.getElementById("bmi_index")
	userBMI.textContent=bmi.toFixed(2);
}

/////////////////7///EDamam Food and Grocery Database
var grocery = "apple";
var foodgrocery = `https://edamam-food-and-grocery-database.p.rapidapi.com/parser?ingr=${grocery}` ;
fetch(foodgrocery, {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "edamam-food-and-grocery-database.p.rapidapi.com",
		"x-rapidapi-key": "e93c986dabmsh23f3272fc80b7bbp131acdjsnb36eca6eab82"
	}
})
.then(response => response.json())
.then(response => {
	console.log(response);
	
})
.catch(err => {
	console.error(err);
});


//////////77Fitness Calculator API //

var age =27;
var weight =112;
var height= 175;

var gg=`https://fitness-calculator.p.rapidapi.com/bmi?age=${age}&weight=${weight}&height=${height}`

fetch(gg, {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "fitness-calculator.p.rapidapi.com",
		"x-rapidapi-key": "e93c986dabmsh23f3272fc80b7bbp131acdjsnb36eca6eab82"
	}
})
.then(response => response.json())
.then(response => {
	console.log(response);
	console.log(response.bmi)
})
.catch(err => {
	console.error(err);
});

/////////////////////7COVID

fetch("https://covid-193.p.rapidapi.com/statistics", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "covid-193.p.rapidapi.com",
		"x-rapidapi-key": "e93c986dabmsh23f3272fc80b7bbp131acdjsnb36eca6eab82"
	}
})
.then(response => response.json())
.then(response => {
	console.log(response);
	

	
})
.catch(err => {
	console.error(err);
});



fetch("https://edamam-recipe-search.p.rapidapi.com/search?q=beef", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "edamam-recipe-search.p.rapidapi.com",
		"x-rapidapi-key": "e93c986dabmsh23f3272fc80b7bbp131acdjsnb36eca6eab82"
	}
})
.then(response => response.json())
.then(response => {
	console.log(response);
})
.catch(err => {
	console.error(err);
});


fetch("https://fitness-api.p.rapidapi.com/fitness", {
	"method": "POST",
	"headers": {
		"content-type": "application/x-www-form-urlencoded",
		"x-rapidapi-host": "fitness-api.p.rapidapi.com",
		"x-rapidapi-key": "e93c986dabmsh23f3272fc80b7bbp131acdjsnb36eca6eab82"
	},
	"body": {
		"height": "190",
		"weight": "80",
		"age": "30",
		"gender": "male",
		"exercise": "little",
		"neck": "41",
		"hip": "100",
		"waist": "88",
		"goal": "maintenance",
		"deficit": "500",
		"goalWeight": "85"
	}
})

.then(response => {
	console.log(response);
	
})
.catch(err => {
	console.error(err);
});