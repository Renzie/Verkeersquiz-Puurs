"use strict";
function doDbAction(action, callback) {
    return $.ajax({
        type: "POST",
        url: "dbaction.php",
        data: action,
        error: function (err) {
            console.log("Error",err);
        }
    }).then(function (data) {
        callback(JSON.parse(data));
    })
}


/**
 * Shuffles array in place. ES6 version
 * @param {Array} a items An array containing the items.
 */
function shuffle(a) {
    for (var i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}
