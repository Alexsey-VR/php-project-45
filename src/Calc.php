<?php

namespace BrainGames\Calc;

use BrainGames\Calc\AnswerIsTrue;
use BrainGames\Calc\Calc;

function Calc()
{
    print_r("Welcome to the Brain Games!\n");
    print_r("May I have your name? ");
    $name = trim(fgets(STDIN));
    print_r("Hello, {$name}\n");

    print_r("What is the result of the expression?\n");
    $operators = ['+', '-', '*'];
    foreach ($operators as $operator) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $answer = MakeQuestion($a, $b, $operator);
        $result = ComputeOperation($a, $b, $operator);
        if (AnswerIsTrue($result, $answer)) {
            print_r("Correct!\n");
        } else {
            print_r("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.\n");
            print_r("Let's try again, {$name}!\n");
            return;
        }
    }
}
