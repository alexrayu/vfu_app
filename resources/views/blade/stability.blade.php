{{-- Assigning or printing an empty or undeclared variable. --}}
@@{{ $a }} {{-- ERROR: "$a is undefined" --}}

{{-- Assigning or printing an empty or undeclared array key and object property. --}}
@php($a = [])
@@{{ $a[0] }} {{-- ERROR: "Undefined offset: 0" --}}

{{-- Operations on variables of different types. --}}
@php($a = 1)
@php($b = '1')
{{ $a + $b }}

{{-- Empty and undeclared variables and keys in logic and control structures. --}}
@@@if ($test === 5) {{-- ERROR: "$test is undefined" --}}
@@@endif

{{-- Variables of wrong types in logic and control structures. --}}
@php($a = 1)
@php($b = TRUE)
@if ($a + $b == 2)
<p>TRUE</p>
@endif
