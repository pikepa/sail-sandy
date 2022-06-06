@component('mail::message')
# Bomborra Media Newsletter

Thank you for submitting your email to receive our Newsletter. Please click on the link below to confirm your email address.

If this was not you, then please ignore this email and your address will be deleted from our system after 2 hours.

Your OTP is {{$OTP}} and your user Id is {{$ID}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
