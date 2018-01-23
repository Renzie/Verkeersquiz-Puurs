'use strict';

$(function () {
    $('.slider').slider({interval: 10000});
    setUsername();
    getDepartmentByDepartmentId()
});

var answers;
var currentDepartment;
var questions = [];
var correctAnswers = [];
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
     doDbAction({action: 'getRandomQuestionsByQuizId', quizId: localStorage.getItem('quizId'), templateId: currentDepartment.schemeId
    }, function (data) {
        return $(data).each(function (index) {
             return doDbAction({action: 'getQuestionById', questionId: data[index]}, function (res) {
                questions[index] = res
                setupText();
                addToCategoriesUsed()
            })
        })
    })
}


function getScoreByCategories() {
    //add all questions sorted by category + correct questions by category
    categories.forEach(function (category,index) {
        category.amount = 0;
        category.amountCorrect = 0;
        questions.forEach(function (question,i) {
            if (question.category == category.id){
                category.amount++;
                if (questionIsCorrect(question,answers[i])){
                    category.amountCorrect++;
                }
            }
        })

    })
}

function questionIsCorrect(question, answer) {
    return question.id == answer.questionId && answer.correct == 1;
}

function addToCategoriesUsed() {
    // add categories that are used in the quiz
    return questions.forEach(function (question, index) {
        return doDbAction({action: 'getCategoryById', categoryId: question.category}, function (data, index) {
            categories[data.id - 1] = data;
        }).then(function () {
            getScoreByCategories();
            setCategories();
        })
    })
}

function setCategories() {
    //setup UI
    $('.category').remove();
    categories.forEach(function (data, index) {
        var percentage = (data.amountCorrect / data.amount) * 100;
        var html = '<div class="category"><h4 class="light grey-text text-lighten-3">   '  + data.category + ' : ' + percentage +  '% </h4> </div>'
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
        return getAnswers().then(function () {
            return getQuestions()
        })
    })
}

function getAnswers() {
    return doDbAction({action: "getAnswers", userId: localStorage.getItem('userId')}, function (data) {
        answers = data;
    }).then(function () {
        answers.forEach(function (data, index) {
            if (data.correct == 1) {
                correctAnswers.push(data);
            }
        })
    })
}


function setupText() {
    var score = Math.round((correctAnswers.length / questions.length) * 100) + "%";
    $('.score').text(score);
}