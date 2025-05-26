<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

const OPERATORS = ['+', '-', '*'];

function computeOperation(
    int $leftOperand,
    int $rightOperand,
    string $operator
): int | null {
    switch ($operator) {
        case OPERATORS[0]:
            return ($leftOperand + $rightOperand);
        case OPERATORS[1]:
            return ($leftOperand - $rightOperand);
        case OPERATORS[2]:
            return ($leftOperand * $rightOperand);
        default:
            return null;
    }
}

function runCalc(): void
{
    $description = "What is the result of the expression?";
    $flowSteps = [];
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];
    $flowSteps = array_map(function ($operator) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        return [
            'questionData' => "{$a} {$operator} {$b}",
            'trueResult' => computeOperation($a, $b, $operator)
        ];
    }, OPERATORS);

    runGame($description, $flowSteps);
}
