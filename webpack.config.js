/*
 * Copyright (c) Jake Toolson 2018.
 */

const path = require('path');
const WebpackAssetsManifest = require('webpack-assets-manifest');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const assetsDir = __dirname +'/resources/assets/';
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
    entry: {
        'js/app' : [
            assetsDir + 'js/main.js',
        ],
        'css/vendor' : [
            assetsDir + 'scss/vendor.scss',
            __dirname + '/node_modules/vue-multiselect/dist/vue-multiselect.min.css'
        ],
        'css/app' : [
            assetsDir + 'scss/app.scss',
        ]
    },
    output: {
        path: path.join( __dirname, 'public', 'build'),
        filename: "[name]-[hash].js",
        publicPath: 'public/build'
    },
    module: {
        rules: [
            {
                test: /\.(js|es6)$/,
                loader: 'babel-loader',
            },
            {
                test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                loader: 'file-loader',
                options: {
                    name: 'fonts/[name].[ext]',
                    publicPath: '/build/'
                }
            },
            {
                test: /\.(png|jpg|jpeg|gif)$/,
                loader: 'file-loader',
                options: {
                    name: 'img/[name].[ext]',
                    publicPath: '/build/'
                }
            },
            {
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    use: ['css-loader'],
                    fallback: 'style-loader'
                })
            },
            {
                test: /\.scss$/,
                exclude: /node_modules/,
                use: ExtractTextPlugin.extract({
                    use: ['css-loader', 'sass-loader'],
                    fallback: "style-loader"
                })
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
        ]
    },
    plugins: [
        new UglifyJSPlugin(),
        new WebpackAssetsManifest({
            output: 'rev-manifest.json',
        }),
        new ExtractTextPlugin({
            filename: '[name]-[hash].css',
        }),
        new CleanWebpackPlugin(
            ['js', 'css'],
            {
                root: path.join(__dirname, 'public', 'build'),
                exclude: ['components']
            }
        ),
    ],
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue': 'vue/dist/vue.js',
            '@': path.resolve('resources/assets/js'),
        }
    },
    node: {
        fs: 'empty'
    },
    watchOptions: {
        aggregateTimeout: 300,
        poll: 300,
        ignored: [
            '/node_modules/',
        ]
    },
    stats: 'minimal',
};
