@php($names = ['John', 'Linda', 'Thomas', 'Elsa'])
@php($count = count($names))

{{-- Foreach. --}}
<ol>
@foreach ($names as $name)
 <li>{{ $name }}</li>
@endforeach
</ol>

{{-- Loop. --}}
<ol>
@for ($i = 0; $i < $count; $i++)
    <li>{{ $names[$i] }}</li>
@endfor
</ol>
