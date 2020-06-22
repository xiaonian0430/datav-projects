const express = require("express");
const Router = express.Router();
const scrollBoard = require("./data/scrollBoard.json");
const rankingBoard = require("./data/rankingBoard.json");
const roseChart = require("./data/roseChart.json");
const digitalFlop = require("./data/digitalFlop.json");
const cards = require("./data/cards.json");

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


Router.get("/rankingBoard", function (req, res) {
  var result = {
    data: rankingBoard,
  };
  return res.status(200).json({ status: "ok", result: result });
});

Router.get("/roseChart", function (req, res) {
  var result = {
    data: roseChart,
  };
  return res.status(200).json({ status: "ok", result: result });
});

Router.get("/digitalFlop", function (req, res) {
  var result = {
    data: digitalFlop,
  };
  return res.status(200).json({ status: "ok", result: result });
});

Router.get("/cards", function (req, res) {
  var result = {
    data: cards,
  };
  return res.status(200).json({ status: "ok", result: result });
});


module.exports = Router;
