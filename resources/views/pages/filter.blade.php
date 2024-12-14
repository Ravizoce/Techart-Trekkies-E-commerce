@extends('../layout/layout')
@section('body')
{{-- {{$search}} --}}
    <x-filter :category="$category" :brand="$brand" :minPrice="$minPrice" :maxPrice="$maxPrice" :search="$search"/>
@endsection
