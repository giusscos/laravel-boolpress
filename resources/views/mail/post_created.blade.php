@component('mail::message')
# Nuovo post creato con successo!

Il tuo post è ora disponibile!

@component('mail::button', ['url' => route('admin.posts.show', $post)])
Vedi il post
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
