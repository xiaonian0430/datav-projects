const express = require("express");
const Router = express.Router();
const scrollBoard = require("./data/ScrollBoard.json");

// post 获取参数 console.log(req.body);
// get 获取参数 console.log(req.query);

Router.post("/data", function (req, res) {
  params = req.body;
  let data_no = params.data_no;
  var result = {
    data_no: data_no,
  };
  return res.status(200).json({ status: "ok", result: result });
});

Router.get("/scrollBoard", function (req, res) {
  var result = {
    data: scrollBoard,
  };
  return res.status(200).json({ status: "ok", result: result });
});

module.exports = Router;
