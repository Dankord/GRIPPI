import L from 'leaflet';
import { createMap } from '../maps/map'

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('address-search');
    const resultContainer = document.getElementById('address-results');

    const addressInput = document.getElementById('selected-address');
    const latitudeInput = document.getElementById('lat');
    const longitudeInput = document.getElementById('long');
    const selectedAddressDisplay = document.getElementById('selected-address-display');

    if(!searchInput || !resultContainer || !addressInput || !latitudeInput || !longitudeInput || !selectedAddressDisplay) return;

    const mapElement = document.getElementById('crime-location-map');
    const map = mapElement ? createMap(mapElement) : null;

    let selectedMarker = null;
    let debounceTimer = null;
    let searchController = null;

    function clearSelection() {
        addressInput.value = '';
        latitudeInput.value = '';
        longitudeInput.value = '';

        if(selectedMarker && map) {
            map.removeLayer(selectedMarker);
            selectedMarker = null;
        }
    }

    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimer);

        // catch any previous request that may have been caught
        if (searchController) {
            searchController.abort();
            searchController = null;
        }

        clearSelection();

        const query = searchInput.value.trim();
        if(query.length < 3) {
            resultContainer.classList.add('hidden');
            return;
        }

        resultContainer.textContent = 'Searching...';
        resultContainer.classList.remove('hidden');

        // wait before sending the request to not overload the API
        debounceTimer = setTimeout(() => {
            searchLocation(query);
        }, 300);
    });

    async function searchLocation(query) {
    searchController = new AbortController();

    try {
        const parameters = new URLSearchParams({
            text: query,
            limit: 5,
        });

        const response = await fetch(
            `/api/geocoding/search?${parameters}`,
            {
                headers: {
                    Accept: 'application/json',
                },
                signal: searchController.signal,
            }
        );

        if (!response.ok) {
            throw new Error('Location search failed.');
        }

        const locations = await response.json();

        if (searchInput.value.trim() !== query) return;

        displayResults(locations);

    } catch (error) {
        if (error.name === 'AbortError') return;

        console.error('Geocoding error:', error);

        resultContainer.textContent =
            'Unable to search locations. Please try again.';

        resultContainer.classList.remove('hidden');
    }
}

    function displayResults(locations) {
        resultContainer.replaceChildren();

        locations.forEach(location => {
            const button = document.createElement('button');

            button.type = 'button';
            button.className = `
                block w-full text-left p-3
                text-white text-sm
                bg-transparent
                transition-all duration-200 ease-out
                hover:bg-sky-900/60
                hover:pl-5
                hover:text-sky-200
                focus:bg-sky-900/60
                focus:outline-none
                focus:ring-1 focus:ring-inset focus:ring-sky-500
                border-b border-slate-700/50
                last:border-b-0
            `;

            button.textContent = location.display_name;
            button.addEventListener('click', () => {
                    selectLocation(location);
                });

                resultContainer.appendChild(button);
        });

        resultContainer.classList.toggle('hidden', locations.length == 0);
    }

    function selectLocation(location) {
        const latitude = Number(location.lat);
        const longitude = Number(location.lon);

        // this check if the numbers are valid numbers, and if the coordinates ii inside the geographical range,  Makati longtitude is 121.0211 and latitude is 14.5568
        if (
            !Number.isFinite(latitude) ||
            !Number.isFinite(longitude) ||
            latitude < -90 || latitude > 90 ||
            longitude < -180 || longitude > 180
        ) {
            return;
        }

        searchInput.value = location.display_name;

        addressInput.value = location.display_name;
        latitudeInput.value = latitude;
        longitudeInput.value = longitude;
        selectedAddressDisplay.textContent = location.display_name;

        resultContainer.classList.add('hidden');

        if (!map) return;

        // Remove previous marker
        if (selectedMarker) {
            map.removeLayer(selectedMarker);
        }

        // Create new marker
        selectedMarker = L.marker([latitude, longitude]).addTo(map);

        selectedMarker.bindPopup('Selected incident location').openPopup();

        map.setView([latitude, longitude], 17);
    }
});

