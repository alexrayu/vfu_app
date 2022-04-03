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
      <p>This is a list of tested items. All samples run in a loop of 1000 iterations.</p>

      <section>
        <h2>{{ $title }}</h2>

        <table class="compare">
          <tr>
            <th></th>
            <th class="code">Blade</th>
            <th class="code">Twig</th>
          </tr>
          <tr>
            <td>Code</td>
            <td class="val"><code class="language-blade">{{ $blade['tpl'] }}</code></td>
            <td class="val"><code class="language-twig">{{ $twig['tpl'] }}</code></td>
          </tr>
          <tr>
            <td>Compiled PHP</td>
            <td class="val"><code class="language-php">{{ $blade['php'] }}</code></td>
            <td class="val"><code class="language-php">{{ $twig['php'] }}</code></td>
          </tr>
          <tr>
            <td>Result HTML</td>
            <td class="val"><code class="language-html">{{ $blade['html'] }}</code></td>
            <td class="val"><code class="language-html">{{ $twig['html'] }}</code></td>
          </tr>
          <tr>
            <td>Total Speed, ms (1000 loops)</td>
            <td class="val">{{ $blade['compile_ms'] + $blade['render_ms'] }} ms <br /> ({{ $blade['compile_ms'] }} ms compile, {{ $blade['render_ms'] }} ms render)</td>
            <td class="val">{{ $twig['compile_ms'] + $twig['render_ms'] }} ms <br /> ({{ $twig['compile_ms'] }} ms compile, {{ $twig['render_ms'] }} ms render)</td>
          </tr>
        </table>

      </section>

    </main>

    </body>
</html>
