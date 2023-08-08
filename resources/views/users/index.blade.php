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
@include('layouts.navigation')

@can('create', App\Models\User::class)
    <div>
        <a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded' href="{{ route('users.create') }}">{{ __('Create User') }}</a>
    </div>
@endcan

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Birthday</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->birthday }}</td>
            @can('update', $user)
                <td>
                    <a class=" text-blue-600 hover:text-blue-900" href="{{ route('users.edit', $user) }}">Изменить</a>
                </td>
            @endcan
            @can('delete', $user)
                <td>
                    <a data-confirm="Are you sure?" class="text-red-600 hover:text-red-900" href="{{ route('users.destroy', $user) }}" data-method="delete" rel="nofollow">Delete</a>
                </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>
</body>
