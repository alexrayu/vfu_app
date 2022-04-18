@php($test = 5)

{{-- If conditional. --}}
@if ($test === 5)
  Test has value of 5.
@elseif ($test < 5)
  Test is smaller than 5.
@else
  Test is greater than 5.
@endif

{{-- Switch statement. --}}
@switch($test)
  @case($test === 5)
  Test has value of 5.
  @break
  @case($test < 5)
  Test is smaller than 5.
  @break
  @default
  Test is greater than 5.
@endswitch
