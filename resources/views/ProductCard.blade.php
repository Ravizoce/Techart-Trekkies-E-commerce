<div class="card d-flex flex-column p-2 text-light bg-black border border-dark-subtle" style="max-width:18rem; max-height:35rem">
    <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
    <div class="card-body d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center">
            <h5 class="card-title"><strong>{{ $product->name }}</strong></h5>
        </div>
        <div class="product-details bg-dark text-light py-3 px-2 rounded-2">
            <div class="d-flex justify-content-between mb-2">
                <strong>Price:</strong>
                <span>{{ $product->price }}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <strong>Alcohol %:</strong>
                <span>{{ $product->alcohol_percentage }}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <strong>Volume:</strong>
                <span>{{ $product->volume }}</span>
            </div>
            @if ($product->brand)
            <div class="d-flex justify-content-between mb-2">
                <strong>Brand:</strong>
                <span>{{ $product->brand->name}}</span>
            </div>    
            @endif
            
            @if ($product->category)
                
            <div class="d-flex justify-content-between mb-2">
                <strong>Category:</strong>
                <span>{{ $product->category->name }}</span>
            </div>
            @endif
        </div>
        {{--         
        <p class="card-text">
            {{substr($product->description, 0, 100)}}...</p> --}}
    </div>
    <a href="{{route("AddToCart",$product->id)}}"
        class="btn btn-primary d-flex my-1 mb-2 mx-3  justify-content-center items-center justify-self-baseline">Add to
        Cart
        <i class="bi bi-cart d-flex ms-2 justify-content-center" style="font-size: 1.5rem;"></i>
    </a>
</div>