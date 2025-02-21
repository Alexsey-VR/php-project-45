<?php

namespace BrainGames\Calc;

function MakeQuestion($leftOperand, $rightOperand, $operator): string
{
    print_r("Question: {$leftOperand} {$operator} {$rightOperand}\n");
    print_r("Your answer: ");
    $answer = trim(fgets(STDIN));

    return $answer;
}

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

function AnswerIsTrue($trueResult, $userResult): bool
{
    if (strcmp($trueResult, $userResult) === 0) {
        return true;
    } else {
        return false;
    }
}
