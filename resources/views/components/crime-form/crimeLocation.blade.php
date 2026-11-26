<div class="relative">
    <div class="py-4">
        <h1 class="text-2xl">03 Incident Location</h1>
        <p class="text-xs text-white/60">All fields are required</p>
    </div>
    <div class="relative z-[1000]">
        <input
            type="text"
            id="address-search"
            placeholder="Search for the Address..."
            autocomplete="off"
            class="w-full border p-2 bg-primary rounded-md"
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
    <div class="bg-primary px-2 mt-5">
        <h2 class="text-lg pt-2">Confirm Incident Location</h2>
        <div
            id="crime-location-map"
            class="relative z-0 w-full rounded-lg mt-3"
            style="height: 200px;"
        ></div>
        <div class="bg accent py-3">
            <button type="button" id="confirm-location" class="bg-accent rounded-2xl py-2 px-4 text-sm">Confirm Incident Location</button>
        </div>
    </div>

    {{-- Selected Area display --}}
    <div class="bg-primary p-3 rounded-md mt-3">
        <p class="text-xs text-white/60">Selected Address</p>

        <h1 id="selected-address-display" class="text-sm font-medium mt-1">
            No address selected
        </h1>
    </div>
</div>