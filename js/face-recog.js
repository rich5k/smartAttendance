// This is your API token
var TOKEN = "19db14e27799474b99d0c4fbc4c4f62f"

// Defining the people we want to recognize later
var PEOPLE = [
        {
                "name": "Angelina Jolie",
                "photo": "https://dashboard.luxand.cloud/img/angelina-jolie.jpg"
        },
        {
                "name": "Brad Pitt",
                "photo": "https://dashboard.luxand.cloud/img/brad-pitt.jpg"
        }
]

// This method is going to be used to send all the requests
function make_request(method, url, data, callback){
	$.ajax({
		async: true, 
		crossDomain: true, 
		url: url, 
		method: method, 
		headers: {
			token: TOKEN
		}, 
		data: data
	}).done(function (response) {
		callback(response)
	});
}

// This function creates people and uploads their photos
function create_persons(callback){
	if (PEOPLE.length == 0)
		return callback()

	var person = PEOPLE.shift()
	
	console.log("Creating person for " + person.name)
	make_request("POST", "https://api.luxand.cloud/subject", {name: person.name},function(response){

		make_request("POST", "https://api.luxand.cloud/subject/" + response.id, {photo: person.photo}, function(body){
			create_persons(callback)
		})
	})
}

create_persons(function(){
	console.log("Recognizing people in this photo https://dashboard.luxand.cloud/img/angelina-and-brad.jpg")

	make_request("POST", "https://api.luxand.cloud/photo/search", {"photo": "https://dashboard.luxand.cloud/img/angelina-and-brad.jpg"},  function(body){
		console.log(body)
	})	
})