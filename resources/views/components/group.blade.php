<div class="px-5 my-3 py-3 rounded-3 mx-3 bg-black">
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between align-content-center p-2">
            <div>
                <h4 class="text-decoration-underline text-bold text-lg">{{ $categories->name }}</h4>
            </div>
            <div class="text-decoration-none  d-flex justify-content-center">
                @if (count($categories->product) > 5)
                    {{-- <h5 class="text-decoration-none link-primary cursor-pointer">Vue all</h5> --}}
                    @include('reusable/FilterButton', [
                        'butn' => [
                            'name' => 'View all',
                            'class' => 'bg-transparent',
                            
                        ],
                        'filter' => $categories
                    ])
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex gap-1">
        @forelse ($categories->product->take(5) as $product)
            @include('../ProductCard', ['product' => $product])
        @empty
            No products availble
        @endforelse
    </div>
    {{-- @include('../ProductCard' ) --}}
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
