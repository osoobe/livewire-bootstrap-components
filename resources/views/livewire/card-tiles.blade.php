<div class="lv-admin-tiles" >
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <form class="row my-3 bg-white py-2 shadow-sm rounded" wire:submit.prevent="submit">
        <div class="col-md-8 py-2">
            <h4 class="mb-0 mt-1" >{{ $tiles->count() }} tiles</h4>
        </div>
        <div class="col-md-4 py-1">
            <input type="search" wire:model.live.debounce.300ms="search" class="form-control" >
            @error('search') <span class="error">{{ $message }}</span> @enderror
        </div>
    </form>

    <div class="row mb-3">
        @foreach ($tiles as $tile)
            @php
                $url = url('/');
                if ( !empty($tile['route']) ) {
                    if ( is_string($tile['route']) ) {
                        $url = route($tile['route']);
                    } elseif ( is_array($tile['route']) ) {
                        if ( count($tile['route']) == 1 ) {
                            $url = route($tile['route'][0]);
                        } else {
                            $url = route($tile['route'][0], $tile['route'][1]);
                        }
                    }
                } elseif ( !empty($tile['path']) ) {
                    $url = url($tile['path']);
                } elseif ( !empty($tile['url']) ) {
                    $url = $tile['url'];
                }
            @endphp
            <div class="col-md-4 my-2">
                <a class="card lv-card-tile shadow-sm text-black text-decoration-none card-tile-{{ Str::slug($tile['title']) }}" href="{{ $url }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="{{ $tile['icon'] }}"></i>
                            {{ __($tile['title']) }}
                        </h5>
                        <p class="card-text">{{ __($tile['description']) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</div>
