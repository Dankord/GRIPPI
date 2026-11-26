<div id="report-detail-overlay" class="hidden fixed inset-0 z-[100] bg-black/50">
    <div
        id="report-detail-drawer"
        class="absolute top-0 right-0 h-full w-full max-w-xl bg-base-200 border-l border-base-300 shadow-2xl transform translate-x-full transition-transform duration-300 overflow-y-auto"
    >
        {{-- Headr --}}
        <div class="sticky top-0 flex items-center justify-between p-5 bg-base-200 border-b border-base-300">
            <div>
                <h2 class="text-lg font-semibold">Report Details</h2>
                <p id="drawer-report-id" class="text-xs text-base-content/60"> --{{--Report Id--}}</p>
            </div>
            <button type="button" id="close-report-drawer" class="btn btn-ghost btn-sm btn-circle border-none"><x-lucide-x class="size-5" /></button>
        </div>

        <div class="p-6 space-y-6">
            <div>
                {{-- Report Information --}}
                <h3 class="text-sm font-semibold mb-3">Report Information</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-base-content/60">Reported By</p>
                        <p id="drawer-reported-by" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Date Reported</p>
                        <p id="drawer-reported-at" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Report Origin</p>
                        <p id="drawer-station" class="font-medium">-- {{--Station--}}</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Incident Location</p>
                        <p id="drawer-address" class="font-medium">--</p>
                    </div>
                </div>
                <div class="divider"></div>
                {{-- Incident information --}}
                <h3 class="text-sm font-semibold mb-3">Incident Information</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-base-content/60">Crime Category</p>
                        <p id="drawer-category" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Crime Level</p>
                        <p id="drawer-crime-level" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Status</p>
                        <p id="drawer-status" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Date & Time Occurred</p>
                        <p id="drawer-occurred-at" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Description</p>
                        <p id="drawer-description" class="font-medium">--</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>