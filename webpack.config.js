const path = require('path');
const miniCssWebpackPlugin = require('mini-css-extract-plugin');
const globImporter = require('node-sass-glob-importer');

module.exports = {
    entry : './assets/js/main.js',
    output : {
        filename : 'main.min.js',
        path : path.resolve(__dirname, 'dist') 
    },
    module : {
        rules : [
            {
                test: /\.scss/i,
                use: [
                    {
                        loader: miniCssWebpackPlugin.loader
                    },
                    "css-loader",
                    {
                        loader: "sass-loader",
                        options: {
                            sassOptions: {
                                importer: globImporter()
                            }
                        }
                    }
                ]
            }
        ]
    },
    plugins : [
        new miniCssWebpackPlugin({
            filename: 'css/style.css'
        })
    ],
    watch: true,
    watchOptions: {
        aggregateTimeout: 600,
    },
}