@props(['stations'])

<div class="flex flex-col w-full">
    <div class="py-4">
        <h1 class="text-2xl">01 Incident Information</h1>
        <p class="text-xs text-white/60">All fields are required</p>
    </div>
    {{-- <div class="flex flex-col mb-5">
        <label for="incident_title" class="form-label">
            Incident Title
        </label>
        <input
            type="text"
            id="incident_title"
            name="incident_title"
            placeholder="Incident Title"
            maxlength="80"
            required
            class="form-input"
        >
    </div> --}}

    <div class="flex flex-row gap-5 mb-5">
        <div class="flex flex-col w-full">
            <label for="reporting_officer" class="form-label">
                Reporting Officer
            </label>

            <input
                type="text"
                id="reporting_officer"
                disabled
                value="{{ auth()->user()->name}}"
                class="form-input cursor-not-allowed opacity-60 select-none pointer-events-none"
            >
        </div>

        <div class="flex flex-col w-full">
            <label for="station_id" class="form-label">
                Station
            </label>

            <select
                id="station_id"
                name="station_id"
                required
                class="form-input"
            >
                <option value="" disabled selected>Select Station</option>
                @foreach ($stations as $station)
                    <option value="{{ $station->id }}">
                        {{ $station->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Incident Date and Time --}}
    <div class="flex flex-col mb-5">
        <label for="occurred_at" class="form-label">
            Date and Time of Incident
        </label>
        <input
            type="datetime-local"
            id="occurred_at"
            name="occurred_at"
            required
            class="form-input"
        >
    </div>

    {{-- incident severity --}}
    <label class="form-label">Incident Level</label>
    <div class="flex flex-row gap-5 mb-5">

        @foreach (['attempted', 'frustrated', 'consummated'] as $severity)
        <label class="flex items-center bg-sky-950 rounded-md p-2 w-full cursor-pointer border-2 border-slate-500 has-checked:border-yellow-500">
            <span class="text-white flex justify-center items-center font-medium text-sm w-full capitalized">
                {{ $severity }}
            </span>
            <input
                type="radio"
                name="severity"
                value="{{ $severity }}"
                required
                class="appearance-none"
            >
        </label>
    @endforeach

    </div>

    <div class="flex flex-col mb-5">
        <label for="description" class="form-label">
            Incident Description
        </label>
        <textarea
            id="description"
            name="description"
            maxlength="500"
            required
            class="form-input resize-none"
        ></textarea>
    </div>
</div>