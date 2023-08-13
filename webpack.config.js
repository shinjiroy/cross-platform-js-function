import path from 'path';

const __dirname = path.resolve(path.dirname('')); 

const config = {
    entry: './resources/js/', // 入力ファイル（メインのJSファイル）
    output: {
        filename: 'app.js',   // 出力ファイル名
        path: path.resolve(__dirname, './public/build/js') // 出力ディレクトリ
    }
};

export default config;
