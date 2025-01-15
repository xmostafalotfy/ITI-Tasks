import { words, topics } from "./game.js";
import { startTimer, stopTimer } from "./timer.js";
import { updateWordDisplay, updateFeedback, updateAttempts } from "./ui.js";
import { initializeLetters } from "./letters.js";
import { hint } from "./hint.js";
import { resetGame } from "./reset.js";

let word = "";
let guessedWord = [];
let right = 0;
let wrong = 0;




function hintClick(){
    hint(word,guessedWord,handleGuess)
}

function startGame(topic) {
    resetGame();
    word = words[topic][Math.floor(Math.random() * words[topic].length)];
    guessedWord = word.split("").map(char => (char === " " ? "  " : "_"));
    right = 0;
    wrong = 0;

    updateWordDisplay(guessedWord);
    updateFeedback("Click a letter to start guessing!");

    document.querySelectorAll("#letters button").forEach(button => {
        button.disabled = false;
    })
    
    startTimer(() => {
        alert(`Time's up! The word was: ${word}`);
        resetGame();
    });
}

function handleGuess(letter) {
    document.getElementById(`btn-${letter}`).disabled = true;

    let count = 0;
    for (let i = 0; i < word.length; i++) {
        if (word[i].toUpperCase() === letter) {
            guessedWord[i] = word[i];
            count++;
        }
    }

    if (count > 0) {
        updateWordDisplay(guessedWord);
        updateFeedback(`Correct! The letter "${letter}" is in the word.`);

        right += count;
        if (right === word.replace(/ /g, "").length) {
            alert(`Congratulations! You guessed the word: ${word}`);
            stopTimer();
            resetGame();
        }
    } else {
        wrong++;
        updateFeedback(`Wrong! The letter "${letter}" is not in the word.`);
        updateAttempts(7 - wrong);

        if (wrong === 7) {
            alert(`Game Over! The word was: ${word}`);
            stopTimer();
            resetGame();
        }
    }
}


document.addEventListener("DOMContentLoaded", () => {
    const nav = document.getElementById("nav");
    nav.innerHTML = topics
        .map(topic => `<button onclick="startGame('${topic}')"><b>${topic}</b></button>`)
        .join("");

    initializeLetters();
    resetGame();

    window.handleGuess = handleGuess;
    window.hintClick = hintClick;
    window.startGame = startGame;

});
