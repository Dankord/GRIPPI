@props(['crimeCategories'])

<form method="GET">
    <div class="flex gap-3">
        <div class="relative w-90">
            <x-lucide-search class="absolute size-4 left-3 top-1/2 -translate-y-1/2 text-base-content/50" />
            <input type="search" name="search" placeholder="Search Reports..." value="{{ request('search') }}" class="bg-base-200/50 w-full rounded-md pl-10 p-2 shadow text-sm">
        </div>
        <div class="relative">
            <button
                type="button"
                id="crime-filter-button"
                class="btn btn-ghost border-0 rounded-md"
                onclick="document.getElementById('crime-filter-panel').classList.toggle('hidden')"
            >
                <x-lucide-sliders-horizontal class="size-5" />
            </button>
            <x-report-page.report-filter-panel :crime-categories="$crimeCategories"/>
        </div>
    </div>
</form>