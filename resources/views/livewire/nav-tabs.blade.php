<div class="lv-nav-tabs">
    <ul class="nav nav-tabs">
        @foreach ($tabs as $key => $tab)
            @if (!empty($tab['hide']) && $tab['hide'])
                @continue
            @endif
            <li class="nav-item">
                @if ( ( empty($tab['route']) )  )
                    <a class="nav-link @if ($loop->first) active @endif"
                        href="?lvtab={{ $key }}#{{ $key }}" data-toggle="tab" role="tab"
                        aria-controls="{{ $key }}" aria-selected="false" wire:ignore id="tab-{{ $key }}">
                        {{ __($tab['title']) }}
                    </a>
                @else
                    <a class="nav-link @if ($loop->first) active @endif"
                        href="{{ $tab['route'] }}" >
                        {{ __($tab['title']) }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>

    <div class="tab-content py-3">
        @foreach ($tabs as $key => $content)
            @if ( (!empty($content['hide']) && $content['hide']) || ( !empty($content['route']) ) )
                @continue
            @endif
            <div class="tab-pane fade @if ($loop->first) show active @endif "
                style="padding: 0 !important;" id="{{ $key }}" role="tabpanel"
                aria-labelledby="{{ $key }}-tab">
                @if (!empty($content['view']))
                    @if (is_array($content['view']))
                        @include($content['view'][0], $content['view'][1])
                    @elseif(is_string($content['view']))
                        @include($content['view'])
                    @endif
                @elseif(!empty($content['livewire']))
                    @if (is_array($content['livewire']))
                        @livewire(...$content['livewire'], key($current_tab))
                    @elseif(is_string($content['livewire']))
                        @livewire($content['livewire'], key($current_tab))
                    @endif
                @endif
            </div>
        @endforeach
    </div>

    {{-- <script>

        function onHashChange() {
            var hash = window.location.hash;

            if (hash) {
                // using ES6 template string syntax
                $(`[data-toggle="tab"][href="${hash}"]`).trigger('click');
            }
        }

        window.addEventListener('hashchange', onHashChange, false);
        onHashChange();
    </script> --}}
</div>
