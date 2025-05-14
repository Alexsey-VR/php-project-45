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
            throw new \Exception("Operation '{$operator}' not permitted\n");
    }
}

function runCalc(): void
{
    $flow = [];
    $flow['description'] = "What is the result of the expression?";
    $flow['questionData'] = [];
    $flow['trueResult'] = [];
    $operators = ['+', '-', '*'];
    try {
        for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
            $a = rand(1, 100);
            $b = rand(1, 100);
            $flow['questionData'][] = "{$a} {$operators[$i]} {$b}";
            $trueResult = computeOperation($a, $b, $operators[$i]);
            $flow['trueResult'][] = $trueResult;
        }
    } catch (\Exception $e) {
        print_r('Error in file ' . $e->getFile() . ' on line ' . $e->getLine() . ' : ' . $e->getMessage());
        return;
    }

    runGame($flow);
}
