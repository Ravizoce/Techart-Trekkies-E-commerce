<div class="px-5 my-3 py-3 rounded-3 mx-3 bg-black">
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between align-content-center p-2">
            <div>
                <h4 class="text-decoration-underline text-bold text-lg">{{ $category->name }}</h4>
            </div>
            <div class="text-decoration-none  d-flex justify-content-center">
                @if (count($category->products) > 5)
                    {{-- <h5 class="text-decoration-none link-primary cursor-pointer">Vue all</h5> --}}
                    @include('reusable/FilterButton', [
                        'butn' => [
                            'name' => 'Vue all',
                            'class' => 'bg-transparent',
                            'Filter' => $category
                        ],
                    ])
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex gap-1">
        @forelse ($category->products->take(5) as $product)
            {{-- {{$product}} --}}
            @include('../ProductCard', ['product' => $product])
        @empty
            No products availble
        @endforelse
    </div>
    {{-- @include('../ProductCard' ) --}}
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
