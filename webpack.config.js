const path = require('path');
const WebpackAssetsManifest = require('webpack-assets-manifest');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const HtmlWebpackExcludeAssetsPlugin = require('html-webpack-exclude-assets-plugin');

const assetsDir = __dirname +'/resources/assets/';

module.exports = {
    entry: {

        // 'js/theme': [assetsDir + 'js/custom.js'],
        'js/app' : [assetsDir + 'js/app.js'],

        'css/vendor' : [
            __dirname + '/node_modules/bootstrap/dist/css/bootstrap.css',
        ],

        'css/app' : [
            assetsDir + 'css/style.css',
            assetsDir + 'css/owl.carousel.min.css'
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
                exclude: /node_modules/,
                options: {
                    presets: ["es2015"]
                }
            },
            {
                test: /\.(png|jpg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'img/[name]-[hash].[ext]',
                            publicPath: '/build/'
                        }
                    }
                ]
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
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'img/[name].[ext]',
                            publicPath: '/build/'
                        }
                    }
                ]
            },
            {
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: ['css-loader'],
                })
            },
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    use: [ 'css-loader', 'sass-loader?sourceMap']
                })
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
        ]
    },
    plugins: [
        new CleanWebpackPlugin(
            ['js', 'css', 'img', 'icons', 'fonts'],
            {
                root: path.join(__dirname, 'public', 'build'),
                exclude: ['components', 'vendor'],
                watch: true,
            }
        ),
        new WebpackAssetsManifest({
            output: 'rev-manifest.json',
        }),
        new ExtractTextPlugin({
            filename: '[name]-[hash].css',
        }),
        new HtmlWebpackExcludeAssetsPlugin()
    ],
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        },
    },
    node: {
        fs: 'empty'
    },
    watchOptions: {
        ignored: [
            '/node_modules/',
        ]
    }
};