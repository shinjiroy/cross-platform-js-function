import express from 'express';
import { calc } from '../functions/calc.js';

const app = express();

app.use(express.json())
app.use(express.urlencoded({ extended: true }));

//POSTリクエストの作成
app.post('/calc', (req, res) => {
  calc(req.body)
  res.end();
});
const port = 80;
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
