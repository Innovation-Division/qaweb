@props([
    'align' => 'right', 
    'width' => '300px', 
    'height' => 'auto', 
    'contentClasses' => 'bg-white border border-secondary shadow p-2 rounded'
])

@php
$alignmentClasses = match ($align) {
    'left' => 'start-0',
    'top' => 'top-0',
    default => 'end-0',
};
@endphp

<div class="position-relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-transition:enter="fade show"
         x-transition:leave="fade hide"
         class="dropdown-menu show position-absolute {{ $alignmentClasses }}"
         style="min-width: {{ $width }}; max-height: {{ $height }}; display: none;"
         @click="open = false">
        <div class="{{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
