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
