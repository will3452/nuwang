@component('mail::message')
# Introduction

{{ $user->name }}, {{ $action }}!

@component('mail::button', ['url' => url('/')])
Check it out!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
