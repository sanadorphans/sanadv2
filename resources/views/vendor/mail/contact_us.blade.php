@component('mail::message')
# Contact us

From : {{ $name }}

Phone : {{ $phone }}

Email : {{ $email }}

Message :

{{ $message }}

@endcomponent