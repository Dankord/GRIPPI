
@props(['crimes'])
<div class="overflow-x-auto w-full rounded-md">
    <table class="table w-full">
        <thead class="bg-base-200">
            <tr>
                <th class="sticky left-0 z-30 min-w-30">Report ID</th>
                <th class="sticky left-36 z-30 w-40 min-w-40">Reported By</th>
                <th>Crime Category</th>
                <th>Location</th>
                <th>Crime Level</th>
                <th>Status</th>
                <th>Occurred At</th>
                <th>Reported At</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($crimes as $crime)
                <tr
                    class="cursor-pointer group"
                >
                    <td class="sticky left-0 z-20 w-52 min-w-52 max-w-52 bg-base-100 group-hover:bg-base-200/50 font-semibold whitespace-nowrap align-middle transition-colors duration-150">
                        {{ $crime->report_id ?? '--' }}
                    </td>

                    <td class="sticky left-52 z-20 w-40 min-w-40 bg-base-100 group-hover:bg-base-200/50 align-middle transition-colors duration-150">
                        <span
                            class="tooltip tooltip-top inline-block align-middle w-32"
                            data-tip="{{ $crime->reportedBy?->name ?? '--' }}"
                        >
                            <span class="block truncate whitespace-nowrap">
                                {{ $crime->reportedBy?->name ?? '--' }}
                            </span>
                        </span>
                    </td>

                    <td class="group-hover:bg-base-200/50 transition-colors duration-150 align-middle">
                        {{ $crime->crimeCategory?->name ?? 'Uncategorized' }}
                    </td>

                    <td class="group-hover:bg-base-200/50 transition-colors duration-150 align-middle">
                        <span
                            class="tooltip tooltip-top inline-block align-middle w-40"
                            data-tip="{{ $crime->address ?? '--' }}"
                        >
                        <span class="group-hover:bg-base-200/50 transition-colors duration-150 block max-w-48 truncate whitespace-nowrap">
                            {{ $crime->address ?? '--' }}
                        </span>
                    </td>

                    <td class="group-hover:bg-base-200/50 transition-colors duration-150 align-middle">
                        <span class="badge badge-outline whitespace-nowrap">
                            {{ $crime->severity ?? '--' }}
                        </span>
                    </td>

                    <td class="group-hover:bg-base-200/50 transition-colors duration-150 align-middle">
                        @php
                            $statusColor = match ($crime['status']) {
                                'ongoing' => 'border-accent text-accent',
                                'resolved' => 'border-success text-success',
                                'under investigation' => 'border-info text-info',
                                default => 'badge-ghost',
                            };
                        @endphp

                        <span class="badge badge-base-100 badge-sm rounded-xl p-3 border {{ $statusColor }}">
                            {{ $crime->status ?? '--' }}
                        </span>
                    </td>

                    <td class="group-hover:bg-base-200/50 transition-colors duration-150 whitespace-nowrap align-middle">
                        {{ \Carbon\Carbon::parse($crime->occurred_at ?? '--')->format('M d, Y h:i A') }}
                    </td>

                    <td class="group-hover:bg-base-200/50 transition-colors duration-150 whitespace-nowrap align-middle">
                        {{ \Carbon\Carbon::parse($crime->created_at ?? '--')->format('M d, Y h:i A') }}
                    </td>

                    <td class="group-hover:bg-base-200/50 transition-colors duration-150 text-center align-middle">
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
</div>
{{-- pagination --}}
{{-- <div class='mt-5'>
    {{ $crimes->links() }}
</div> --}}
