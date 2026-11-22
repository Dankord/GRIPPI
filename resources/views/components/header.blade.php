@props([
    'avatarUrl' => null,
])

<div class="navbar w-full h-20 border-b border-divider px-8 top-0 flex justify-between select-none">
    <div class="navbar-start w-auto flex items-center gap-4">
        <button 
                type="button" 
                id="sidebar-toggle" 
                class="btn btn-ghost btn-square text-base-content"
                aria-label="Toggle sidebar"
            >
            <x-lucide-menu class="w-5 h-5"/>
        </button>

        <div class="flex items-center text-base md:text-base">
            <span class="text-base-content text-xl font-bold tracking-wider"> GRIPPI </span>
        </div>
    </div>

    <div class="navbar-end flex-1 justify-end">
        <div class="avatar placeholder">
                <x-lucide-circle-user-round class="w-7 h-7" />
        </div>
    </div>
</div>