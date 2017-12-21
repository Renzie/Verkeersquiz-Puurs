'use strict';

$(function () {
    $('.slider').slider();
    setUsername();
});

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