@component('mail::message')

# {{ $data['name'] }}
entrou em contacto através do site JBI.

@component('mail::table')
| | |
| ------------- |---------------|
| Nome          | {{ $data['name'] }}      |
| Email         | [{{$data['email']}}](mailto:email@example.com) |
| Telefone      | {{$data['phone']}} |
| Mensagem      | {{$data['message']}} |
@endcomponent


@component('mail::button', ['url' => "mailto:{$data['email']}"])
Responder
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
