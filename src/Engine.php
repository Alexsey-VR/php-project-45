<?php

namespace BrainGames\Games;

const MAX_GAME_ROUNDS = 3;

function greeting(): string
{
    print_r("Welcome to the Brain Games!\n");
    print_r("May I have your name? ");
    $input = fgets(STDIN);
    $name = trim(is_string($input) ? $input : '');
    print_r("Hello, {$name}!\n");

    return $name;
}

function goodAnswer(): void
{
    print_r("Correct!\n");
}

function badAnswer(string $trueResult, string $userResult, string $name): void
{
    print_r("'{$userResult}' is wrong answer ;(. ");
    print_r("Correct answer was '{$trueResult}'.\n");
    print_r("Let's try again, {$name}!\n");
}

function congratulations(string $name): void
{
    print_r("Congratulations, {$name}!\n");
}

function makeQuestionGetAnswer(string $question): string
{
    print_r("Question: {$question}\n");
    print_r("Your answer: ");
    $input = fgets(STDIN);
    $answer = trim(is_string($input) ? $input : '');
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
