<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MAX_GAME_ROUNDS;

function computeOperation(
    int $leftOperand,
    int $rightOperand,
    string $operator
): string {
    switch ($operator) {
        case '+':
            return (string)($leftOperand + $rightOperand);
        case '-':
            return (string)($leftOperand - $rightOperand);
        case '*':
            return (string)($leftOperand * $rightOperand);
        default:
            print_r("Operation '{$operator}' not permited\n");
    }
    return '';
}

function runCalc(): void
{
    $flow = [];
    $flow['description'] = "What is the result of the expression?";
    $flow['questionData'] = [];
    $flow['trueResult'] = [];
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $flow['questionData'][] = "{$a} {$operators[$i]} {$b}";
        $trueResult = computeOperation($a, $b, $operators[$i]);
        $flow['trueResult'][] = $trueResult;
    }

    runGame($flow);
}
