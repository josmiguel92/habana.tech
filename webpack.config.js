var path = require('path');

module.exports = {
    entry: {
        index: "./assets/scripts/index.js",
        vendor: "./assets/scripts/vendor.js",
        form: "./assets/scripts/form.js",
    },
    output: {
        path: path.resolve(__dirname, "./public/static/scripts/"),
        filename: "[name].js"
    },
    module: {
        rules: [
            {
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                },
                test: /\.js$/,
                exclude: /node_modules/
            }
        ]
    },
    // mode: 'development',
    mode: 'production',
};