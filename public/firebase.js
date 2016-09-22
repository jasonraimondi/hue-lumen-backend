'use strict';

var firebase = require('firebase');
var request = require('request');

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

var timeOut;

function playScene(scene) {
    request.put(
        'http://10.14.1.146/api/vfcRmQVlEUHHsVzyFHkEGTI4DqZVwbzUQzoxYR3X/groups/1/action',
        {
            json: {
                scene: scene
            }
        },
        function (error, response, body) {
            if (!error && response.statusCode == 200) {
                // console.log(body)
            }
        }
    );
}
function alternateOne() {
    playScene('xalternate1');

    sleep(500).then(() => {
        playScene('xalternate2');

        sleep(500).then(() => {
            playScene('xalternate1');

            sleep(500).then(() => {
                playScene('xalternate2');

                sleep(500).then(() => {
                    playScene('xalternate2');
                    playScene('base');
                });
            });
        });
    });
}
app.database().ref('Lights').on('child_changed', function (snapshot) {

    clearTimeout(timeOut);

    playScene(snapshot.key);

    timeOut = setTimeout(function () {

        var randomNumber = numberBetween(1,10);

        if (randomNumber > 5) {
            playScene('base');
        } else {
            alternateOne();
        }

    }, 3500);


}, function (error) {
    console.log(error);
});

function sleep (time) {
    return new Promise(function (resolve) { setTimeout(resolve, time) });
}

function numberBetween(start, end) {
    return Math.floor(Math.random() * ((end - start) + 1) + start);
}
