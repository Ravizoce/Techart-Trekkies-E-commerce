@extends('../layout/layout')
@section('body')
    <x-filter :category="$category" :brand="$brand" :minPrice="$minPrice" :maxPrice="$maxPrice"/>
@endsection
