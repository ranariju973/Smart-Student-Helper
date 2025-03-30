<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simon_game</title>
    <style>
        body{
    text-align: center;
}

.btn {
    height: 200px;
    width: 200px;
    border-radius: 20%;
    border: 10px solid black;
    margin: 10px;
}
.btn-container{
    display: flex;
    justify-content: center;
}
.red {
    background-color: rgb(255, 95, 95);
}
.yellow {
    background-color: yellow;
}
.green {
    background-color: rgb(81, 255, 0);
}
.purple {
    background-color: rgb(77, 77, 255);
}

.flash {
    background-color: white;
}

.userFlash {
    background-color: green;
}
    </style>
</head>
<body>
    <h1>Simon says game</h1>
    <h3>press any key to start the game</h3>

    <div class="btn-container">
        <div class="line-one">
            <div class="btn red" type = "button" id="red" ></div>
            <div class="btn yellow" type = "button" id="yellow"></div>
        </div>
        <div class="line-two">
            <div class="btn green" type = "button" id="green"></div>
            <div class="btn purple" type = "button"id="purple" ></div>
        </div>
    </div>
    <script>
        let gameSeq = []
let userSeq = []

let btns = ["yellow", "red", "purple", "green"]

let started = false
let lavel = 0
let h3 = document.querySelector("h3")

document.addEventListener("keypress", function(){
    if(started == false) {
        console.log('game is started')
        started = true

        lavelUp()
    }
})

function btnFlash (btn) {
    btn.classList.add("flash")
    setTimeout(function() {
        btn.classList.remove("flash")
    }, 250 )
}

function userFlash (btn) {
    btn.classList.add("userflash")
    setTimeout(function() {
        btn.classList.remove("userflash")
    }, 250 )
}

function lavelUp() {
    userSeq = []
    lavel++
    h3.innerText = `Level ${lavel}`

    let randomInx = Math.floor(Math.random() * 4)
    let randomColor = btns[randomInx]
    let randbtn = document.querySelector(`.${randomColor}`)

    // console.log(randomInx)
    // console.log(randomColor)
    // console.log(randbtn)

    gameSeq.push(randomColor)
    console.log(gameSeq)

    btnFlash(randbtn)
}

function checkAns (idx) {
    // console.log("curr lavel :  ", lavel)

    if(userSeq[idx] === gameSeq[idx]) {
        if(userSeq.length == gameSeq.length) {
            setTimeout(lavelUp, 1000)
        }
    } else {
        h3.innerHTML = `game over ! your score was <b> ${lavel} <b/> <br> press any key to start`
        document.querySelector("body").style.backgroundColor = "red"
        setTimeout(function () {
            document.querySelector("body").style.backgroundColor = "white"
        }, 250)
        reset()
    }
}

function btnPress () {
    console.log(this)
    let btn = this
    btnFlash (btn)

    userColor = btn.getAttribute("id")
    userSeq.push(userColor)

    checkAns(userSeq.length-1)
}

let allBtns = document.querySelectorAll(".btn") 
for (btn of allBtns) {
    btn.addEventListener("click", btnPress)
}

function reset () {
    started = false
    gameSeq = []
    userSeq = []
    lavel = 0
}
    </script>
</body>
</html>