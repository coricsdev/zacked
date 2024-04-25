const path = require('path');

module.exports = {
  entry: './blocks/custom-block.js',
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: 'custom-block.js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env', '@babel/preset-react']
          }
        }
      }
    ]
  },
  // Add this line to enable source maps
  devtool: 'source-map'
};
