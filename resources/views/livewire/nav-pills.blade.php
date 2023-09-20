<div class="lv-nav-tabs">
    <ul class="nav nav-tabs nav-pills-header">
        @foreach ( $tabs as $key => $tab )
            @if (!empty($tab['hide']) && $tab['hide'])
                @continue
            @endif
            <li class="nav-item">
                <a class="nav-link @if ($key == $current_tab) active @endif"
                    href="?lvtab={{ $key }}#{{ $key }}"
                    {{-- data-toggle="tab"  role="tab" --}}
                    aria-controls="{{ $key }}" aria-selected="false"
                    wire:click="switch('{{ $key }}')"
                    {{-- wire:ignore --}}
                    {{-- id="tab-{{$key}}" --}}
                      >
                    {{ __($tab['title']) }}
                </a>
            </li>
        @endforeach
    </ul>

    @php
        $content = $tabs[$current_tab];
    @endphp
    <div class="nav-pills-content py-3"  id="{{ $current_tab }}"  aria-labelledby="{{ $current_tab }}-tab">
        @if (empty($content['hide']) || (!empty($content['hide']) && ! $content['hide']))
            @if ( !empty($content['view']) )
                @if ( is_array($content['view']) )
                    @include($content['view'][0], $content['view'][1])
                @elseif( is_string($content['view']) )
                    @include($content['view'])
                @endif
            @elseif( !empty($content['livewire']) )
                @if ( is_array($content['livewire']) )
                    @livewire(...$content['livewire'], key($current_tab))
                @elseif( is_string($content['livewire']) )
                    @livewire($content['livewire'], key($current_tab))
                @endif
            @endif
        @endif
    </div>
</div>
