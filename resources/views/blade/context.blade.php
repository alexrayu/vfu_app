{{-- Blade does not have global context, uses PHP to get data --}}
{{ app()->databasePath() }}
{{ app()->getLocale() }}
{{ app()->version() }}

{{-- Immediate context: YES (See Inheritance). --}}
