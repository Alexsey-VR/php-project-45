<?php

namespace BrainGames\Games;

const MAX_GAME_ROUNDS = 3;

function Greeting(): string
{
    print_r("Welcome to the Brain Games!\n");
    print_r("May I have your name? ");
    $name = trim(fgets(STDIN));
    print_r("Hello, {$name}!\n");

    return $name;
}

function GoodAnswer()
{
    print_r("Correct!\n");
}

function BadAnswer($trueResult, $userResult, $name)
{
    print_r("'{$userResult}' is wrong answer ;(. Correct answer was '{$trueResult}'.\n");
    print_r("Let's try again, {$name}!\n");
}

function Congratulations($name)
{
    print_r("Congratulations, {$name}!\n");
}

function MakeQuestionGetAnswer($question): string
{
    print_r("Question: {$question}\n");
    print_r("Your answer: ");
    $answer = trim(fgets(STDIN));
    $answer = strtolower($answer);

    return $answer;
}

function AnswerIsTrue($trueResult, $userResult): bool
{
    if (strcmp($trueResult, $userResult) === 0) {
        return true;
    } else {
        return false;
    }
}
