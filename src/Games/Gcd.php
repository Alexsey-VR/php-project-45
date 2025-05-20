<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

function getInputsFromEuclidianGcd(int $a, int $b): array
{
    $input = [$a, $b];
    sort($input);
    $rem = $input[1] % $input[0];
    $result = [$input[0] * rand(1, 5), ($input[1] + $rem) * rand(1, 5)];
    shuffle($result);
    return $result;
}

function getEuclidianGcd(int $a, int $b): int
{
    $input = [$a, $b];
    sort($input);
    do {
        $result = $input[0];
        $rem = $input[1] % $input[0];
        $input = [$rem, $input[0]];
    } while ($rem !== 0);

    return $result;
}

function makeStep(): array
{
    $inputs = getInputsFromEuclidianGcd(rand(1, 10), rand(1, 10));
    return [
        'questionData' => "{$inputs[0]} {$inputs[1]}",
        'trueResult' => (string)getEuclidianGcd($inputs[0], $inputs[1])
    ];
}

function runGcd(): void
{
    $description = "Find the greatest common divisor of given numbers.";
    $flowSteps = [];
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];

    for ($i = 0; $i < GAMES_COUNT; $i++) {
        $step = makeStep();
        $flowSteps['questionData'][] = $step['questionData'];
        $flowSteps['trueResult'][] = $step['trueResult'];
    }
    runGame($description, $flowSteps);
}
