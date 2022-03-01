<div class="lv-nav-tabs">
    <ul class="nav nav-tabs">
        @foreach ( $tabs as $key => $tab )
            <li class="nav-item">
                <a class="nav-link @if ($loop->first) active @endif"
                    href="#{{ $key }}"
                    data-toggle="tab"  role="tab"
                    aria-controls="{{ $key }}" aria-selected="false"
                    wire:ignore
                   id="tab-{{$key}}"   >
                    {{ __($tab['title']) }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content py-3">
        @foreach ($tabs as $key => $content )
            <div class="tab-pane fade @if ($loop->first) show active @endif " style="padding: 0 !important;" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                @if ( !empty($content['view']) )
                    @include($content['view'])
                @elseif( !empty($content['livewire']) )
                    @if ( is_array($content['livewire']) )
                        @livewire(...$content['livewire'])
                    @elseif( is_string($content['livewire']) )
                        @livewire($content['livewire'])
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
