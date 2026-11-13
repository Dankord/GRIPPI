@props(['value', 'name' => 'range', 'checked' => false])

<label class="cursor-pointer">
    <input
        type="radio"
        name="{{ $name }}"
        value="{{ $value }}"
        @checked($checked)
        class="peer sr-only">

    <span {{ $attributes->merge(['class' => 'block rounded-full bg-base-content px-5 py-2 text-sm font-medium text-primary transition hover:bg-base-content/90 peer-checked:bg-primary peer-checked:text-primary-content peer-checked:hover:bg-primary peer-focus-visible:ring-2']) }}>
        {{ $slot }}
    </span>
</label>