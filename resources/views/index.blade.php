<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Firebase RealTime Chat</title>
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
  </head>
  <body>
   <h2>Firebase RealTime Chat</h2>
    </header>

    <div id="chat">
      <!-- messages will display here -->
      <ul id="messages"></ul>

      <!-- form to send message -->
      <form id="message-form">
        <input id="message-input" type="text" />
        <button id="message-btn" type="submit">Send</button>
      </form>
    </div>

    <!-- scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
    <script src="{{ asset('js/index.js')}}"></script>
    
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyAY7RVv2eP5_8dhi1TZ0xeVW5OJ6YhPCmk",
    authDomain: "laravel-chat-d349f.firebaseapp.com",
    databaseURL: "https://laravel-chat-d349f-default-rtdb.firebaseio.com",
    projectId: "laravel-chat-d349f",
    storageBucket: "laravel-chat-d349f.appspot.com",
    messagingSenderId: "917050720541",
    appId: "1:917050720541:web:4b12c77dddb913094fe1f4"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);


  function sendMessage(e) {
  e.preventDefault();

  // get values to be submitted
  const timestamp = Date.now();
  const messageInput = document.getElementById("message-input");
  const message = messageInput.value;

  // clear the input box
  messageInput.value = "";

  //auto scroll to bottom
  document
    .getElementById("messages")
    .scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" });

  // create db collection and send in the data
  db.ref("messages/" + timestamp).set({
    username,
    message,
  });
}


function  fetchChat.on("child_added", function (snapshot) {
  const messages = snapshot.val();
  const message = `<li class=${
    username === messages.username ? "sent" : "receive"
  }><span>${messages.username}: </span>${messages.message}</li>`;
  // append the message on the page
  document.getElementById("messages").innerHTML += message;
});
</script>
  </body>
</html>