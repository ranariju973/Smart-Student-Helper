<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Reminder</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Smart Reminder System</h1>
        
        <div class="reminder">
            <h2>Water Drinking Reminder</h2>
            <label for="waterInterval">Set Interval:</label>
            <select id="waterInterval">
                <option value="15">15 min</option>
                <option value="30">30 min</option>
                <option value="45">45 min</option>
                <option value="60">60 min</option>
            </select>
            <button onclick="setWaterReminder()">Start Reminder</button>
        </div>

        <div class="reminder">
            <h2>Exam Countdown</h2>
            <label for="examDate">Set Exam Date:</label>
            <input type="date" id="examDate">
            <button onclick="setExamCountdown()">Start Countdown</button>
            <p id="examCountdown"></p>
        </div>

        <div class="reminder">
            <h2>Yoga & Meditation Reminder</h2>
            <label for="yogaTime">Set Time:</label>
            <input type="time" id="yogaTime">
            <button onclick="setYogaReminder()">Set Reminder</button>
        </div>

        <div class="reminder">
            <h2>Assignment Reminder</h2>
            <label for="assignment">Assignment Name:</label>
            <input type="text" id="assignment">
            <label for="assignmentDate">Due Date:</label>
            <input type="date" id="assignmentDate">
            <button onclick="setAssignmentReminder()">Add Reminder</button>
            <ul id="assignmentList"></ul>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .reminder {
            margin-bottom: 20px;
        }
        button {
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #eee;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
        }
    </style>

    <script>
        function setWaterReminder() {
            let interval = document.getElementById('waterInterval').value;
            setInterval(() => {
                alert('Time to drink water!');
            }, interval * 60000);
        }

        function setExamCountdown() {
            let examDate = new Date(document.getElementById('examDate').value);
            let countdownElement = document.getElementById('examCountdown');
            setInterval(() => {
                let now = new Date();
                let diff = examDate - now;
                let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                countdownElement.innerHTML = `Exam in ${days} days`;
            }, 1000);
        }

        function setYogaReminder() {
            let time = document.getElementById('yogaTime').value;
            let [hours, minutes] = time.split(':');
            setInterval(() => {
                let now = new Date();
                if (now.getHours() == hours && now.getMinutes() == minutes) {
                    alert('Time for yoga & meditation!');
                }
            }, 60000);
        }

        function setAssignmentReminder() {
            let assignment = document.getElementById('assignment').value;
            let date = document.getElementById('assignmentDate').value;
            let list = document.getElementById('assignmentList');
            let li = document.createElement('li');
            li.textContent = `${assignment} - Due: ${date}`;
            list.appendChild(li);
        }
    </script>
</body>
</html>
