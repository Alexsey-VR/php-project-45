<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

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

function runCalc(): void
{
    $description = "What is the result of the expression?";
    $flowSteps = [];
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];
    try {
        $collection = ['+', '-', '*'];
        $flowSteps = array_map(function ($operator) {
            $a = rand(1, 100);
            $b = rand(1, 100);
            return [
                'questionData' => "{$a} {$operator} {$b}",
                'trueResult' => computeOperation($a, $b, $operator)
            ];
        }, $collection);
    } catch (\Exception $e) {
        print_r($e->getMessage());
        return;
    }

    runGame($description, $flowSteps);
}
