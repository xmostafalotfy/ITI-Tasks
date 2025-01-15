import { disableLetters } from "./letters.js";
import { stopTimer } from "./timer.js";

export function resetGame() {
    stopTimer();
    disableLetters();

    document.getElementById("wordDisplay").innerText = "_ _ _ _ _ _ _ _ _ _";
    document.getElementById("feedback").innerText = "Choose a topic from the navbar to start playing!";
    document.getElementById("attempts").innerText = "Attempts left: 7";
    document.getElementById("timer").innerText = "Time left: 30 seconds";
}
