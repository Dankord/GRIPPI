{{-- THIS WILL BE THE LANDING PAGE --}}
<x-layout>
    <div>
        <a href="{{ route('login')}}" class="btn btn-primary border-0 p-5 rounded-md">Sign in</a>
    </div>
    {{-- map test --}}
    {{-- <div class="w-full">
        <h1 class="text-xl font-bold mb-4">Leaflet Map Test</h1>

        <div
            id="crime-map"
            class="w-full rounded-xl border border-gray-300"
            style="height: 600px"
        ></div>
    </div> --}}

    {{-- form location test --}}
    {{-- <div class="w-6xl">
        <x-crime-form.crimeLocation />
    </div> --}}

    {{-- form testing --}}
    {{-- <button class="btn btn-primary" onclick="document.getElementById('crime_form').showModal()">Add Crime Report</button>

    <x-crime-form.crime-form /> --}}
</x-layout>