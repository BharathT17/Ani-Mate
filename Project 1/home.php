<?php 
session_start();

if (!isset($_SESSION['username'])) {
  echo "You Are Logged Out";
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ani-Mate</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="images/logocutout.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Seymour+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
    include 'dbcon.php';


    $sqlm = " select * from hmm where type = 'movie'";
    $sqls = " select * from hmm where type = 'series'";
    $resultm = mysqli_query($con,$sqlm) or die("bad query : $sqlm");
    $results = mysqli_query($con,$sqls) or die("bad query : $sqls");

    ?>

    <!-- nav bar -->
    <div class="nav" id="nav" style="padding-bottom: 0;">
      <img src="images/logocutout.png" class="nav_logo" style="height: 90px;position: relative;bottom: 22px;">
      <a href="gallery.html" style="color: white; text-decoration: auto;"><h3><center>Gallery</center></h3></a>
      <a href="logout.php"><button style=" width: 86px;
    height: 36px;
    border-radius: 10px;
    border: none;
    background-color: #C58940;
    font-family: 'Seymour One', sans-serif; cursor: pointer;">Logout</button></a>
    </div>
      <!-- Header -->
    <div class="banner">
      <div class="contents">
        <h1>WELCOME</h1>
        <h1 style="color:#FFDB89;"><?php echo $_SESSION['username']; ?></h1>
      </div>
      <div class="banner-fadeBottom"></div>
    </div>
  <div class="row">
      <h2>Anime Movies</h2>
      <div class="row_posters">
        <?php

        if (mysqli_num_rows($resultm)>0) {
          while ($rowm = mysqli_fetch_array($resultm)) {
              echo "<a href='content.php?ID={$rowm['id']}'><img class='row_poster row_posterLarge' src='data:image/jpeg;base64,".base64_encode($rowm['image'] )."'></a>";
            
            
          }
        }else{
          echo "No Images to Display";
        }

        ?>
    </div>
  </div>
  <div class="row">
      <h2>Anime Series</h2>
      <div class="row_posters">
        <?php

        if (mysqli_num_rows($results)>0) {
          while ($rows = mysqli_fetch_array($results)) {
            echo "<a href='content.php?ID={$rows['id']}'><img class='row_poster row_posterLarge' src='data:image/jpeg;base64,".base64_encode($rows['image'] )."'></a>";
            
          }
        }else{
          echo "No Images to Display";
        }

        ?>
    </div>
  </div>
  <div id="chatbot-icon" style="position: fixed; bottom: 20px; right: 20px; width: 60px; height: 60px; border-radius: 50%; background-color: #e2e2e2; cursor: pointer;">
  <img src="images/Chatbot.png" alt="Chatbot Icon" style="width: 100%; height: auto; padding: 10px;">
</div>
<div id="chatbot-window" style="display: none; position: fixed; bottom: 100px; right: 20px; width: 300px; height: 400px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; overflow-y: scroll; padding: 10px;">
  <div id="chatbot-messages"></div>
  <input type="text" id="user-input" placeholder="Enter The Series/ Movie/ Character Name" style="width: 100%; box-sizing: border-box; margin-top: 10px;">
</div>


<script src="your-javascript-file.js"></script>

<script>
      // Getting references to HTML elements
var chatbotIcon = document.getElementById('chatbot-icon');
var chatbotWindow = document.getElementById('chatbot-window');
var userInputField = document.getElementById('user-input');
var chatbotMessages = document.getElementById('chatbot-messages');

// Event handler for chatbot icon
chatbotIcon.addEventListener('click', function() {
  if (chatbotWindow.style.display === 'none') {
    chatbotWindow.style.display = 'block';
  } else {
    chatbotWindow.style.display = 'none';
  }
});

// Event handler for user input
userInputField.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    var query = event.target.value;
    displayMessage(query, 'user');
    event.target.value = '';
    sendQuery(query);
  }
});

// Function to send the query and display the response
function sendQuery(query) {
  var characterInfo = getCharacterInfoFromAPI(query);
  
  if (characterInfo) {
    displayMessage(`Name: ${characterInfo.name}`, 'bot');
    displayMessage(`Anime: ${characterInfo.anime}`, 'bot');
    displayMessage(`Description: ${characterInfo.description}`, 'bot');
  } else {
    displayMessage('Sorry, information not found.', 'bot');
  }
}

// Function to display the messages
function displayMessage(message, sender) {
  var messageElement = document.createElement('div');
  messageElement.classList.add('message', sender);

  var contentElement = document.createElement('div');
  contentElement.classList.add('message-content');
  contentElement.innerText = message;

  messageElement.appendChild(contentElement);
  chatbotMessages.appendChild(messageElement);
  chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
}

// Function to get character info from the "API" (just a JS object in this case)
function getCharacterInfoFromAPI(query) {
  var characterDatabase = {
    "goku": {
      "name": "Goku",
      "anime": "Dragon Ball series",
      "description": "The main protagonist of the Dragon Ball series."
    },
    "naruto": {
      "name": "Naruto Uzumaki",
      "anime": "Naruto & Naruto Shippuden",
      "description": "The main protagonist of the Naruto series."
    },
    "luffy": {
      "name": "Monkey D. Luffy",
      "anime": "One Piece",
      "description": "The main protagonist of the One Piece series."
    },
    "light": {
      "name": "Light Yagami",
      "anime": "Death Note",
      "description": "The main protagonist of the Death Note series."
    },
    "edward": {
      "name": "Edward Elric",
      "anime": "Fullmetal Alchemist: Brotherhood",
      "description": "The main protagonist of the Fullmetal Alchemist series."
    },
    "mikasa": {
      "name": "Mikasa Ackerman",
      "anime": "Attack on Titan",
      "description": "One of the main protagonists of the Attack on Titan series."
    },
    "lelouch": {
      "name": "Lelouch Lamperouge",
      "anime": "Code Geass",
      "description": "The main protagonist of the Code Geass series."
    },
    "vegeta": {
      "name": "Vegeta",
      "anime": "Dragon Ball series",
      "description": "One of the main characters of the Dragon Ball series."
    },
    "spike": {
      "name": "Spike Spiegel",
      "anime": "Cowboy Bebop",
      "description": "The main protagonist of the Cowboy Bebop series."
    },
    "eren": {
      "name": "Eren Yeager",
      "anime": "Attack on Titan",
      "description": "The main protagonist of the Attack on Titan series."
    },
    "levi": {
      "name": "Levi Ackerman",
      "anime": "Attack on Titan",
      "description": "One of the main characters of the Attack on Titan series."
    },
    "guts": {
      "name": "Guts",
      "anime": "Berserk",
      "description": "The main protagonist of the Berserk series."
    },
    "izuku": {
      "name": "Izuku Midoriya",
      "anime": "My Hero Academia",
      "description": "The main protagonist of the My Hero Academia series."
    },
    "senku": {
      "name": "Senku Ishigami",
      "anime": "Dr. Stone",
      "description": "The main protagonist of the Dr. Stone series."
    },
    "saitama": {
      "name": "Saitama",
      "anime": "One Punch Man",
      "description": "The main protagonist of the One Punch Man series."
    },
    "shinji": {
      "name": "Shinji Ikari",
      "anime": "Neon Genesis Evangelion",
      "description": "The main protagonist of the Neon Genesis Evangelion series."
    },
    "asta": {
      "name": "Asta",
      "anime": "Black Clover",
      "description": "The main protagonist of the Black Clover series."
    },
    "rintarou": {
      "name": "Rintarou Okabe",
      "anime": "Steins;Gate",
      "description": "The main protagonist of the Steins;Gate series."
    },
    "inuyasha": {
      "name": "Inuyasha",
      "anime": "Inuyasha",
      "description": "The main protagonist of the Inuyasha series."
    },
    "tanjiro": {
      "name": "Tanjiro Kamado",
      "anime": "Demon Slayer",
      "description": "The main protagonist of the Demon Slayer series."
    },
    "sasuke": {
      "name": "Sasuke Uchiha",
      "anime": "Naruto Shippuden",
      "description": "One of the last surviving members of Konohagakure's Uchiha clan."
    },
    "sakura": {
      "name": "Sakura Haruno",
      "anime": "Naruto Shippuden",
      "description": "A member of Team 7, known for her medical-nin expertise."
    },
    "kakashi": {
      "name": "Kakashi Hatake",
      "anime": "Naruto Shippuden",
      "description": "The leader of Team 7 and the 6th Hokage of the Hidden Leaf Village."
    },
    "itachi": {
      "name": "Itachi Uchiha",
      "anime": "Naruto Shippuden",
      "description": "A prodigy of Konohagakure's Uchiha clan and served as an Anbu Captain."
    },
    "gaara": {
      "name": "Gaara",
      "anime": "Naruto Shippuden",
      "description": "The jinchūriki of the One-Tail and the Kazekage of Sunagakure."
    },
    "shikamaru": {
      "name": "Shikamaru Nara",
      "anime": "Naruto Shippuden",
      "description": "A member of Team 10, known for his intelligence and strategic skills."
    },
    "hinata": {
      "name": "Hinata Hyuga",
      "anime": "Naruto Shippuden",
      "description": "Heir of the Hyuga Clan and wife of Naruto Uzumaki."
    },
    "jiraiya": {
      "name": "Jiraiya",
      "anime": "Naruto Shippuden",
      "description": "One of the 'Three Legendary Sannin' and Naruto's mentor."
    },
    "pain": {
      "name": "Pain",
      "anime": "Naruto Shippuden",
      "description": "The leader of Akatsuki and the main antagonist for a major part of the series."
    },
    "madara": {
      "name": "Madara Uchiha",
      "anime": "Naruto Shippuden",
      "description": "Co-founder of the Hidden Leaf Village and the legendary leader of the Uchiha clan."
    },
    // Add more characters to the database
  };

  return characterDatabase[query.toLowerCase()];// Getting references to HTML elements
var chatbotIcon = document.getElementById('chatbot-icon');
var chatbotWindow = document.getElementById('chatbot-window');
var userInputField = document.getElementById('user-input');
var chatbotMessages = document.getElementById('chatbot-messages');

// Event handler for chatbot icon
chatbotIcon.addEventListener('click', function() {
  if (chatbotWindow.style.display === 'none') {
    chatbotWindow.style.display = 'block';
  } else {
    chatbotWindow.style.display = 'none';
  }
});

// Event handler for user input
userInputField.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    var query = event.target.value;
    displayMessage(query, 'user');
    event.target.value = '';
    sendQuery(query);
  }
});

// Function to send the query and display the response
function sendQuery(query) {
  var characterInfo = getCharacterInfoFromAPI(query);
  
  if (characterInfo) {
    displayMessage(`Name: ${characterInfo.name}`, 'bot');
    displayMessage(`Anime: ${characterInfo.anime}`, 'bot');
    displayMessage(`Description: ${characterInfo.description}`, 'bot');
  } else {
    displayMessage('Sorry, information not found.', 'bot');
  }
}

// Function to display the messages
function displayMessage(message, sender) {
  var messageElement = document.createElement('div');
  messageElement.classList.add('message', sender);

  var contentElement = document.createElement('div');
  contentElement.classList.add('message-content');
  contentElement.innerText = message;

  messageElement.appendChild(contentElement);
  chatbotMessages.appendChild(messageElement);
  chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
}

// Function to get character info from the "API" (just a JS object in this case)
function getCharacterInfoFromAPI(query) {
  var characterDatabase = {
    "naruto": {
      "name": "Naruto Uzumaki",
      "anime": "Naruto",
      "description": "The main protagonist of the Naruto series."
    },
    "itachi": {
      "name": "Itachi Uchiha",
      "anime": "Naruto",
      "description": "A genius of the Uchiha clan who became an international criminal after murdering his entire clan, with the exception of his younger brother, Sasuke."
    },

    // Add more characters to the database
  };

  return characterDatabase[query.toLowerCase()];
}

}



    </script>

    <script>
      const nav = document.getElementById('nav');
      window.addEventListener('scroll', () => {
       if(window.scrollY >= 100){
         nav.classList.add('nav_black')
       }else{
         nav.classList.remove('nav_black');
       }
     })
    </script>
    <script type="text/javascript">
      // Function to display the messages
function displayMessage(message, sender) {
  var messageElement = document.createElement('div');
  messageElement.classList.add('message', sender);

  var contentElement = document.createElement('div');
  contentElement.classList.add('message-content');
  contentElement.innerText = message;

  messageElement.appendChild(contentElement);
  chatbotMessages.appendChild(messageElement);
  chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
}

    </script>
    <script src="user_profile_script.js"></script>

    <!-- Review section -->
<div class="review-section" style="background-color: #f7f7f7;
  padding: 20px;
  color: #333;">
    <h2 style="text-align: center;
  color: #333;padding-bottom: 15px;">Audience Critiques</h2>
    <div class="reviews" style="display: flex;
  flex-wrap: wrap;
  gap: 20px;flex-direction: row;overflow-y: auto;">
        <?php
        $sqlr = "SELECT * FROM reviews";
        $resultr = mysqli_query($con, $sqlr) or die("bad query: $sqlr");
        if (mysqli_num_rows($resultr) > 0) {
            while ($rowr = mysqli_fetch_assoc($resultr)) {
                echo "<div class='review' style='flex-basis: calc(33.33% - 20px);background-color: #fff;  border: 1px solid #ccc;border-radius: 5px;padding: 10px;box-sizing: border-box;color: #333;margin-bottom: 20px;'><h3 style='color:black;'>{$rowr['username']}</h3><p style='color:black;'>{$rowr['review']}</p></div>";
            }
        } else {
            echo "<h3 style='color:black;'>No reviews yet. Be the first to review!</h3>";
        }
        ?>
    </div>
    <button id="add-review-button" style="display: block;
  width: 200px;
  height: 40px;
  margin: 20px auto;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;">Add Review</button>
</div>

<!-- Review form (hidden by default) -->
<div id="review-form" style="background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  width: 80%;
  margin: 20px auto;">
    <h2 style="color: white;">Add Review</h2>
    <form method="post" action="add_review.php">
      <h2 style="color: black;text-align: center;">Share Your Feedback!</h2>
        <textarea name="review" style="width: 100%;
  height: 100px;
  margin-bottom: 10px;font-family: 'Josefin Sans', sans-serif;" placeholder="Your review" required></textarea>
        <button type="submit" style=" display: block;
  width: 200px;
  height: 40px;
  margin: 10px auto;
  background-color: #28a745;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;">Submit</button>
    </form>
    <button id="close-review-form-button" style="display: block;
  width: 200px;
  height: 40px;
  margin: 10px auto;
  background-color: #dc3545;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;">Close</button>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('add-review-button').addEventListener('click', function() {
    document.getElementById('review-form').style.display = 'block';
  });

  document.getElementById('close-review-form-button').addEventListener('click', function() {
    document.getElementById('review-form').style.display = 'none';
  });
});
</script>

<script>
document.getElementById('add-review-button').addEventListener('click', function() {
  var form = document.getElementById('review-form');
  if (form.style.display === 'none' || form.style.display === '') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
});

document.getElementById('close-review-form-button').addEventListener('click', function() {
  document.getElementById('review-form').style.display = 'none';
});
</script>



  </body>
</html>
