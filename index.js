var randomWords = require('random-words');
var express     = require('express');
var app         = express();
var cors        = require('cors');

const PORT = 3000;

function generateResult(num) {
  let returnObj = [];

  for(let i = 0; i < num; i++){
      let a = {
        id: i,
        hash: Math.random().toString(36).substring(2,8),
        label: randomWords({ exactly: 4, join: ' '})
      };
      returnObj.push(a);
    }

    return returnObj;
}

app.use(cors());

app.get('/:num',  (req, res) => {
  let r = generateResult(req.params.num);
  res.send(r);
})


app.listen(PORT, () => {
  console.log(`Dummy Service listening on port ${PORT}`)
});
