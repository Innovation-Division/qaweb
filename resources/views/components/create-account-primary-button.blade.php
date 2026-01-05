@props([
'size' => 'medium',
'isActive' => false,
'disabled' => false,
])

@php
$sizes = [
'primary' => ['width' => '292px', 'height' => '44px', 'textSize' => '16px', 'expandedWidth' => '292', 'iconSize' => '20px'],
];

$sizeConfig = $sizes[$size] ?? $sizes['primary'];

$buttonClasses = "inline-flex items-center justify-center border-[3px] border-solid rounded-[3px] leading-[28px]
transition-all duration-300 focus:outline-none primary-button " . ($disabled ? "cursor-not-allowed" : "");

$buttonStyles = "
color: #FFFFFF;
width: " . ($isActive && !$disabled ? $sizeConfig['expandedWidth'] : $sizeConfig['width']) . ";
height: {$sizeConfig['height']};
font-size: {$sizeConfig['textSize']};
font-weight: 500;
background-color: " . ($disabled ? "#C0E6E6" : "#008080") . ";
border-color: " . ($disabled ? "#C0E6E6" : "#008080") . ";
padding-left: " . ($isActive && !$disabled ? "20px" : "12px") . ";
padding-right: " . ($isActive && !$disabled ? "20px" : "12px") . ";
transition: all 0.3s ease-in-out;
outline: none;
box-shadow: none;
white-space: normal;
word-wrap: break-word;
";
@endphp

<button {{ $attributes->merge(['class' => $buttonClasses, 'style' => $buttonStyles, 'type' => 'button']) }}
    @if (!$disabled) onmousedown="this.style.backgroundColor='#60B3B3'; this.style.borderColor='#60B3B3';"
    onmouseup="this.style.backgroundColor='#008080'; this.style.borderColor='#008080';"
    onmouseenter="this.style.width='{{ $sizeConfig['expandedWidth'] }}';"
    onmouseleave="this.style.width='{{ $sizeConfig['width'] }}';"
    @endif
    {{ $disabled ? 'disabled' : '' }}>

    {{ $slot }}
</button>