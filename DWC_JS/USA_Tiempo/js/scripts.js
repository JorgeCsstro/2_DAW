const stateCoordinates = {
    "AL": { lat: 32.806671, lon: -86.791130 },
    "AK": { lat: 61.370716, lon: -152.404419 },
    "AZ": { lat: 33.729759, lon: -111.431221 },
    "AR": { lat: 34.969704, lon: -92.373123 },
    "CA": { lat: 36.116203, lon: -119.681564 },
    "CO": { lat: 39.059811, lon: -105.311104 },
    "CT": { lat: 41.597782, lon: -72.755371 },
    "DE": { lat: 39.318523, lon: -75.507141 },
    "FL": { lat: 27.766279, lon: -81.686783 },
    "GA": { lat: 33.040619, lon: -83.643074 },
    "HI": { lat: 21.094318, lon: -157.498337 },
    "ID": { lat: 44.240459, lon: -114.478828 },
    "IL": { lat: 40.349457, lon: -88.986137 },
    "IN": { lat: 39.849426, lon: -86.258278 },
    "IA": { lat: 42.011539, lon: -93.210526 },
    "KS": { lat: 38.526600, lon: -96.726486 },
    "KY": { lat: 37.668140, lon: -84.670067 },
    "LA": { lat: 31.169546, lon: -91.867805 },
    "ME": { lat: 44.693947, lon: -69.381927 },
    "MD": { lat: 39.063946, lon: -76.802101 },
    "MA": { lat: 42.230171, lon: -71.530106 },
    "MI": { lat: 43.326618, lon: -84.536095 },
    "MN": { lat: 45.694454, lon: -93.900192 },
    "MS": { lat: 32.741646, lon: -89.678696 },
    "MO": { lat: 38.456085, lon: -92.288368 },
    "MT": { lat: 46.921925, lon: -110.454353 },
    "NE": { lat: 41.125370, lon: -98.268082 },
    "NV": { lat: 38.313515, lon: -117.055374 },
    "NH": { lat: 43.452492, lon: -71.563896 },
    "NJ": { lat: 40.298904, lon: -74.521011 },
    "NM": { lat: 34.840515, lon: -106.248482 },
    "NY": { lat: 42.165726, lon: -74.948051 },
    "NC": { lat: 35.630066, lon: -79.806419 },
    "ND": { lat: 47.528912, lon: -99.784012 },
    "OH": { lat: 40.388783, lon: -82.764915 },
    "OK": { lat: 35.565342, lon: -96.928917 },
    "OR": { lat: 44.572021, lon: -122.070938 },
    "PA": { lat: 40.590752, lon: -77.209755 },
    "RI": { lat: 41.680893, lon: -71.511780 },
    "SC": { lat: 33.856892, lon: -80.945007 },
    "SD": { lat: 44.299782, lon: -99.438828 },
    "TN": { lat: 35.747845, lon: -86.692345 },
    "TX": { lat: 31.054487, lon: -97.563461 },
    "UT": { lat: 40.150032, lon: -111.862434 },
    "VT": { lat: 44.045876, lon: -72.710686 },
    "VA": { lat: 37.769337, lon: -78.169968 },
    "WA": { lat: 47.400902, lon: -121.490494 },
    "WV": { lat: 38.491226, lon: -80.954456 },
    "WI": { lat: 44.268543, lon: -89.616508 },
    "WY": { lat: 42.755966, lon: -107.302490 }
};

const dataReq = ["localtime", "wx_icon", "temp", "wdir_compass", "wspd"];

let currentIndex = 0;

window.onload = start;

function start() {
    let mapa = document.querySelector('map[name="USA"]');
    let areas = mapa.getElementsByTagName('area');

    for (let i = 0; i < areas.length; i++) {
        let area = areas[i];

        area.addEventListener('click', abreMod); 
    }
    document.getElementById("fondo").onclick = closeMod;

    document.querySelectorAll("area").forEach(areaElement => {
        areaElement.addEventListener("click", (event) => {
            event.preventDefault();
            const stateCode = event.target.getAttribute("data-cod");
            if (stateCoordinates[stateCode]) {
                const { lat, lon } = stateCoordinates[stateCode];
                getData(lat, lon);
            } else {
                console.error("Coordinates not found for state:", stateCode);
            }
        });
    });
    document.getElementById("prevBtn").addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
    
    document.getElementById("nextBtn").addEventListener("click", () => {
        const table = document.querySelector("#modal table");
        const totalColumns = table.querySelectorAll("td").length / dataReq.length;
        if (currentIndex < totalColumns - 6) {
            currentIndex++;
            updateCarousel();
        }
    });
}

function abreMod(event) {
    event.preventDefault();

    currentIndex = 0;

    let stateTitle = event.target.title || event.target.getAttribute('data-cod');

    document.getElementById("titulo").innerText = stateTitle;

    document.getElementById("modal").classList.remove("oculto");
    document.getElementById("fondo").classList.remove("oculto");
}

function closeMod() {

    document.getElementById("modal").classList.add("oculto");
    document.getElementById("fondo").classList.add("oculto");
}

async function getData(lat, lon) {
    const query = `q=${lat},${lon}`;
    const apiUrlTemp = `https://api.weatherusa.net/v1/forecast?${query}&daily=0&units=e&maxtime=1d`;

    console.log(apiUrlTemp);

    try {
        const response = await fetch(apiUrlTemp);
        const data = await response.json();

        const table = document.querySelector("#modal table");
        table.innerHTML = "";

        // Create table body with headers on the left
        const tbody = document.createElement("tbody");

        // Loop through `dataReq` to create rows with headers and corresponding data
        dataReq.forEach((key) => {
            const row = document.createElement("tr");

            const headerCell = document.createElement("th");
            headerCell.innerText = key;
            row.appendChild(headerCell);
            if (key == "wx_icon") {
                data.slice(0, 24).forEach((entry) => {
                    const dataCell = document.createElement("td");
                    if (entry[key]) {
                        const img = document.createElement("img");
                        img.src = './imgs/' + entry[key] + '.png'; // Set the source of the image
                        img.alt = key; // Optional: Set an alt attribute for the image
                        img.style.width = "50px"; // Optional: Set a width for the image
                        img.style.height = "50px"; // Optional: Set a height for the image
                        dataCell.appendChild(img);
                    } else {
                        dataCell.innerText = "N/A"; // Fallback if `wx_icon` is not available
                    }
                    row.appendChild(dataCell);
                });
            } else {
                data.slice(0, 24).forEach((entry) => {
                    const dataCell = document.createElement("td");
                    dataCell.innerText = entry[key] || "N/A";
                    row.appendChild(dataCell);
                });
            }

            tbody.appendChild(row);
        });

        table.appendChild(tbody);
        updateCarousel();

        const apiUrlCams = `https://api.weatherusa.net/v1/skycams?${query}`;
        console.log(apiUrlCams);
        const responseCam = await fetch(apiUrlCams);
        const dataCam = await responseCam.json();
            
        if (dataCam.length > 0 && dataCam[0].image) {
            const imageUrl = dataCam[0].image;
        
            const lifeImgDiv = document.getElementById("life_img");
            lifeImgDiv.innerHTML = ""; // Clear any previous content
        
            const imgElement = document.createElement("img");
            imgElement.src = imageUrl;
            imgElement.alt = "Live Camera View"; // Optional alt text
        
            lifeImgDiv.appendChild(imgElement);
        } else {
            console.error("No camera image found in the response");
        }

    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

function updateCarousel() {
    const table = document.querySelector("#modal table");
    const cells = table.querySelectorAll("td");
    const totalColumns = cells.length / dataReq.length;

    cells.forEach((cell, index) => {
        const columnIndex = index % totalColumns;
        if (columnIndex >= currentIndex && columnIndex < currentIndex + 6) {
            cell.style.display = "table-cell";
        } else {
            cell.style.display = "none";
        }
    });
}



