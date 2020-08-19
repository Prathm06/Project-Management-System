@component('mail::message')
# Introduction

New project assigned to you.
<br>
Project Name : {{$projectName}}
<br>
Project Description : {{$projectDesrciption}}

<b>Please visit site for more details.</b>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
