<?php

namespace BrainGames\Games;

use BrainGames\Games\AnswerIsTrue as AnswerIsTrue;
use BrainGames\Games\MakeQuestionGetAnswer as MakeQuestionGetAnswer;
use BrainGames\Games\ComputeOperation as ComputeOperation;

function Calc()
{
    print_r("Welcome to the Brain Games!\n");
    print_r("May I have your name? ");
    $name = trim(fgets(STDIN));
    print_r("Hello, {$name}\n");

    print_r("What is the result of the expression?\n");
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $question = "{$a} {$operators[$i]} {$b}";
        $answer = MakeQuestionGetAnswer($question);
        $result = ComputeOperation($a, $b, $operators[$i]);
        if (AnswerIsTrue($result, $answer)) {
            print_r("Correct!\n");
        } else {
            print_r("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.\n");
            print_r("Let's try again, {$name}!\n");
            return;
        }
    }
}
