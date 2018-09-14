@component('mail::message')
# From: {{ $data['email'] }}
 
 <br>
{{ $data['bodyMessage'] }}  
<br>

Sender Name,<br>
**{{ $data['name'] }}**
@endcomponent
