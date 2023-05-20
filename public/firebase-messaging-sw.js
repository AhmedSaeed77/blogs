// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyBfp24R8OMMVD-VtV_tehQS4ZN29uq3xMc",
    authDomain: "laraveltest-e097d.firebaseapp.com",
    databaseURL: "https://laraveltest-e097d-default-rtdb.firebaseio.com",
    projectId: "laraveltest-e097d",
    storageBucket: "laraveltest-e097d.appspot.com",
    messagingSenderId: "32167400164",
    appId: "1:32167400164:web:e3b6a758db6887de3692f1",
    measurementId: "G-GH1NFSYHRW"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});