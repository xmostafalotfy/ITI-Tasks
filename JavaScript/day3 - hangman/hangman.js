var words = {
    "birds": [
        "eagle", "parrot", "sparrow", "owl", "penguin", "falcon", "peacock", "swan",
        "hummingbird", "crane", "dove", "woodpecker", "macaw", "canary", "ostrich", 
        "cockatoo", "flamingo", "heron", "kingfisher", "vulture"
    ],
    "brands": [
        "toyota", "tornado", "samsung", "apple", "intel", "google", "microsoft", 
        "amazon", "nike", "adidas", "huawei", "sony", "tesla", "bmw", "coca cola", 
        "pepsi", "dell", "hp", "lenovo", "panasonic"
    ],
    "games": [
        "valorant", "fortnite", "pubg", "detroit", "minecraft", "overwatch", 
        "league of legends", "apex legends", "counter strike", "fall guys", "doom", 
        "elden ring", "gta", "assassins creed", "god of war", "the sims", "halo", 
        "call of duty", "dark souls", "red dead redemption"
    ],
    "cities": [
        "chicago", "new york", "los angeles", "istanbul", "mumbai", "cairo", 
        "tokyo", "paris", "london", "berlin", "dubai", "shanghai", "bangkok", 
        "sydney", "moscow", "seoul", "rome", "toronto", "vienna", "barcelona"
    ]
}

var topics = Object.keys(words)

window.addEventListener("load", menuSound)

document.getElementById("nav").innerHTML += topics
    .map(topic => `<button onclick="startGame('${topic}')" onmouseenter="menuSound()" ><b>${topic}</b></button>`)
    .join("")

var word = ""
var guessedWord = []
var right = 0
var wrong = 0
var timeLeft = 30
var timer = null

document.querySelectorAll("#letters button").forEach(button => {
    button.disabled = true
})

function startGame(topic) {
    resetGame()
    disableButtons()
    document.getElementById("hangman").src="images/empty.webp";
    document.getElementById("popwin").style.display = "none";
    document.getElementById("nav").style.display = "none";

    word = words[topic][Math.floor(Math.random() * words[topic].length)]
    guessedWord = word.split("").map(char => (char === " " ? "  " : "_"))
    updateWordDisplay()
    document.getElementById("feedback").innerText = "Click a letter to start guessing!"

    document.querySelectorAll("#letters button").forEach(button => {
        button.disabled = false
    })

    startTimer()
}

function updateWordDisplay() {
    var display = guessedWord.join(" ")
    document.getElementById("wordDisplay").innerText = display
}

var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
var lettersDiv = document.getElementById("letters")

alphabet.split("").forEach(letter => {
    lettersDiv.innerHTML += `<button id="btn-${letter}" onclick="handleGuess('${letter}')"><h3>${letter}</h3></button>`
})

document.querySelectorAll("#letters button").forEach(button => {
    button.disabled = true
})

function hint(){
    document.getElementById(`btn-hint`).disabled = true
    var hintedChar = guessedWord.indexOf("_")
    if(hintedChar != -1){ handleGuess(word[hintedChar].toUpperCase()) }
    document.getElementById("feedback").innerText = `Hint! The letter "${word[hintedChar].toUpperCase()}" is in the word.`



}

function handleGuess(letter) {
    if (!word) {
        document.getElementById("feedback").innerText = "Please choose a topic first!"
        return
    }

    document.getElementById(`btn-${letter}`).disabled = true 

    var count = 0
    for (var i = 0; i < word.length; i++) {
        if (word[i].toUpperCase() === letter) {
            guessedWord[i] = word[i]
            count++
        }
    }

    if (count > 0) {
        updateWordDisplay()
        document.getElementById("feedback").innerText = `Correct! The letter "${letter}" is in the word.`

        right += count
        if (right === word.replace(/ /g, "").length) {
            let scopeWord = word;
            setTimeout(() => {
            document.getElementById("popwin").style.display = "flex"
            document.getElementById("end").style.display = "flex"
            document.getElementById("emo").src = "images/victory.gif"
            document.getElementById("end-letter").innerHTML = "Awesome job!<br/> You saved the stick figure... "
            document.getElementById("end-word").innerHTML = `The word was '${scopeWord}'`
            resetGame()
            },1000);
            disableButtons()
            stopTimer()
        }else{
            stopTimer()
            startTimer()
        }
    } else {
        wrong++
        document.getElementById("feedback").innerText = `Wrong! The letter "${letter}" is not in the word.`
        document.getElementById("attempts").innerText = `Attempts left: ${7 - wrong}`
        if (wrong >= 1){
            document.getElementById("hangman").src = `images/hangman-${wrong-1}.svg`
        }


        if (wrong === 7) {
            document.getElementById("hangman").src = `images/hangman-6.svg`
            let scopeWord = word;
            setTimeout(() => {
            document.getElementById("popwin").style.display = "flex"
            document.getElementById("end").style.display = "flex"
            document.getElementById("emo").src = "images/lost.gif"
            document.getElementById("end-letter").innerHTML = "You ran out of attempts!<br/> The hangman got you... "
            document.getElementById("end-word").innerHTML = `The word was '${scopeWord}'`
            resetGame()
            },1000);
            disableButtons()

            stopTimer()

        }else{
            stopTimer()
            startTimer()
        }
    }
}

function startTimer() {
    document.getElementById("timer").innerText = "Time left: 30 seconds"
    timeLeft = 30 
    timer = setInterval(() => {

        timeLeft--
        document.getElementById("timer").innerText = `Time left: ${timeLeft} seconds`
        

        if (timeLeft === 0) {
            let scopeWord = word;
            setTimeout(() => {
                document.getElementById("popwin").style.display = "flex"
                document.getElementById("end").style.display = "flex"
                document.getElementById("emo").src = "images/lost.gif"
                document.getElementById("end-letter").innerHTML = "Tick-tock... You ran out of time! "
                document.getElementById("end-word").innerHTML = `The word was '${scopeWord}'`
                resetGame()
                },1000);            
            stopTimer()
            disableButtons()

        }
    }, 1000)
}

function stopTimer() {
    clearInterval(timer)
}

function disableButtons(){

    document.querySelectorAll("#letters button").forEach(button => {
        button.disabled = true 
    })

}

function resetGame() {
    stopTimer()
    document.getElementById("wordDisplay").innerText = "_ _ _ _ _ _ _ _ _ _"


    document.getElementById("feedback").innerText = "Choose a topic from the navbar to start playing!"
    document.getElementById("attempts").innerText = "Attempts left: 7"
    document.getElementById("timer").innerText = `Time left: 30 seconds`

    word = ""
    guessedWord = []
    right = 0
    wrong = 0
    timer = null
    timeLeft = 30
}

function again(){
    document.getElementById("end").style.display = "none";
    document.getElementById("nav").style.display = "flex";

}

function menuSound(){
    var audio = new Audio('menu-select.wav');
    audio.play();
}