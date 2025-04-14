<?php

namespace BrainGames\Games;

use BrainGames\Games\answerIsTrue as answerIsTrue;
use BrainGames\Games\makeQuestionGetAnswer as makeQuestionGetAnswer;

function computeOperation($leftOperand, $rightOperand, $operator): string
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

function calc()
{
    $name = greeting();

    print_r("What is the result of the expression?\n");
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $question = "{$a} {$operators[$i]} {$b}";
        $answer = makeQuestionGetAnswer($question);
        $result = computeOperation($a, $b, $operators[$i]);
        if (answerIsTrue($result, $answer)) {
            goodAnswer();
        } else {
            badAnswer($result, $answer, $name);
            return;
        }
    }
    congratulations($name);
}
