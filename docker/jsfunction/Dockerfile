FROM node:20.5.0-bullseye

WORKDIR /app

COPY package.json ./

RUN npm install

COPY ./resources/js .

# アプリケーションの起動コマンド
CMD ["node", "cross/index.js"]
