# cross-platform-js-function

## 概要

フロントエンドとサーバーサイドで同じ処理を実行したい時のコンテナ構成例です。

JSのコードを書き、ブラウザで実行するためのJSファイルをビルドする時に含めると共に、  
サーバーサイドでは任意のコードで書かれた処理が載るコンテナから対象のJSを実行し、結果を受け取ります。

## 構成

![構成図](https://raw.githubusercontent.com/shinjiroy/cross-platform-js-function/main/diag.drawio.svg)

## ビルド手順

1. `docker-compose run --rm staticbuilder npm install`
2. `docker-compose run --rm staticbuilder npm webpack --config webpack.config.js` でブラウザ用のJSをビルド
3. `docker-compose up -d` で各コンテナを起動
4. `http://localhost/?val1=1&val2=5` 等にリクエスト
