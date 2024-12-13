@extends('layout/layout')


@section('body')
    <div class="text-primary w-100 d-flex flex-column justify-content-center align-items-center">
        <div class="catagory d-flex flex-column w-100 px-5 pt-1">
            <div class=" card-title">
                <h3 class=" text-decoration-underline ">Catagories we offer:</h3>
            </div>
            <div class="d-flex">
                <div class=" bg-dark p-3 text-white">
                    <div class="d-flex rounded-1 p-2 ">
                        @forelse ($AllCategories as $category)
                            <div class="bg-black p-2 m-2 rounded-2 cursor-pointer">
                                @include('reusable/FilterButton', [
                                    'butn' => [
                                        'name' => $category->name,
                                        'class' => 'bg-transparent',
                                        'Filter' => $category
                                    ],
                                ])
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        @foreach ($categories as $item)
            <x-group :category="$item" />
        @endforeach
    </div>
@endsection
