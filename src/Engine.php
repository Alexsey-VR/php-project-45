<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function cli\input;

const GAMES_COUNT = 3;

function runGame(array $flow): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    line($flow['description']);

    for ($i = 0; $i < GAMES_COUNT; $i++) {
        line("Question: {$flow['questionData'][$i]}");
        $answer = input();
        $answer = strtolower($answer);

        if (strcmp($flow['trueResult'][$i], $answer) === 0) {
            line("Your answer: Correct!");
        } else {
            line("Your answer: '{$answer}' is wrong answer ;(. Correct answer was '{$flow['trueResult'][$i]}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
