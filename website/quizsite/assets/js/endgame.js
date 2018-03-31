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

function getTemplateByDepartmentId() {
    doDbAction({
        action: 'getTemplateByDepartmentId',
        departmentId: currentDepartment.id
    }, function (data) {
        if (data.id == null) {
            getAllQuestionsFromQuiz()
        } else {
            getQuestionsWithTemplate(data.templateId);
        }
    })
}

function getAllQuestionsFromQuiz() {
    return doDbAction({action: 'getAllQuestionsByQuizId', quizId: localStorage.quizId}, function (data) {

        setupQuestions(data);
        /*return $(data).each(function (index) {
         return doDbAction({action: 'getQuestionById', questionId: data[index]}, function (res) {
         questions[index] = res
         setupText();
         addToCategoriesUsed()
         })
         })*/
    })
}

function getQuestionsWithTemplate(templateId) {
    doDbAction({
        action: 'getRandomQuestionsByQuizId', quizId: localStorage.getItem('quizId'), templateId: templateId
    }, function (data) {
        setupQuestions(data)
    })
}
function setupQuestions(data) {
    let listQuestions = data.map((question) => {
        return new Promise((resolve) => {
            doDbAction({action: 'getQuestionById', questionId: question.id}, function (res) {
                questions.push(res);
                setupText();

                resolve();

            })
        })
    });
    Promise.all(listQuestions).then(function () {
        addToCategoriesUsed();
        console.log(categories)
    })
}


function getScoreByCategories() {
    //add all questions sorted by category + correct questions by category
    categories.forEach(function (category, index) {
        category.amount = 0;
        category.amountCorrect = 0;
        answers.sort((a, b) => parseFloat(a.questionId) - parseFloat(b.questionId)); //sorts the answerarray by questionId

        questions.forEach(function (question, i) {
            if (question.category == category.id) {
                category.amount++;
                console.log(question, answers[i])
                console.log(question.id == answers[i].questionId)

                if (questionIsCorrect(question, answers[i])) {
                    category.amountCorrect++;
                    console.log(category)
                }
            }
        })

    })
}

function questionHasSameId(question, answer) {
    return question.id == answer.questionId;
}

function questionIsCorrect(question, answer) {
    return question.id == answer.questionId && answer.correct == 1;
}

function addToCategoriesUsed() {
    // add categories that are used in the quiz

    let listQuestions = questions.map((question) => {
        return new Promise((resolve) => {
            return questions.forEach(function (question, index) {
                return doDbAction({action: 'getCategoryById', categoryId: question.category}, function (data, index) {
                    categories[data.id - 1] = data;
                    resolve();
                })
            })
        })
    })
    Promise.all(listQuestions).then(function () {
            getScoreByCategories();
            setCategories();
        })

}

function setCategories() {
    //setup UI
    $('.category').remove();
    categories.forEach(function (data, index) {
        var percentage = Math.round((data.amountCorrect / data.amount) * 100);
        var html = '<div class="category"><h4 class="light grey-text text-lighten-3">' + data.category + ' : ' + percentage + '% </h4> </div>'
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
            return getTemplateByDepartmentId()
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
                console.log(correctAnswers)
            }
        })
    })
}

function setupText() {
    var score = Math.round((correctAnswers.length / questions.length) * 100) + "%";
    $('.score').text(score);
}