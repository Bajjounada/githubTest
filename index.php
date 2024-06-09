<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voice Command Music Player</title>
    <style>
        body {
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff; /* Adjust text color for better readability against the background */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center; /* Center all content */
        }
        h1 {
            color: #c4a7e7; /* Light purple */
            padding: 20px;
            font-weight: bold; /* Make the title bold */
        }
        .album-cover {
            width: 300px; /* Adjust size as needed */
            height: auto;
            margin: 20px auto; /* Center image and add margin */
            border: 2px solid #fff; /* Optional: Add a border for better visibility */
        }
        .player-container {
            margin-top: 20px; /* Add some space above the player container */
        }
        .controls {
            padding: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            background-color: #9b59b6; /* Bright purple */
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        button:hover {
            background-color: #8e44ad; /* Darker purple for hover effect */
        }
    </style>
</head>
<body>

<h1>Voice Command Music Player</h1>
<div class="player-container">
    <img src="album_cover.jpg" alt="Album Cover" class="album-cover">
    <audio id="audioPlayer" controls>
        <source src="GONE.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>

<div class="controls">
    <button onclick="sendCommand('play')">Play</button>
    <button onclick="sendCommand('pause')">Pause</button>
    <button onclick="sendCommand('resume')">Resume</button>
    <button onclick="sendCommand('stop')">Stop</button>
    <button onclick="sendCommand('listen')">Listen for Voice Command</button>
</div>

<script>
    function sendCommand(command) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "command.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send("command=" + command);
    }
</script>

</body>
</html>
