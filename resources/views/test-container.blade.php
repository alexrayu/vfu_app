<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Oleksii Raiu - Blade and Twig comparison.</title>
      <link rel="stylesheet" media="all" href="/css/app.css" />
      <script src="{{ mix('js/hljs.js') }}" defer></script>
    </head>

    <body>
    <main class="container">
      <h1>Oleksii Raiu - Blade and Twig comparison.</h1>
      <p>This is a list of tested items. All samples run in a loop of 1 mln iterations.</p>

      <section>
        <h2>{{ $title }}</h2>
        <h3>Code:</h3>
        <code class="language-blade">
          {{ $code_tpl }}
        </code>
        <h3>Compiled PHP:</h3>
        <code class="language-php">
          {{ $code_php }}
        </code>
        <h3>Statistics:</h3>
        <code class="language-plaintext">
          {{ $stats }}
        </code>
      </section>

    </main>

    </body>
</html>