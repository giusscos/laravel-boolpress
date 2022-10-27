@component('mail::message')
# Nuovo post creato con successo!
 
Il tuo post è ora disponibile!
 
@component('mail::button', ['url' => route('admin.posts.index')])
Vedi i posts
@endcomponent
 
Grazie,<br>
{{ config('app.name') }}
@endcomponent