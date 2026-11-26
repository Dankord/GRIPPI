@props(['crimeCategories'])

<div class="flex flex-col items-start justify-start mb-5">

    <div class="py-4">
        <h1 class="text-2xl">02 Crime Classification</h1>
        <p class="text-xs text-white/60">All fields are required</p>
    </div>
    {{-- Search --}}
    <input
        type="text"
        id="search-crime-category"
        placeholder="Search Crime Categories"
        maxlength="80"
        class="text-white rounded-md bg-sky-950 p-3 text-sm w-full border-slate-500 border-2 resize-none h-auto mb-2"
    >

    {{-- Crime Categories --}}
    <div id="crime-category-list" class="flex flex-col w-full max-h-64 overflow-y-auto">

        @foreach ($crimeCategories as $category)
            <label
                class="crime-category-option flex items-center bg-sky-950 rounded-md p-2 h-auto w-full border-2 border-slate-500 mb-2 cursor-pointer has-checked:border-yellow-500"
            >
                <span class="text-white flex justify-start items-start font-medium text-sm ml-2 mb-1 mr-3">
                    {{ $category['name'] }}
                </span>

                <input
                    type="radio"
                    name="crime_category_id"
                    value="{{ $category['id'] }}"
                    required
                    class="radio radio-sm accent-yellow-500 border-2 border-slate-500 ml-auto"
                >
            </label>
        @endforeach

    </div>
</div>