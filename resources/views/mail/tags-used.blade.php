@component('mail::message')
# tags:

@foreach ($tags as $tag)
*	{{$tag->name}}
@endforeach

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
