export function updateWordDisplay(guessedWord) {
    document.getElementById("wordDisplay").innerText = guessedWord.join(" ");
}

export function updateFeedback(message) {
    document.getElementById("feedback").innerText = message;
}

export function updateAttempts(attempts) {
    document.getElementById("attempts").innerText = `Attempts left: ${attempts}`;
}
