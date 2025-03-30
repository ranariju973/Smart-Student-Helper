<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Management</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            min-height: 100vh;
        }
        header {
            background: rgba(0, 123, 255, 0.9);
            color: white;
            padding: 20px;
            width: 100%;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        main {
            max-width: 600px;
            width: 90%;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            transition: all 0.3s ease-in-out;
        }
        canvas {
            width: 100% !important;
            height: auto !important;
        }
        button {
            padding: 12px 25px;
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        button:hover {
            background: linear-gradient(to right, #ff4b2b, #ff416c);
            transform: scale(1.05);
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
            text-align: center;
        }
        p {
            font-size: 1rem;
            margin-top: 15px;
        }
        @media (max-width: 768px) {
            main {
                width: 95%;
            }
            button {
                width: 100%;
            }
            input {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        Health Management Dashboard
    </header>
    <main>
        <section id="health-stats">
            <canvas id="healthChart"></canvas>
        </section>
        <section id="health-inputs">
            <input type="number" id="heartRate" placeholder="Enter Heart Rate (bpm)">
            <input type="number" id="steps" placeholder="Enter Steps Walked">
            <button onclick="updateHealthData()">Update Data</button>
        </section>
        <section id="health-insights">
            <h3>AI-Based Health Insights</h3>
            <p id="dietSuggestion">Diet Suggestion: -</p>
            <p id="workoutRecommendation">Workout Recommendation: -</p>
        </section>
    </main>
    <script>
        let healthChart;
        document.addEventListener("DOMContentLoaded", function() {
            let ctx = document.getElementById('healthChart').getContext('2d');
            healthChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Heart Rate (bpm)',
                        data: JSON.parse(localStorage.getItem("heartRateData")) || [70, 75, 72, 78, 80, 76, 74],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 3,
                        fill: false,
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointRadius: 5
                    }, {
                        label: 'Steps Walked',
                        data: JSON.parse(localStorage.getItem("stepsData")) || [3000, 4000, 5000, 4500, 6000, 7000, 7500],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 3,
                        fill: false,
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    elements: {
                        line: {
                            tension: 0.4
                        }
                    }
                }
            });
        });

        function updateHealthData() {
            let heartRate = document.getElementById("heartRate").value;
            let steps = document.getElementById("steps").value;
            if (heartRate && steps) {
                let heartRateData = healthChart.data.datasets[0].data;
                let stepsData = healthChart.data.datasets[1].data;
                
                heartRateData.push(parseInt(heartRate));
                stepsData.push(parseInt(steps));
                
                healthChart.data.labels.push("Now");
                healthChart.update();
                
                localStorage.setItem("heartRateData", JSON.stringify(heartRateData));
                localStorage.setItem("stepsData", JSON.stringify(stepsData));
                
                generateHealthInsights(parseInt(heartRate), parseInt(steps));
            } else {
                alert("Please enter valid health data.");
            }
        }

        function generateHealthInsights(heartRate, steps) {
            let dietSuggestion = "Maintain a balanced diet.";
            let workoutRecommendation = "Regular moderate exercise is recommended.";

            if (heartRate > 100) {
                dietSuggestion = "Reduce caffeine and eat more fiber-rich foods.";
                workoutRecommendation = "Avoid strenuous exercise and try yoga or meditation.";
            } else if (heartRate < 60) {
                dietSuggestion = "Increase protein intake and stay hydrated.";
                workoutRecommendation = "Include more cardiovascular exercises.";
            }

            if (steps < 3000) {
                dietSuggestion += " Increase daily activity levels.";
                workoutRecommendation += " Try short walks every hour.";
            } else if (steps > 8000) {
                dietSuggestion += " Ensure sufficient rest and hydration.";
                workoutRecommendation += " Keep up the good work but avoid overexertion.";
            }

            document.getElementById("dietSuggestion").textContent = "Diet Suggestion: " + dietSuggestion;
            document.getElementById("workoutRecommendation").textContent = "Workout Recommendation: " + workoutRecommendation;
        }
    </script>
</body>
</html>
