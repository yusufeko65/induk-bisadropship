let mix = require('laravel-mix');
let execSync = require('child_process').execSync;

mix.js('Modules/Brand/Resources/assets/admin/js/main.js', 'Modules/Brand/Assets/admin/js/option.js')
    .sass('Modules/Brand/Resources/assets/admin/sass/main.scss', 'Modules/Brand/Assets/admin/css/option.css')
    .then(() => {
        execSync('npm run rtlcss Modules/Brand/Assets/admin/css/option.css Modules/Brand/Assets/admin/css/option.rtl.css');
    });
