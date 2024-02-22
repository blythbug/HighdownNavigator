// Initialise Leaflet map to click on map and 
// Find shortest path, displaying the path

//Variables
var map; // Map
var startMarker = null; // Starting Point
var endMarker = null; // Destination
var routingControl = null; // Route
var graph = {}; // Store graph data


// Initialise Leaflet Map

function initMap() {
    // Centre Leaflet Map on Highdown School 
    map = L.map('map').setView([51.48154,-0.97476], 19);

    // OpenStreetMap tiles added to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Click on map event calling latitude and longitude of clicked-on area
    map.on('click', function(event) {
        handleMapClick(event.latlng);
    });
}

//Dijkstra's algorithm function
function findShortestPath() {
    
    // Latitude and Logitude coordinates of starting point and destination
    var start = startMarker.getLatLng();
    var end = endMarker.getLatLng();


    // Leaflet Routing Machine
    
    // If routingControl already exists, remove from layer
    if (routingControl) {
        map.removeLayer(routingControl);
    }

    // Create new routingControl 
    routingControl = L.Routing.control({
        waypoints: [
            L.latLng(start.lat, start.lng),
            L.latLng(end.lat, end.lng)
        ],

        // Cannot calculate routes while dragging waypoints
        routeWhileDragging: false
    }).addTo(map);

    // Acceptable routes found Event
    routingControl.on('routesfound', function(e) {
        var routes = e.routes;

        // Check if routes exist
        if (routes && routes.length > 0) {
            var route = routes[0];
            var coordinates = route.coordinates;

            // Store coordinates in the object graph
            graph['path'] = coordinates;
            console.log('Path:', coordinates);
        }
    });
}


// Reset Map 

function resetMap() {

    // Reset Map to Highdown School co-ordinates and zoom level
    map.setView([51.48154, -0.97476], 19);

    // Remove all markers and displayed routes from map
    map.removeLayer(startMarker);
    map.removeLayer(endMarker);
    map.removeControl(routingControl);

    // Make all markers empty
    startMarker = null;
    endMarker = null;
    routingControl = null;
    graph = {};
}

// User clicks on Map Event

function handleMapClick(latlng) {

    // If Starting Point (startMarker) is not set yet
    if (!startMarker) {

        // Add Starting Point Marker at the clicked coordinates and display
        startMarker = L.marker(latlng).addTo(map).bindPopup('Start Location').openPopup();

        // Log the location coordinates of the Starting Point
        console.log('Start Location:', latlng.lat, latlng.lng);

    // Otherwise, if destination (endMarker) is not set yet
    } else if (!endMarker) {

        // Add destination marker at the clicked coordinates and display
        endMarker = L.marker(latlng).addTo(map).bindPopup('End Location').openPopup();

        // Log the location coordinates of the destination
        console.log('End Location:', latlng.lat, latlng.lng);

        // Call ShortestPath() algorithm to find route between both markers
        findShortestPath();
    }
}

//Initialise Map

initMap();