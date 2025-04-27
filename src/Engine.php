<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

const MAX_GAME_ROUNDS = 3;

function showGreeting(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    return $name;
}
/*
function goodAnswer(): void
{
    line("Correct!");
}
*/
function badAnswer(string $trueResult, string $userResult, string $name): void
{
    line("'{$userResult}' is wrong answer ;(. Correct answer was '{$trueResult}'.");
    line("Let's try again, {$name}!");
}

function congratulations(string $name): void
{
    line("Congratulations, {$name}!");
}

function makeQuestionGetAnswer(string $question): string
{
    line("Question: {$question}");
    $answer = prompt("Your answer");
    $answer = strtolower($answer);

    return $answer;
}

function answerIsTrue(string $trueResult, string $userResult): bool
{
    if (strcmp($trueResult, $userResult) === 0) {
        return true;
    } else {
        return false;
    }
}
