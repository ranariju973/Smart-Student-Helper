<?php $this->load->view('layout/header');?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="<?=base_url('assets/indextodo.css')?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced To-Do List & Habit Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <h1 class="title">To-Do List & Habit Tracker</h1>
        
        <div class="task-input">
            <input type="text" id="taskInput" placeholder="Enter a task...">
            <button id="addTask">Add</button>
        </div>

        <ul id="taskList"></ul>

        <h2 class="habit-title">Habit Tracker</h2>
        <div class="habit-container">
            <input type="text" id="habitInput" placeholder="Enter a habit...">
            <button id="addHabit">Track</button>
        </div>
        <ul id="habitList"></ul>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const taskInput = document.getElementById("taskInput");
    const addTaskBtn = document.getElementById("addTask");
    const taskList = document.getElementById("taskList");

    const habitInput = document.getElementById("habitInput");
    const addHabitBtn = document.getElementById("addHabit");
    const habitList = document.getElementById("habitList");

    function createListItem(text) {
        const li = document.createElement("li");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";

        const span = document.createElement("span");
        span.textContent = text;

        const deleteBtn = document.createElement("button");
        deleteBtn.textContent = "🗑 Delete";
        deleteBtn.classList.add("delete-btn");
        deleteBtn.addEventListener("click", () => li.remove());

        li.appendChild(checkbox);
        li.appendChild(span);
        li.appendChild(deleteBtn);

        return li;
    }

    addTaskBtn.addEventListener("click", () => {
        if (taskInput.value.trim()) {
            taskList.appendChild(createListItem(taskInput.value));
            taskInput.value = "";
        }
    });

    addHabitBtn.addEventListener("click", () => {
        if (habitInput.value.trim()) {
            habitList.appendChild(createListItem(habitInput.value));
            habitInput.value = "";
        }
    });
});
    </script>
</body>
</html>

