{{-- COMMENT: Blade does not support assignment, uses raw PHP --}}
@php($name = "John")
Hello, {{ $name }}
@php($user = ['name' => $name])
Array name: {{ $user['name'] }}
@php($user = new stdClass())
@php($user->name = $name)
Object name: {{ $user->name }}
