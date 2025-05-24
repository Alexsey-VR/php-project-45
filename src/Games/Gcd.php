<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

function getInputsFromEuclidianGcd(int $a, int $b): array
{
    $minValue = min($a, $b);
    $maxValue = max($a, $b);
    $rem = $maxValue % $minValue;
    $result = [$minValue * rand(1, 5), ($maxValue + $rem) * rand(1, 5)];
    shuffle($result);

    return $result;
}

function getEuclidianGcd(int $a, int $b): int
{
    $minValue = min($a, $b);
    $maxValue = max($a, $b);
    $input = [$minValue, $maxValue];
    do {
        $result = $input[0];
        $rem = $input[1] % $input[0];
        $input = [$rem, $input[0]];
    } while ($rem !== 0);

    return $result;
}

function runGcd(): void
{
    $description = "Find the greatest common divisor of given numbers.";

    $collection = [
        getInputsFromEuclidianGcd(rand(1, 10), rand(1, 10)),
        getInputsFromEuclidianGcd(rand(1, 10), rand(1, 10)),
        getInputsFromEuclidianGcd(rand(1, 10), rand(1, 10))
    ];
    $flowSteps = array_map(function ($item) {
        return [
            'questionData' => "{$item[0]} {$item[1]}",
            'trueResult' => (string)getEuclidianGcd($item[0], $item[1])
        ];
    }, $collection);

    runGame($description, $flowSteps);
}
