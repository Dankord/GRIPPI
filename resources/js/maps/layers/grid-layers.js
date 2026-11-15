import L from 'leaflet';

export function createGridLayer(geoData) {
    const gridLayer = L.geoJSON(geoData, {
        style: (feature) => {
            const risk = feature.properties.risk_level;

            let fillColor = '#22C55E';

            if (risk === 'super high') {
                fillColor = '##C85A53';
            } else if (risk === 'high') {
                fillColor = '#EB967A'
            } else if (risk === 'moderate') {
                fillColor = '#F8CFA9';
            } else if (risk === 'low') {
                fillColor = '#FDF3E7'
            }

            return {
                color: '#FFFFFF',
                weight: 1,
                opacity: 0.7,
                fillColor: fillColor,
                fillOpacity: 0.25,
            };
        },

        onEachFeature: (feature, layer) => {
            const properties = feature.properties;

            layer.bindPopup(`
                <strong>${properties.cell_code}</strong>
                <br>
                <strong>Incidents</strong>: ${properties.incident_count ?? 0}
                <br>
                <strong>Risk</strong>: ${properties.risk_level ?? 'Not classified'}
            `);
        },
    });

    return gridLayer;
}
