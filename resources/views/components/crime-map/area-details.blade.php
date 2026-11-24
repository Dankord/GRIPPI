<div class="card bg-base-200 shadow-md border border-base-300 rounded-xl mb-4">
    <div class="card-body p-4">
        <div class="flex justify-between items-center gap-2 mb-2">
            <h2 class="card-title text-base">Area Details</h2>
            <span class="badge badge-base-100 badge-sm rounded-xl p-3 border border-accent text-accent">Grid Cell #102</span>
        </div>
        {{-- Data card --}}
        <div class="flex items-center justify-between gap-4 mt-2">
            <div class="flex-1">
                <p class="text-xs text-white/60">Attempted</p>
                <h3 class="text-2xl font-bold mt-2">12</h3>
            </div>
            <div class="flex-1">
                <p class="text-xs text-white/60">Frustrated</p>
                <h3 class="text-2xl font-bold mt-2">32</h3>
            </div>
            <div class="flex-1">
                <p class="text-xs text-white/60">Consummated</p>
                <h3 class="text-2xl font-bold mt-2">14</h3>
            </div>
        </div>
        <div class="divider my-1"></div>

        {{-- Crime Categories --}}
        <div>
            <h3 class="text-sm font-semibold">Crime Categories</h3>
            <p class="text-xs text-white/60 mt-1">
                Most recorded crime types in this area
            </p>

            {{-- Temporary data para alam ko paano to gagawin NI RAF HAHAHAHA --}}
            @php
                $crimeCategories = [
                    ['name' => 'Theft', 'count' => 18],
                    ['name' => 'Robbery', 'count' => 14],
                    ['name' => 'Illegal Drugs', 'count' => 10],
                    ['name' => 'Physical Injury', 'count' => 8],
                    ['name' => 'Burglary', 'count' => 6],
                ];

                $maxCount = max(array_column($crimeCategories, 'count'));
            @endphp

            <div class="flex flex-col gap-3 mt-4">
                @foreach ($crimeCategories as $category)
                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span>{{ $category['name'] }}</span>
                            <span class="font-semibold">
                                {{ $category['count'] }}
                            </span>
                        </div>

                        <div class="w-full bg-base-100 rounded-full h-2 overflow-hidden">
                            <div
                                class="bg-accent h-full rounded-full"
                                style="width: {{ ($category['count'] / $maxCount) * 100 }}%"
                            ></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>