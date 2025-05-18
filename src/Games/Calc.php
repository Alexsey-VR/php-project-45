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
    $flowSteps = [];
    $flowSteps['description'] = "What is the result of the expression?";
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];
    $operators = ['+', '-', '*'];
    try {
        for ($i = 0; $i < GAMES_COUNT; $i++) {
            $a = rand(1, 100);
            $b = rand(1, 100);
            $flowSteps['questionData'][] = "{$a} {$operators[$i]} {$b}";
            $trueResult = computeOperation($a, $b, $operators[$i]);
            $flowSteps['trueResult'][] = (string)$trueResult;
        }
    } catch (\Exception $e) {
        print_r('Error in file ' . $e->getFile() . ' on line ' . $e->getLine() . ' : ' . $e->getMessage());
        return;
    }

    runGame($flowSteps);
}
