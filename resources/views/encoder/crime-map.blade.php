<x-authorized-layout>
    <x-slot:title>
        Crime Map
    </x-slot:title>
    <div class="h-full min-h-0 flex flex-col">
        <div class="shrink-0">
            <h1 class="text-2xl font-bold">Crime Map</h1>
            <p class="text-sm text-white/60">Explore where the incidents are recorded, filter by its period, severity, and crime category, then switch between the different spatial option for identifying the different hotspots.</p>
        </div>
        {{-- map and overview --}}
        <div class="flex-1 min-h-0 w-full flex gap-4 mt-5">
            {{-- Map --}}
            <div class="w-3/4 min-w-0 h-full">
                <x-crime-map.crime-map />
            </div>
            {{-- Spatial overview --}}
            <div class="w-1/4 min-w-0 h-full min-h-0 overflow-y-auto pb-3 pr-2">
                <x-crime-map.area-snapshot />
                <x-crime-map.incident-density />
                <x-crime-map.area-details />
            </div>
        </div>
    </div>
</x-authorized-layout>