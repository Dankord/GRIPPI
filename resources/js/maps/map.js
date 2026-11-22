import L from "leaflet";
import "leaflet/dist/leaflet.css";

export function createMap(element, options = {}) {
    const map = L.map(element, {zoomControl: true, ...options});

    map.setView([14.5547, 121.0244], 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19,
    }).addTo(map);

    map.getPane("tilePane").style.filter = "invert(100%) hue-rotate(180deg) brightness(85%) contrast(90%)";

    return map;
}