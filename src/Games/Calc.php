<?php

namespace BrainGames\Games;

use BrainGames\Games\AnswerIsTrue as AnswerIsTrue;
use BrainGames\Games\MakeQuestionGetAnswer as MakeQuestionGetAnswer;

function ComputeOperation($leftOperand, $rightOperand, $operator): string
{
    switch ($operator) {
        case '+':
            return (string)($leftOperand + $rightOperand);
            break;
        case '-':
            return (string)($leftOperand - $rightOperand);
            break;
        case '*':
            return (string)($leftOperand * $rightOperand);
            break;
        default:
            print_r("Operation '{$operator}' not permited\n");
    }
    return null;
}

function Calc()
{
    $name = Greeting();

    print_r("What is the result of the expression?\n");
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $question = "{$a} {$operators[$i]} {$b}";
        $answer = MakeQuestionGetAnswer($question);
        $result = ComputeOperation($a, $b, $operators[$i]);
        if (AnswerIsTrue($result, $answer)) {
            GoodAnswer();
        } else {
            BadAnswer($result, $answer, $name);
            return;
        }
    }
    Congratulations($name);
}
