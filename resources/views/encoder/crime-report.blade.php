<x-authorized-layout>
    <x-slot:title>
        Crime Report
    </x-slot:title>
    <div class="h-full min-w-0 flex flex-col">
        <div class="shrink-0">
            <h1 class="text-2xl font-bold">Crime Reports</h1>
            <p class="text-sm text-white/60">View and manage requested reports and data reports</p>
        </div>
        <div class="min-w-0 mt-5">
            <div class="flex justify-between mb-5">
                <x-report-page.report-filter :crime-categories="$crimeCategories"/>
                <button class="btn btn-accent border-0 rounded-md" onclick="document.getElementById('crime_form').showModal()"><x-lucide-plus class="size-5"/>Add Crime Report</button>
            </div>
            @if($crimes->count() > 0)
                <x-report-page.report-table :crimes="$crimes"/>
            @else
                <div class="text-center py-12 text-white/60">
                    <p>No Crime Reports Found.</p>
                </div>
            @endif
        </div>
    </div>
    <x-crime-form.crime-form :stations="$stations" :crime-categories="$crimeCategories"/>
    {{-- <x-report-page.report-details-drawer /> --}}
</x-authorized-layout>