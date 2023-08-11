/**
 * jsfunctionコンテナのWEBアプリ用コード
 */

import express from 'express';
import { calc } from '../functions/calc.js';

const app = express();

app.use(express.json())
app.use(express.urlencoded({ extended: true }));

// 
app.post('/calc', (req, res) => {
  const result =  calc(req.body);
  res.send(result);
});

const port = 80;
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
