const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: './styles/styles.scss',
  output: {
    path: path.resolve(__dirname, 'styles-dist'),
    filename: 'karma-financial-styles.css',
  },
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'karma-financial-styles.min.css',
    }),
  ],
};
