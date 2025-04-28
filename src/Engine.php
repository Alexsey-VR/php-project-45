<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const MAX_GAME_ROUNDS = 3;

function getNameAndShowGreeting(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    return $name;
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

function runEngine($flow)
{
    $name = getNameAndShowGreeting();
    line($flow['description']);

    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $answer = makeQuestionGetAnswer($flow['questionData'][$i]);
        if (answerIsTrue($flow['trueResult'][$i], $answer)) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$flow['trueResult'][$i]}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
