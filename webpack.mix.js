const mix = require('laravel-mix');
const domain = 'lrbc7.test';
const homedir = require('os').homedir();

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .version()
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync({
    proxy: 'https://' + domain,
    host: domain,
    open: false, // 'external'
    https: {
        key: homedir + '/.config/valet/Certificates/' + domain + '.key',
        cert: homedir + '/.config/valet/Certificates/' + domain + '.crt'
    },
    notify: true,
})
