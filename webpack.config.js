var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/') 
    .setPublicPath('/build')
    .addEntry('app', './public/assets/js/main.js') // Check this path
    .enableSingleRuntimeChunk() 
    .enableLessLoader() 
    .enableSourceMaps(!Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();
