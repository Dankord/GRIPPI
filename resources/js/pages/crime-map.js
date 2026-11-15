import { createMap } from '../maps/map'
import { createGridLayer } from '../maps/layers/grid-layers'

document.addEventListener("DOMContentLoaded", () => {
    const mapElement = document.getElementById("crime-map");

    if (!mapElement) return;

    const map = createMap(mapElement);

    L.marker([14.5547, 121.0244]).addTo(map).bindPopup("Makati");
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

    const gridLayer = createGridLayer(gridCells);
    gridLayer.addTo(map);
});
