<div class="accordion-item accordionItem">
    <div class="accordion-header accordionHeader" id="parent_{{ $item->id }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqs-{{ $item->id }}" aria-controls="faqs-{{ $item->id }}">
            <span> {{ $item->name }} </span>
        </button>
    </div>
    <div data-faqs="faqs-{{ $item->id }}" id="faqs-{{ $item->id }}" class="accordion-collapse accordionCollapse collapse" aria-labelledby="parent_{{ $item->id }}" data-bs-parent="#corporateAccordion">
        <div class="accordion-body accordionBody">
            @if ($faqs)
                @foreach ($faqs as $faqItem)
                    @if ($item->id === (int) $faqItem->categoryID)
                        <div class="content-group text-start @if (!$loop->last) mb-4 @endif">
                            <div class="label py-1 px-4 ms-4 me-5">
                                <p class="py-1 mb-0 text-start mrfs-0-18 mrfs-lg-1-5 text-color-primary">{!! $faqItem->question !!}</p>
                            </div>
                            <div class="text-start">
                                <div class="content mrfs-1 mrfs-lg-1-5"> 
                                    {!! $faqItem->answer !!}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
