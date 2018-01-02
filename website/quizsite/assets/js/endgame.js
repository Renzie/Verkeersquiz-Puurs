'use strict';

$(function () {
    $('.slider').slider({interval: 10000});

    setUsername();
    getDepartmentByDepartmentId();


});

var answers;
var currentDepartment;
var questions = [];
var correctAnswers =[];

var categories = [];


function doDbAction(action, callback) {
    return $.ajax({
        type: "POST",
        url: "../dbaction.php",
        data: action,
        error: function () {
            return console.log("error")
        }
    }).then(function (data) {
        return callback(JSON.parse(data));
    })
}


function getQuestions() {
    return doDbAction({
        action: 'getRandomQuestionsByQuizId',
        quizId: localStorage.getItem('quizId'),
        templateId: currentDepartment.schemeId
    }, function (data) {
        return $(data).each(function (index) {
            return doDbAction({action: 'getQuestionById', questionId: data[index]}, function (res) {
                questions[index] = res;
                setupText();
                addToCategoriesUsed(res)
                console.log(correctAnswers)
            })
        })
    })
}

function getScoreByCategories() {
    var scoreByCategory = new Array(categories.length)
    scoreByCategory.fill({amount : 0, amountCorrect: 0});
    console.log("answers = ", answers)
    console.log("questions = ", questions)
    categories.forEach(function (cat, index) {
        questions.forEach(function (question, i) {
            if (cat.id == question.category) {
                scoreByCategory[cat.id -1].amount++;
                console.log("answers:" ,answers[i].questionId)
                console.log("questoin:" ,question.id)
                if (questionIsCorrect(question, answers[i])){
                    console.log("eej")
                }

            }
        })
    })
}

function questionIsCorrect(question, answer) {

    return question.id == answer.questionId && answer.correct == 1;
}

function addToCategoriesUsed(question) { // add categories that are used in the quiz
    return doDbAction({action: 'getCategoryById', categoryId: question.category}, function (data, index) {
        categories[data.id - 1] = data;
    }).then(function () {
        setCategories();
        getScoreByCategories()
    })
}

function setCategories() {
    $('.category').remove();
    categories.forEach(function (data, index) {
        var html = '<div class="category"><h4 class="light grey-text text-lighten-3">' + data.category + '</h4> </div>'
        $('.review').append(html);
    })
}

function setUsername() {
    doDbAction({action: 'getUser', userId: localStorage.getItem('userId')}, function (data) {
        $('.username').text(data.name);
    })
}

function getDepartmentByDepartmentId() {
    return doDbAction({
        action: 'getDepartmentByDepartmentId',
        departmentId: localStorage.getItem('departmentId')
    }, function (data) {
        currentDepartment = data;
        getAnswers();
    }).then(function () {
        return getQuestions();
    })
}





function getAnswers() { // TODO returns all answers except the first one
    doDbAction({action: "getAnswers", userId: localStorage.getItem('userId')}, function (data) {
        console.log("data:", data)
        answers = data;
    }).then(function () {
        answers.forEach(function (data, index) {
            if (data.correct == 1){
                correctAnswers.push(data.questionId);
            }
        })
    })
}


function setupText() {
    var score = Math.round((correctAnswers.length / questions.length) * 100) + "%";
    $('.score').text(score);
}