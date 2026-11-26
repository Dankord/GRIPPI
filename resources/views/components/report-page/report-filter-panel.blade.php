
@props(['crimeCategories'])

<div
    id="crime-filter-panel"
    class="hidden absolute right-0 top-full mt-2 z-50
           w-80 bg-base-200 border border-base-300
           rounded-xl shadow-xl p-5"
>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-5">
        <h3 class="font-semibold text-base">
            Filter Reports
        </h3>
        <button
            type="button"
            onclick="document.getElementById('crime-filter-panel').classList.add('hidden')"
            class="btn btn-ghost btn-xs btn-circle border-0"
        >
            <x-lucide-x class="size-4" />
        </button>
    </div>

    {{-- Filter Fields --}}
    <div class="flex flex-col gap-4">

        {{-- Crime Category --}}
        <div class="flex flex-col gap-2">
            <label for="category" class="text-sm font-medium">
                Crime Category
            </label>

            <select
                name="category"
                id="category"
                class="select select-sm w-full bg-base-100 border-0 rounded-md"
            >
                <option value="">All Categories</option>

                @foreach ($crimeCategories as $crimeCategory)
                    <option
                        value="{{ $crimeCategory->id }}"
                        @selected((string) request('category') === (string) $crimeCategory->id)
                    >
                        {{ $crimeCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Crime Level --}}
        <div class="flex flex-col gap-2">
            <label for="crime_level" class="text-sm font-medium">
                Crime Level
            </label>

            <select
                name="crime_level"
                id="crime_level"
                class="select select-sm w-full bg-base-100 border-0 rounded-md"
            >
                <option value="">All Levels</option>
                <option value="attempted" @selected(request('crime_level') === 'attempted')>
                    Attempted
                </option>
                <option value="frustrated" @selected(request('crime_level') === 'frustrated')>
                    Frustrated
                </option>
                <option value="consummated" @selected(request('crime_level') === 'consummated')>
                    Consummated
                </option>
            </select>
        </div>

        {{-- Status --}}
        <div class="flex flex-col gap-2">
            <label for="status" class="text-sm font-medium">
                Status
            </label>

            <select
                name="status"
                id="status"
                class="select select-sm w-full bg-base-100 border-0 rounded-md"
            >
                <option value="">All Statuses</option>
                <option value="ongoing" @selected(request('status') === 'ongoing')>
                    Ongoing
                </option>
                <option value="resolved" @selected(request('status') === 'resolved')>
                    Resolved
                </option>
                <option value="under_investigation" @selected(request('status') === 'under_investigation')>
                    Under Investigation
                </option>
            </select>
        </div>

        {{-- Date Range --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium">
                Date Range
            </label>

            <div class="grid grid-cols-2 gap-2">
                <div class="flex flex-col gap-1">
                    <label
                        for="date_from"
                        class="text-xs text-base-content/60"
                    >
                        From
                    </label>

                    <input
                        type="date"
                        name="date_from"
                        id="date_from"
                        value="{{ request('date_from') }}"
                        class="input input-bordered input-sm w-full bg-base-100 border-0 rounded-md"
                    >
                </div>

                <div class="flex flex-col gap-1">
                    <label
                        for="date_to"
                        class="text-xs text-base-content/60"
                    >
                        To
                    </label>

                    <input
                        type="date"
                        name="date_to"
                        id="date_to"
                        value="{{ request('date_to') }}"
                        class="input input-bordered input-sm w-full bg-base-100 border-0 rounded-md"
                    >
                </div>
            </div>
        </div>

    </div>

    {{-- Footer --}}
    <div class="flex items-center justify-between mt-5 pt-4 border-t border-base-300">
        <a
        {{-- href="{{ route('reports.index') }}"  --}}
        class="btn btn-ghost btn-sm border-0 rounded-md">
            Clear Filters
        </a>

        <button
            type="submit"
            class="btn btn-primary btn-sm border-0 rounded-md"
        >
            Apply Filters
        </button>
    </div>
</div>
