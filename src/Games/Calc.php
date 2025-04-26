<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\answerIsTrue;
use function BrainGames\Engine\makeQuestionGetAnswer;
use function BrainGames\Engine\greeting;
use function BRainGames\Engine\goodAnswer;
use function BrainGames\Engine\badAnswer;
use function BrainGames\Engine\congratulations;

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
