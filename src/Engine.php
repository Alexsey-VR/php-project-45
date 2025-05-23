<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function cli\input;

const GAMES_COUNT = 3;

function runGame(string $description, array $flow): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    line($description);

    for ($i = 0; $i < GAMES_COUNT; $i++) {
        line("Question: {$flow[$i]['questionData']}");
        $answer = input();
        $answer = strtolower($answer);

        if (strcmp($flow[$i]['trueResult'], $answer) === 0) {
            line("Your answer: Correct!");
        } else {
            line("Your answer: '{$answer}' is wrong answer ;(. Correct answer was '{$flow[$i]['trueResult']}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
