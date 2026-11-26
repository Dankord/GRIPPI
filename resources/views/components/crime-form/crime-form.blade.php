<dialog id="crime_form" class="modal">
    <div class="modal-box max-w-xl p-0 rounded-xl border border-white/60">
        {{-- Header --}}
        <div class="flex items-center justify-between p-5">
            <h2 class="text-lg font-bold">New Incident Report</h2>
            <form method="dialog">
                <button class="btn btn-ghost btn-sm btn-circle border-none"><x-lucide-x class="size-5"/></button>
            </form>
        </div>

        {{-- Form --}}
        {{-- Change the route later when using it in encoder --}}
        <form id="crime-form" action="{{ route('encoder.crime.store') }}" method="POST" novalidate>
            @csrf
            {{-- Progress bar gng --}}
            <div class="flex gap-2 mx-5">
                <div class="progress-segment active"></div>
                <div class="progress-segment"></div>
                <div class="progress-segment"></div>
            </div>
            <div class="px-5">
            {{-- Step 1 --}}
                <section data-step="0">
                    <x-crime-form.crimeInformation />
                </section>
            {{-- Step 2 --}}
                <section data-step="1">
                    <x-crime-form.crimeClassification />
                </section>
                {{-- Step 3 --}}
                <section data-step="2">
                    <x-crime-form.crimeLocation />
                </section>

                {{-- Navigation --}}
                <div class="flex justify-between my-5">
                        <button
                            type="button"
                            id="previous-step"
                            class="btn btn-ghost rounded-md"
                            disabled
                        >
                            <x-lucide-arrow-left class="size-4"/>
                            Previous <span id="previous-label"></span>
                        </button>

                        <button
                            type="button"
                            id="next-step"
                            class="btn btn-accent rounded-md"
                        >
                            Next <span id="next-label">Classification</span>
                            <x-lucide-arrow-right class="size-4"/>
                        </button>

                        <button
                            type="submit"
                            id="submit-form"
                            class="btn btn-accent rounded-md"
                            hidden
                        >
                            Submit Report
                        </button>
                </div>
            </div>
        </form>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>