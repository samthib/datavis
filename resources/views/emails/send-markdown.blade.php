@component('mail::message')
# Mail from {{ $data['name'] }}
({{ $data['email'] }})


@component('mail::panel')
## {{ $data['subject'] }}:
{!! $data['message'] !!}
@endcomponent

@component('mail::button', ['url' => url('/'), 'color' => 'success'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
