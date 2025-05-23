<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

const OPERATORS = ['+', '-', '*'];

function computeOperation(
    int $leftOperand,
    int $rightOperand,
    string $operator
): int {
    switch ($operator) {
        case '+':
            return ($leftOperand + $rightOperand);
        case '-':
            return ($leftOperand - $rightOperand);
        case '*':
            return ($leftOperand * $rightOperand);
        default:
            throw new \Exception("Operation '{$operator}' not permitted\n");
    }
}

function makeStep(string $operator): array
{
    $a = rand(1, 100);
    $b = rand(1, 100);
    return [
        'questionData' => "{$a} {$operator} {$b}",
        'trueResult' => (string)computeOperation($a, $b, $operator)
    ];
}

function runCalc(): void
{
    $description = "What is the result of the expression?";
    $flowSteps = [];
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];
    try {
        for ($i = 0; $i < GAMES_COUNT; $i++) {
            $step = makeStep(OPERATORS[$i]);
            $flowSteps['questionData'][] = $step['questionData'];
            $flowSteps['trueResult'][] = $step['trueResult'];
        }
    } catch (\Exception $e) {
        print_r($e->getMessage());
        return;
    }

    runGame($description, $flowSteps);
}
