// const input_location = document.getElementById("location");

// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else {
//     input_location.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//   const latitude = position.coords.latitude;
//   const longitude = position.coords.longitude;

//   reverseGeocode(latitude, longitude)
//     .then(result => {
//       if (result && result.length > 0) {
//         const location = result[0];

//         const address = `${location.display_name}`;
//         input_location.innerHTML = `Your Location: ${address}`;
//       } else {
//         input_location.innerHTML = "Could not determine your location.";
//       }
//     })
//     .catch(error => {
//       input_location.innerHTML = `Error while reverse geocoding: ${error}`;
//     });
// }

// function reverseGeocode(latitude, longitude) {
//   const url = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;

//   return fetch(url)
//     .then(response => response.json())
//     .then(result => [result])
//     .catch(error => {
//       console.error(`Error while reverse geocoding: ${error}`);
//       return null;
//     });
// }


// const input_location = document.getElementById("location");

// function getLocation() {
// if (navigator.geolocation) {
// navigator.geolocation.getCurrentPosition(showPosition);
// } else {
// input_location.innerHTML = "Geolocation is not supported by this browser.";
// }
// }

// function showPosition(position) {
// const latitude = position.coords.latitude;
// const longitude = position.coords.longitude;
// const username = 'nazem0';

// reverseGeocode(latitude, longitude, username)
// .then(result => {
// if (result && result.length > 0) {
// const location = result[0];

// ini
// Copy
//     const address = `${location.name}, ${location.adminName1}, ${location.countryName}`;
//     input_location.innerHTML = `Your Location: ${address}`;
//   } else {
//     input_location.innerHTML = "Could not determine your location.";
//   }
// })
// .catch(error => {
//   input_location.innerHTML = `Error while reverse geocoding: ${error}`;
// });
// }

// function reverseGeocode(latitude, longitude, username) {
// const url = http://api.geonames.org/findNearbyPlaceNameJSON?lat=${latitude}&lng=${longitude}&username=${username};

// return fetch(url)
// .then(response => response.json())
// .then(result => result.geonames)
// .catch(error => {
// console.error(Error while reverse geocoding: ${error});
// return null;
// });
// }


// const input_location = document.getElementById("location");

// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else {
//     input_location.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }

// function showPosition(position) {
//   const latitude = position.coords.latitude;
//   const longitude = position.coords.longitude;
//   const apiKey = '7d34f18319b241f08196de233370d818';

//   reverseGeocode(latitude, longitude, apiKey)
//     .then(result => {
//       if (result && result.results.length > 0) {
//         const location = result.results[0];
//         console.log(location.components);
//         const address = location.formatted;
//         input_location.innerHTML = `Your Location: ${address}`;
//       } else {
//         input_location.innerHTML = "Could not determine your location.";
//       }
//     })
//     .catch(error => {
//       input_location.innerHTML = `Error while reverse geocoding: ${error}`;
//     });
// }

// function reverseGeocode(latitude, longitude, apiKey) {
//   const url = `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKey}`;

//   return fetch(url)
//     .then(response => response.json())
//     .catch(error => {
//       console.error(`Error while reverse geocoding: ${error}`);
//       return null;
//     });
// }


let state = document.getElementById("state");
let town = document.getElementById("town");
let road = document.getElementById("road");
let message = document.getElementById("message");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        message.innerText = "Geolocation is not supported by this browser.";
        message.setAttribute('style', 'display:block;');

    }
}


function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const apiKey = '7d34f18319b241f08196de233370d818';

    reverseGeocode(latitude, longitude, apiKey)
        .then(result => {
            if (result && result.results.length > 0) {
                const location = result.results[0];
                console.log(location);
                let filter = location.formatted.split(', ');
                filter[0] == 'unnamed road' ? filter.shift() : null;
                if (state) {

                    filter = filter.slice(0, -2).join(', ');
                    filter = filter.replace(',','');
                    road.value = filter;
                    town.value = location.components.town ? location.components.town : location.components.state;
                    town.value = location.components.city ? location.components.city :
                    location.components.state;
                    state.value = location.components.state;
                }
                else {
                    filter = filter.slice(0, -2).join(', ')+" "+location.components.state;
                    filter = filter.replace(',','');
                    road.value = filter;

                }
            } else {
                message.innerText = "Could not determine your location.";
                message.setAttribute('style', 'display:block;');
            }
        })
        .catch(error => {
            message.innerText = `Error while reverse geocoding: ${error}`;
            message.setAttribute('style', 'display:block;');

        });
}

async function reverseGeocode(latitude, longitude, apiKey) {
    const url = `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKey}`;

    return fetch(url)
        .then(response => response.json())
        .catch(error => {
            console.error(`Error while reverse geocoding: ${error}`);
            return null;
        });
}
