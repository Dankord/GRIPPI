<div id="report-detail-overlay" class="hidden fixed inset-0 z-[100] bg-black/50">
    <div
        id="report-detail-drawer"
        class="absolute top-0 right-0 h-full w-full max-w-xl bg-base-200 border-l border-base-300 shadow-2xl transform translate-x-full transition-transform duration-300 overflow-y-auto"
    >
        {{-- Headr --}}
        <div class="sticky top-10 flex items-center justify-between p-5 bg-base-200 border-b border-base-300">
            <div>
                <h2 class="text-lg font-semibold">Report Details</h2>
                <p id="drawer-report-id" class="text-xs text-base-content/60"> --{{--Report Id--}}</p>
            </div>
            <button type="button" id="close-report-drawer" class="btn btn-ghost btn-sm btn-circle border-none"><x-lucide-x class="size-5" /></button>
        </div>

        {{-- Report Info Content whtever i wanna play gta6 --}}
        <div class="p-6 space-y-6">
            <div>
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
                        <p id="drawer-sttus" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Date & Time Occurred</p>
                        <p id="drawer-occured-at" class="font-medium">--</p>
                    </div>
                </div>
                <div class="divider"></div>
                <h3>Report Information</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-base-content/60">Reported By</p>
                        <p id="drawer-reported-by" class="font-medium">--</p>
                    </div>
                    <div>
                        <p class="text-xs text-base-content/60">Incident Location</p>
                        <p id="drawer-address" class="font-medium">--</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>