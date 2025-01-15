export function hint(word, guessedWord, handleGuess) {
    document.getElementById("btn-hint").disabled = true;

    const hintedCharIndex = guessedWord.indexOf("_");
    if (hintedCharIndex !== -1) {
        const hintedChar = word[hintedCharIndex].toUpperCase();
        handleGuess(hintedChar);
        document.getElementById("feedback").innerText = `Hint! The letter "${hintedChar}" is in the word.`;
    }
}
