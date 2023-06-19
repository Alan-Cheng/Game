/*
  檔案名：app.js
  作者：JH Cheng
  日期：2023-06-19
*/

console.log("Welcome to This Game!!!");

var winResize = function(){
    var w = $('.cell').width();
    $('.cell').height(w);
    console.log("window resize");
};

$(window).resize(winResize);