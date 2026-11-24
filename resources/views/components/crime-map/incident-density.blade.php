<div class="card bg-base-200 shadow-md border border-base-300 rounded-xl mb-4">
    <div class="card-body p-4">
        <h2 class="card-title text-base">Crime Density</h2>
        <p class="text-xs text-white/60">Per km² accross the area</p>
        {{-- Card --}}
        <div class="flex items-center justify-between gap-4 mt-2">
            <div class="flex-1">
                <p class="text-xs text-white/60">Citywide Average</p>
                <h3 class="text-2xl font-bold mt-2">1.5<span class="text-xs text-white/60">/km²</span></h3>
            </div>
            <div class="flex-1">
                <p class="text-xs text-white/60">Peak Cell - <span>Malugay Street</span></p>
                <h3 class="text-2xl font-bold mt-2">18.45<span class="text-xs text-white/60">/km²</span></h3>
            </div>
        </div>

        <div class="mt-4">
            <div class="flex w-full h-3 overflow-hidden rounded-full gap-0.5 mb-2">
                <div class="bg-red-400" style="width: 15.73%"></div>
                <div class="bg-amber-600" style="width: 13.48%"></div>
                <div class="bg-yellow-400" style="width: 23.60%"></div>
                <div class="bg-emerald-400" style="width: 47.19%"></div>
            </div>
            {{-- This can be a forEach but for simplicity, I just did it like this, feel free to change this whoever will work on this backend --}}
            <div class="flex justify-between items-center px-6">
                <div class="flex flex-col items-center">
                    <span class="text-xs text-white/60">Very High</span>
                    <span class="text-base font-bold">14</span>
                    <span class="text-xs text-white/60">cells</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-xs text-white/60">High</span>
                    <span class="text-base font-bold">12</span>
                    <span class="text-xs text-white/60">cells</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-xs text-white/60">Moderate</span>
                    <span class="text-base font-bold">21</span>
                    <span class="text-xs text-white/60">cells</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="text-xs text-white/60">Low</span>
                    <span class="text-base font-bold">42</span>
                    <span class="text-xs text-white/60">cells</span>
                </div>
            </div>

        </div>
    </div>
</div>