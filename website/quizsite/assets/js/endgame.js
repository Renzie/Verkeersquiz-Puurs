'use strict';

$(function () {
    $('.slider').slider({ interval : 10000});
    setUsername();
    getDepartmentByDepartmentId()
});

var review;
var correctAnswers;
var allQuestions;
var currentDepartment;
var questions;

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

function getDepartmentByDepartmentId() {
    doDbAction({action: 'getDepartmentByDepartmentId', departmentId : localStorage.getItem('departmentId') }, function (data) {
        currentDepartment = data;
        console.log(currentDepartment);
        getCorrectAnswers();
    })
}

function getQuestions() {
    doDbAction({action: 'getRandomQuestionsByQuizId', quizId: localStorage.getItem('quizId'), templateId : currentDepartment.schemeId}, function (data) {
        questions = data;
        console.log(data)

        setupText()
    })
}


function getCorrectAnswers() {
    console.log()
    doDbAction({action : "getCorrectAnswers", userId : localStorage.getItem('userId')}, function (data) {
       correctAnswers = data;
        console.log(data)
        getQuestions();
    })
}


function setupText() {
    $('.score').text(correctAnswers.length + ' / ' + questions.length);
}