@php
    $crimes = [
        [
            'report_id' => 'CR-2026-0001',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Theft',
            'address' => 'Ayala Avenue, Makati City',
            'occurred_at' => '2026-11-24 08:30:00',
            'crime_level' => 'Consummated',
            'status' => 'Ongoing',
        ],
        [
            'report_id' => 'CR-2026-0002',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Robbery',
            'address' => 'J.P. Rizal Street, Makati City',
            'occurred_at' => '2026-11-23 21:15:00',
            'crime_level' => 'Frustrated',
            'status' => 'Ongoing',
        ],
        [
            'report_id' => 'CR-2026-0003',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Physical Injury',
            'address' => 'Chino Roces Avenue, Makati City',
            'occurred_at' => '2026-11-22 14:20:00',
            'crime_level' => 'Consummated',
            'status' => 'Resolved',
        ],
        [
            'report_id' => 'CR-2026-0004',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Burglary',
            'address' => 'Poblacion, Makati City',
            'occurred_at' => '2026-11-21 02:45:00',
            'crime_level' => 'Attempted',
            'status' => 'Ongoing',
        ],
        [
            'report_id' => 'CR-2026-0005',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Illegal Drugs',
            'address' => 'Guadalupe Nuevo, Makati City',
            'occurred_at' => '2026-11-20 18:10:00',
            'crime_level' => 'Consummated',
            'status' => 'Under Investigation',
        ],
        [
            'report_id' => 'CR-2026-0006',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Theft',
            'address' => 'Legazpi Village, Makati City',
            'occurred_at' => '2026-11-19 11:00:00',
            'crime_level' => 'Frustrated',
            'status' => 'Ongoing',
        ],
        [
            'report_id' => 'CR-2026-0007',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Robbery',
            'address' => 'Makati Avenue, Makati City',
            'occurred_at' => '2026-11-18 23:30:00',
            'crime_level' => 'Consummated',
            'status' => 'Resolved',
        ],
        [
            'report_id' => 'CR-2026-0008',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Carnapping',
            'address' => 'Bel-Air, Makati City',
            'occurred_at' => '2026-11-17 04:15:00',
            'crime_level' => 'Attempted',
            'status' => 'Ongoing',
        ],
        [
            'report_id' => 'CR-2026-0009',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Physical Injury',
            'address' => 'San Antonio Village, Makati City',
            'occurred_at' => '2026-11-16 16:40:00',
            'crime_level' => 'Consummated',
            'status' => 'Under Investigation',
        ],
        [
            'report_id' => 'CR-2026-0010',
            'reported_by' => 'John Kervin M. Ganzon',
            'category' => 'Theft',
            'address' => 'Rockwell Center, Makati City',
            'occurred_at' => '2026-11-15 09:25:00',
            'crime_level' => 'Frustrated',
            'status' => 'Resolved',
        ],
    ];
@endphp
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
            <x-report-page.report-table :crimes="$crimes"/>
        </div>
    </div>
    <x-crime-form.crime-form />
</x-authorized-layout>