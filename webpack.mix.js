const mix = require('laravel-mix');
require('laravel-mix-bundle-analyzer');
/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/
// reduce compiling time
if (!mix.inProduction()) {
	// mix.bundleAnalyzer();
}
// Dashmix CSS & JS
mix.sass('resources/assets/sass/main.scss', 'public/css/dashmix.css')
mix.sass('resources/assets/sass/bootstrap/bootstrap.scss', 'public/css/')
mix.js('resources/assets/js/dashmix/app.js', 'public/js/dashmix.app.js')
mix.js('resources/assets/js/account/app.js', 'public/js/staff/app.app.js')

// Version production to cache bust
if (mix.inProduction()) {
	mix.version();
}
/* Options */
mix.options({
		processCssUrls: false
	})
	.webpackConfig({
		module: {
			rules: [{
				test: /\.pug$/,
				loader: 'pug-plain-loader'
			}],
		},
	});
