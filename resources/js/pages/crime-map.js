import { createMap } from '../maps/map'
import { createGridLayer } from '../maps/layers/grid-layers'
import { createCrimeMarkers } from '../maps/layers/crime-markers'

document.addEventListener("DOMContentLoaded", () => {
    const mapElement = document.getElementById("crime-map");

    if (!mapElement) return;

    const map = createMap(mapElement);

    L.marker([14.5547, 121.0244]).addTo(map).bindPopup("Makati Test marker");
    //! Test data for grid cells (temporary)
    const gridCells = {
        type: "FeatureCollection",
        features: [
            {
                type: "Feature",
                properties: {
                    cell_code: "MAK-001",
                    incident_count: 15,
                    risk_level: "high",
                },
                geometry: {
                    type: "Polygon",
                    coordinates: [
                        [
                            [121.02, 14.553],
                            [121.023, 14.553],
                            [121.023, 14.556],
                            [121.02, 14.556],
                            [121.02, 14.553],
                        ],
                    ],
                },
            },
            {
                type: "Feature",
                properties: {
                    cell_code: "MAK-002",
                    incident_count: 5,
                    risk_level: "low",
                },
                geometry: {
                    type: "Polygon",
                    coordinates: [
                        [
                            [121.023, 14.553],
                            [121.026, 14.553],
                            [121.026, 14.556],
                            [121.023, 14.556],
                            [121.023, 14.553],
                        ],
                    ],
                },
            },
        ],
    };
    //! Test data for crime markers (temporary)
    const crimes = {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                properties: {
                    category: 'Theft',
                    severity: 'high',
                    occurred_at: '2026-11-15 10:30:00',
                    address: 'Sample Location 1, Makati',
                },
                geometry: {
                    type: 'Point',
                    coordinates: [121.021, 14.554],
                },
            },
            {
                type: 'Feature',
                properties: {
                    category: 'Robbery',
                    severity: 'moderate',
                    occurred_at: '2026-11-15 14:00:00',
                    address: 'Sample Location 2, Makati',
                },
                geometry: {
                    type: 'Point',
                    coordinates: [121.024, 14.555],
                },
            },
            {
                type: 'Feature',
                properties: {
                    category: 'Burglary',
                    severity: 'low',
                    occurred_at: '2026-11-15 18:00:00',
                    address: 'Sample Location 3, Makati',
                },
                geometry: {
                    type: 'Point',
                    coordinates: [121.025, 14.554],
                },
            },
        ],
    };

    const gridLayer = createGridLayer(gridCells);
    const crimeLayer = createCrimeMarkers(crimes);

    gridLayer.addTo(map);
    crimeLayer.addTo(map);
});
