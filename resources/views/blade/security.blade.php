{{-- 1. Prevents use of raw PHP. NO. --}}
@php($response = app()->version())
App version: {{ $response }}

{{-- 2. Prevents writing to model. Yes but doable through PHP. --}}
{{-- 3. Prevents use of direct MySQL. No but doable through PHP. --}}
