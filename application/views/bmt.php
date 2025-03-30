<?php $this->load->view('layout/header');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<br><br><br><br>
<body class="bg-gray-100">

    <!-- Main Container -->
    <div class="container mx-auto mt-6 p-4">

        <!-- Budget Summary -->
        <div class="grid grid-cols-3 gap-4">
            <div class="p-6 bg-green-500 text-white shadow-md rounded text-center transform hover:scale-105 transition">
                <h2 class="text-xl font-bold">Total Balance</h2>
                <p id="total-balance" class="text-2xl">₹ 0</p>
            </div>
            <div class="p-6 bg-blue-500 text-white shadow-md rounded text-center transform hover:scale-105 transition">
                <h2 class="text-xl font-bold">Income</h2>
                <p id="total-income" class="text-2xl">₹ 0</p>
            </div>
            <div class="p-6 bg-red-500 text-white shadow-md rounded text-center transform hover:scale-105 transition">
                <h2 class="text-xl font-bold">Expenses</h2>
                <p id="total-expense" class="text-2xl">₹ 0</p>
            </div>
        </div>

        <!-- Budget Input Form -->
        <div class="mt-6 bg-white p-6 shadow-md rounded">
            <h2 class="text-lg font-semibold mb-4">Add Transaction</h2>
            <input type="text" id="desc" placeholder="Description" class="border p-2 rounded w-full mb-2">
            <input type="number" id="amount" placeholder="Amount" class="border p-2 rounded w-full mb-2">
            <select id="type" class="border p-2 rounded w-full mb-2">
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            <button onclick="addTransaction()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 w-full">Add</button>
        </div>

        <!-- Transactions List -->
        <div class="mt-6 bg-white p-6 shadow-md rounded">
            <h2 class="text-lg font-semibold mb-4">Transaction History</h2>
            <ul id="transactions" class="list-disc pl-6"></ul>
        </div>

    </div>

    <script>
        let totalBalance = 0;
let totalIncome = 0;
let totalExpense = 0;

function addTransaction() {
    let desc = document.getElementById("desc").value;
    let amount = parseFloat(document.getElementById("amount").value);
    let type = document.getElementById("type").value;

    if (!desc || isNaN(amount)) {
        alert("Please enter valid details.");
        return;
    }

    let transactionList = document.getElementById("transactions");
    let listItem = document.createElement("li");
    listItem.textContent = `${desc}: ₹${amount} (${type})`;
    listItem.classList.add(type === "income" ? "text-green-500" : "text-red-500");
    transactionList.appendChild(listItem);

    if (type === "income") {
        totalIncome += amount;
        totalBalance += amount;
    } else {
        totalExpense += amount;
        totalBalance -= amount;
    }

    document.getElementById("total-balance").textContent = `₹${totalBalance}`;
    document.getElementById("total-income").textContent = `₹${totalIncome}`;
    document.getElementById("total-expense").textContent = `₹${totalExpense}`;
}
    </script>
</body>
</html>