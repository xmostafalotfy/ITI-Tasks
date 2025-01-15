export function initializeLetters(handleGuess) {
    const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const lettersDiv = document.getElementById("letters");

    alphabet.split("").forEach(letter => {
        lettersDiv.innerHTML += `<button id="btn-${letter}" onclick="handleGuess('${letter}')"><h3>${letter}</h3></button>`;
    });

    document.querySelectorAll("#letters button").forEach(button => {
        button.disabled = true;
    });
}




