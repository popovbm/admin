<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
{{ Form::model($user, ['route' => ['users.update', $user], 'method' => 'PATCH', 'class' => 'w-50']) }}

{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}

{{ Form::label('birthday', 'Birthday') }}
{{ Form::date('birthday') }}

{{ Form::label('phone', 'Phone') }}
{{ Form::text('phone') }}

{{ Form::label('email', 'Email') }}
{{ Form::text('email') }}

{{ Form::submit('Submit') }}

{{ Form::close() }}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
