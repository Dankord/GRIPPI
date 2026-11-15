import L from 'leaflet';
import { escapeHtml } from '../../utils/escape-html';

export function createCrimeMarkers(geoData) {
    const markers = L.geoJSON(geoData, {
        pointToLayer: (feature, coordinate) => {
            return L.circleMarker(coordinate, {
                radius: 6,
                color: '#FFFFFF',
                weight: 1,
                fillColor: getSeverityColor(feature.properties.severity),
                fillOpacity: 0.7,
            });
        },

        onEachFeature: (feature, layer) => {
            const crime = feature.properties;

            layer.bindPopup(`
                    <strong>${escapeHtml(crime.category)}</strong>
                    <strong>Severity</strong>: ${escapeHtml(crime.severity ?? 'Not classified')}
                    <br>
                    <strong>Occurred</strong>: ${escapeHtml(crime.occurred_at ?? 'Not classified')}
                    <br>
                    <strong>Location</strong>: ${escapeHtml(crime.address ?? 'Not classified')}
                `)
        }
    })
    return markers;
}

function getSeverityColor(severity) {
    switch(severity.toLowerCase()) {
        case 'high':
            return '#C85A53';
        case 'moderate':
            return '#F59E0B';
        case 'low':
            return '#22C55E';
        default:
            return '##94A3B8';
    }
}