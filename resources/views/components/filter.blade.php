<div>

    <div class=" text-light row m-2">
        <div class="bg-black w-fit col col-3 rounded-2 p-3  ">
            <form action="{{route('filter')}}" method="post">
                @csrf
                <div class="category ">
                    <div class="head mb-2 text-primary font-weight-bold text-decoration-underline"
                        style="font-size: 1.5rem;">
                        Category
                    </div>
                    <div class="d-flex w-full gap-3 flex-wrap">
                        @forelse ($categories as $category)
                            <div class="absolutecheckbox  bg-dark rounded-1 p-2">
                                <label for='category' class="label d-flex justify-content-start align-content-center">
                                    <input class="d-flex justify-content-start align-content-center" type="checkbox"
                                        name="category[]" value="{{ $category->id }}" @checked(in_array($category->id, $selectedCategories))>
                                    <span class="ms-1"
                                        style=" transform: translatey(-1.4px); font-size: 1rem">{{ $category->name }}</span>
                                </label>
                            </div>
                        @empty
                            no data found
                        @endforelse
                    </div>
                </div>
                <hr />
                <div class="price">
                    <div class="price">
                        <div class="head mb-3 text-primary font-weight-bold text-decoration-underline"
                            style="font-size: 1.5rem;">
                            Price
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <label for="price" class="d-flex flex-row justify-content-center align-content-center">
                                <span class=" me-2">Min</span>
                                <input type="number" for="price" name="minPrice" min=300 max=50000
                                    value="{{ $minPrice }}" />
                            </label>
                            <label for="price" class="d-flex flex-row justify-content-center align-content-center">
                                <span class=" me-2">Max</span>
                                <input type="number" for="price" name="maxPrice" min=300 max=50000
                                    value="{{ $maxPrice }}" />
                            </label>
                        </div>
                    </div>
                    <hr />
                    <div class="brand">
                        <div class="head text-primary font-weight-bold text-decoration-underline"
                            style="font-size: 1.5rem;">
                            Brands
                        </div>
                        <div class="d-flex w-full gap-3 flex-wrap">
                            @forelse ($brands as $brand)
                                <div class="absolutecheckbox  bg-dark rounded-1 p-2">
                                    <label for='brand'
                                        class="label d-flex justify-content-start align-content-center">
                                        <input class="d-flex justify-content-start align-content-center" type="checkbox"
                                            name="brand[]" value="{{ $brand->id }}" @checked(in_array($brand->id, $selectedBrands))>
                                        <span class="ms-1"
                                            style=" transform: translatey(-1.4px); font-size: 1rem">{{ $brand->name }}</span>
                                    </label>
                                </div>
                            @empty
                                no data found
                            @endforelse
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary mt-1">Filter</button>
                </div>
            </form>
        </div>
        <div class="product col row gap-2 ms-2">
            @forelse ($products as $product)
                @include('../ProductCard', ['product' => $product])
            @empty
                No product found
            @endforelse
        </div>
    </div>
