
@props(['crimes'])

<table class="table w-full rounded-md">
    <thead class="bg-base-200">
        <tr>
            <th>Report ID</th>
            <th class="w-40">Reported By</th>
            <th>Crime Category</th>
            <th>Location</th>
            <th>Crime Level</th>
            <th>Status</th>
            <th>Occurred At</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($crimes as $crime)
            <tr
                class="cursor-pointer group hover:bg-base-200/50 transition-colors duration-150"
            >
                <td class="font-semibold whitespace-nowrap align-middle">
                    {{ $crime['report_id'] }}
                </td>

                <td class="w-40 align-middle">
                    <span
                        class="tooltip tooltip-top inline-block align-middle w-32"
                        data-tip="{{ $crime['reported_by'] }}"
                    >
                        <span class="block truncate whitespace-nowrap">
                            {{-- change this to use the relation to the user model: {{ $crime->user->name : " -- "}} --}}
                            {{ $crime['reported_by'] }}
                        </span>
                    </span>
                </td>

                <td class="align-middle">
                    {{ $crime['category'] }}
                </td>

                <td class="align-middle">
                    <span
                        class="tooltip tooltip-top inline-block align-middle w-40"
                        data-tip="{{ $crime['address'] }}"
                    >
                    <span class="block max-w-48 truncate whitespace-nowrap">
                        {{ $crime['address'] }}
                    </span>
                </td>

                <td class="align-middle">
                    <span class="badge badge-outline whitespace-nowrap">
                        {{ $crime['crime_level'] }}
                    </span>
                </td>

                <td class="align-middle">
                    @php
                        $statusColor = match ($crime['status']) {
                            'Ongoing' => 'border-accent text-accent',
                            'Resolved' => 'border-success text-success',
                            'Under Investigation' => 'border-info text-info',
                            default => 'badge-ghost',
                        };
                    @endphp

                    <span class="badge badge-base-100 badge-sm rounded-xl p-3 border {{ $statusColor }}">
                        {{ $crime['status'] }}
                    </span>
                </td>

                <td class="whitespace-nowrap align-middle">
                    {{ \Carbon\Carbon::parse($crime['occurred_at'])->format('M d, Y h:i A') }}
                </td>

                <td class="text-center align-middle">
                    <div class="inline-flex w-full items-center justify-center gap-2 opacity-100 md:opacity-0 md:group-hover:opacity-100 md:group-focus-within:opacity-100 transition-opacity duration-150">
                        <button class="btn btn-sm btn-ghost border-0 rounded-md" title="View">
                            <x-lucide-eye class="size-5" />
                        </button>

                        <button class="btn btn-sm btn-ghost border-0 rounded-md" title="Edit">
                            <x-lucide-square-pen class="size-5" />
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{-- pagination --}}
{{-- <div class='mt-5'>
    {{ $crimes->links() }}
</div> --}}
