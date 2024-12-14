@extends('../layout/layout')
@section('body')
    <div class="container my-3 d-flex gap-2 flex-column align-content-center align-items-center justify-content-center">
        <div class="d-flex flex-row w-75 justify-content-between">
            <div class="mb-1 text-primary rounded-2 p-1 d-flex justify-content-center align-items-center"
                style="font-size: 1.6rem">
                <strong> Items In Cart</strong>
            </div>
            <div>
                <button class="bg-primary rounded-2 p-2">Purchease All</button>
            </div>
        </div>
        @forelse ($cartDetails as $item)
            <div class="row align-items-center border w-75 rounded p-3  shadow-sm">
                <div class="col-2 text-center">
                    <img src="{{ $item->product->image_url }}" alt="Product Image" class="img-fluid rounded">
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div>
                        <h5 class="mb-1 bold text-primary" style="font-size: 1.6rem">
                            <strong>{{ $item->product->name }}</strong>
                        </h5>
                        <p class="text-light mb-0">{{ $item->product->description }}</p>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-end">
                    <span class="fw-bold text-primary fs-5 mb-2">Quentity:</span>
                    <span class="text-light fs-5 mb-2">{{ $item->quantity }}</span>
                </div>
                <div class="col ">
                    <div class="d-flex flex-column align-items-end">
                        <span class="fw-bold text-primary fs-5 mb-2">RS: {{ $item->product->price }}</span>
                        <a class=" text-decoration-none" href="{{ route('cartDelete', $item->id) }}"><button
                                class="btn btn-sm btn-danger">Delete</button></a>
                    </div>
                </div>
            </div>
        @empty
            No items in the cart
        @endforelse
    </div>
@endsection
