'use strict';

$(function () {
    $('.slider').slider({ interval : 10000});
    setUsername();
});

var review;
var correctAnswers;

function doDbAction(action, callback) {
    $.ajax({
        type: "POST",
        url: "../dbaction.php",
        data: action,
        error: function () {
            console.log("error")
        }
    }).then(function (data) {
        callback(JSON.parse(data));
    })
}

function setUsername() {
    doDbAction({action : 'getUser', userId : localStorage.getItem('userId')}, function (data) {
        $('.username').text(data.name);
    })
}


function getCorrectAnswers() {
    doDbAction({action : "getCorrectAnswers", userId : localStorage.getItem('userId')}, function (data) {
       correctAnswers = data;
    })
}