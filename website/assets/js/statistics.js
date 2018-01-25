/**
 * Created by Renzie on 24/01/2018.
 */

$(function () {
    $('select').material_select();
    getQuiz();
    viewAllOrganizations()
});


var currentQuiz;
var selectedDepartment;
var students = [];
var organisations;
var departmentsFromOrganisation;
var allStudentsFromOrganisation = [];
var allAnswersFromStudents = [];
var allAnswersById = [];



function doDbAction(action, callback) {
    return $.ajax({
        type: "POST",
        url: "dbaction.php",
        data: action,
        error: function (err) {
            return console.log(err)
        }
    }).then(function (data) {
        return callback(JSON.parse(data));
    })
}



function getAnswersByUser() {
    //todo need to fix template first
}

function getQuestionsByQuizId(quizId) {
    doDbAction({action: 'getCurrentQuiz', quizId: quizId}, function (data) {
        currentQuiz = data;
        console.log("fetching Quiz: OK");
    })
}

function viewAllOrganizations() {
    doDbAction({action: 'getAllOrganisations'}, function (data) {
        addOrganisationsToList(data);
        organisations = data;
        console.log("fetching Organisations: OK");
    })
}

function addOrganisationsToList(organisations) {
    addToSelect("#organisation", organisations)
    $('select[name="organisation"]').on('change', getDepartmentById)
}

function getDepartmentById() {
    var department = $("#department");
    var org = document.getElementById("organisation");
    department.empty();
    $('select').material_select('update');
    var selectedOrg = org.options[org.selectedIndex].value;
    doDbAction({action: 'getDepartmentsByOrganisationId', organisationId: selectedOrg}, function (data) {
        departmentsFromOrganisation = data;
        console.log(departmentsFromOrganisation)
        addToSelect("#department", data);
    }).then(function () {
        getAllStudentsFromAllDepartments(departmentsFromOrganisation);
        $('select[name="department"]').off().on('change', saveSelectedDepartment);
    })
}

function getAllStudentsFromAllDepartments(departments) {
    let students  = departments.map((department) => {
        return new Promise((resolve) => {
            doDbAction({action: 'getUsersByDepartmentId', departmentId: department.id}, function (res) {
                allStudentsFromOrganisation.push(res);

                resolve();
            })
        })
    })

    Promise.all(students).then(function () {
        console.log("Fetchd all students from organisation", allStudentsFromOrganisation)
        console.log("Now fetching answers...");
        getAnswersFromUsers()
    })
}

function saveSelectedDepartment() {
    var dep = document.getElementById("department");
    var selectedDep = dep.options[dep.selectedIndex].value;
    doDbAction({action: 'getDepartmentByDepartmentId', departmentId: selectedDep}, function (data) {
        selectedDepartment = data
        getStudents(selectedDepartment.id);
    })
}

function addToSelect(selectId, data) {
    $(data).each(function (index) {
        $(selectId).append('<option value="' + data[index].id + '">' + data[index].name + '</option>');
        $('select').material_select('update');
    })
}

function getQuiz() {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var quizId = url.searchParams.get("id");

    getQuestionsByQuizId(quizId);
}


function getStudents(departmentId) {
    doDbAction({action: 'getUsersByDepartmentId', departmentId: departmentId}, function (data) {
        students = data;
    })
}

function getNamesOfStudents() {
    var studentNames;
    $(students).each(function (index) {
        studentNames[index] = students[index].name + " " + students[index].familyName;
    });
    return studentNames;
}


function getAnswersFromUsers() {
    let answers  = allStudentsFromOrganisation.map((student) => {
        return new Promise((resolve) => {
            doDbAction({action: 'getAnswers', userId: student.id}, function (res) {
                allAnswersFromStudents.push(res);
                resolve();
            })
        })
    })

    Promise.all(answers).then(function () {
        console.log("Fetchd all answersIDs from students",allAnswersFromStudents)
        console.log("Now fetching answers for visibility on chart? maybe idk")
    })
}



//var ctx = document.getElementById("students").getContext('2d');
var studentChartData = {
    type: 'bar',
    data: {
        labels: getNamesOfStudents(),
        datasets: 'todo',
        borderWidth: 1
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
};
//var Chart = new Chart(ctx, studentChartData);


