@component('mail::message')

# {{ $data['name'] }}
entrou em contacto através do site JBI.

@component('mail::table')
| | |
| ------------- |---------------|
| Nome          | {{ $data['name'] }}      |
| Email         | [{{$data['email']}}](mailto:{{$data['email']}}) |
| Telefone      | {{$data['phone']}} |
| ------------- |---------------|
| Nome do amigo/a          | {{ $data['name'] }}      |
| Email         | [{{$data['friend']['email']}}](mailto:{{$data['friend']['email']}}) |
| Telefone      | {{$data['friend']['phone']}} |
@endcomponent


@component('mail::button', ['url' => "mailto:{$data['friend']['email']}"])
Responder
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
