@component('mail::message')
# Hi {{ $user->f_name }},

A new user account has been created for you on _{{ config('app.name') }}_. Hooray!🥳🥳

Refer below for your new account's details:

@component('mail::table')
| Parameter     | Value                |
| ------------- |:--------------------:|
| Email         | {{ $user->email }}   |
| Password      | {{ $password }}      |
| User Group    | {{ $portfolio }}      |
@endcomponent

Try it now!
@component('mail::button', ['url' => 'npontu.test/login'])
Log In
@endcomponent

Thanks,<br>
{{ config('app.name') }}

<small style="display:flow-root;font-size:14px;color:#bcc2c1;line-height:normal;text-align:center !important;">This message is meant for {{ $user->email }}. If you recieved this mail by mistake, kindly contact **ankrahtony@outlook.com**.<br>Thank you.</small>
@endcomponent
