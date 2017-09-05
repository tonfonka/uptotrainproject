var elixir = require('laravel-elixir');
elixir(mix => {
  mix.browserSync(['app/**/*', 'public/**/*', 'resources/views/**/*'], {
    proxy: '0.0.0.0:8000'
  })
})