@props(['text', 'required' => false, 'size' => '16px', 'weight' => '400', 'style' => 'normal', 'info' => ''])

<p class="mb-1"
    style="color: var(--Primary-Black-Text, #303030);
           font-family: Inter;
           font-size: 16px;
           font-style: normal;
           font-weight: 500;
           line-height: 24px;">
    {{ $text }}
    @if ($required)
        <span style="color: red;">*</span>
        @if ($info)
            <span style="color: var(--Primary-Caption-Black-text, #585858);
                         font-family: Inter;
                         font-size: 16px;
                         font-style: normal;
                         font-weight: 500;
                         line-height: 24px;">
                ({{ $info }})
            </span>
        @endif
    @endif
</p>
