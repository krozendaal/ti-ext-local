<div id="menu{{ $menuItem->menu_id }}" class="menu-item">
    <div class="d-flex flex-row">
        @if ($showMenuImages == 1 AND $menuItemObject->hasThumb)
        <div
            class="menu-thumb align-self-center mr-3"
            style="width: {{ $menuImageWidth }}px"
        >
            <img
                class="img-responsive img-rounded"
                alt="{{ $menuItem->menu_name }}"
                src="{{ $menuItem->getThumb(['width' => $menuImageWidth, 'height' => $menuImageHeight]) }}"
            >
        </div>
        @endif

        <div class="menu-content flex-grow-1 mr-3">
            <h6 class="menu-name">{{ $menuItem->menu_name }}</h6>
            <p class="menu-desc text-muted mb-0">
                {!! nl2br($menuItem->menu_description) !!}
            </p>
        </div>
        <div class="menu-detail align-self-start col-3 text-right p-0">
            @if ($menuItemObject->specialIsActive)
                <div class="menu-meta text-muted">
                    <i
                        class="fa fa-star text-warning pr-sm-1"
                        title="{!! sprintf(lang('igniter.local::default.text_end_elapsed'), $menuItemObject->specialDaysRemaining) !!}"
                    ></i>
                </div>
            @endif

            <div class="menu-price pr-sm-3">
                <b>{!! $menuItemObject->menuPrice > 0 ? currency_format($menuItemObject->menuPrice) : lang('main::lang.text_free') !!}</b>
            </div>

            @isset ($updateCartItemEventHandler)
                <div class="menu-button">
                    @partial('@button', [
                    'menuItem' => $menuItem,
                    'menuItemObject' => $menuItemObject
                    ])
                </div>
            @endisset
        </div>
    </div>
    <div class="d-flex flex-wrap align-items-center allergens">
        @partial('@allergens', [
        'menuItem' => $menuItem,
        'menuItemObject' => $menuItemObject
        ])
    </div>
</div>
