'use strict';

var firebase = require('firebase');
var XMLHttpRequest = require('xmlhttprequest').XMLHttpRequest;

var config = {
    apiKey: 'AIzaSyCMrWE7gWzGjHW08YimzSpGgnCXbTbzhMk',
    authDomain: 'flipp-a77fe.firebaseapp.com',
    databaseURL: 'https://flipp-a77fe.firebaseio.com',
    storageBucket: '',
    messagingSenderId: '636127035750',
};

var app = firebase.initializeApp(config);

app.auth().signInAnonymously().catch(function (error) {
    var errorMessage = error.message;
    console.log(errorMessage);
});

app.database().ref('Lights').on('child_changed', function (snapshot, prevChildKey) {

    if (typeof prevChildKey === 'string') {
        var optionNumber = parseInt(prevChildKey.substr(-1)) + 1;
    } else {
        return;
    }

    var request = new XMLHttpRequest();

    request.open('GET', 'http://localhost:8090/vote/' + optionNumber, true);

    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            console.log('success');
        } else {
            console.log('error');
        }
    };

    request.onerror = function(error) {
        console.log(error)
    };

    request.send();

}, function (error) {
    console.log(error);
});
