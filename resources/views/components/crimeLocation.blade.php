<div class="relative">
    <label for="address-search">Incident Location</label>
    <div class="relative z-[1000]">
        <input
            type="text"
            id="address-search"
            placeholder="Search for the Address..."
            autocomplete="off"
            class="w-full"
        >

        <div
            id="address-results"
            class="absolute top-full left-0 w-full bg-black shadow-lg rounded-lg hidden z-[1001] max-h-60 overflow-y-auto"
        ></div>
    </div>

    {{-- Hidden location values --}}
    <input type="hidden" name="address" id="selected-address">
    <input type="hidden" name="latitude" id="lat">
    <input type="hidden" name="longitude" id="long">

    {{-- Leaflet map --}}
    <div
        id="crime-location-map"
        class="relative z-0 w-full rounded-lg mt-3"
        style="height: 400px;"
    ></div>
</div>