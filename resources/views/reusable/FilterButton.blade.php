<div @class(['rounded-2', 'bg-primary','w-fit' , $butn['class'] ?? 'bg-primary' ])>
    <h5 class="link-primary cursor-pointer"><a class="text-decoration-none" href="{{ route('vueall',['category' => [$filter->id]]) }}">{{ $butn['name'] }}</a></h5>
</div>