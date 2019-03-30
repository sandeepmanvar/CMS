@component('mail::message')
# Contact Inquiry

<strong>From:</strong> {{ $name }}

<strong>Message:</strong> <br>
{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
