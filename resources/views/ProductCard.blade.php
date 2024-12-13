<div class="card d-flex flex-column p-2" style="width: 15rem; max-width:18rem">
    <img src="{{$product->image_url}}" class="card-img-top" alt="...">
    <div class="card-body d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-center">
            <h5 class="card-title">{{$product->name}}</h5>
        </div>
        <p class="card-text">
            {{substr($product->description, 0, 100)}}...</p>
    </div>
    <a href="#" class="btn btn-primary d-flex my-1 mb-2 mx-3  justify-content-center items-center justify-self-baseline">Add to Cart
        <i class="bi bi-cart d-flex ms-2 justify-content-center" style="font-size: 1.5rem;"></i>
    </a>
</div>
