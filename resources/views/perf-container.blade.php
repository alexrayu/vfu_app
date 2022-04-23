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
      <h1>Oleksii Raiu - Blade and Twig performance test.</h1>
      <p>This is a performance test. All templates are run in a loop of 100 iterations and summed.</p>
      <p>Performance index is calculated by: <code>d = winner_time / loser_time</code></p>

      <section>
        <h2>{{ $title }}</h2>

        <table class="compare">
          <tr>
            <th></th>
            <th class="code">Blade</th>
            <th class="code">Twig</th>
          </tr>
          <tr>
            <td>Time, total</td>
            <td class="val">{{ $blade['ms'] }} ms</td>
            <td class="val">{{ $twig['ms'] }} ms</td>
          </tr>
          <tr>
            <td>Perf. index</td>
            <td class="val">d = {{ $blade['delta'] }}</td>
            <td class="val">d = {{ $twig['delta'] }}</td>
          </tr>
        </table>

      </section>

    </main>

    </body>
</html>
