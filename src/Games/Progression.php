<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

const MAX_VALUE_IN_RANGE_FACTOR = 10;

function runProgression(): void
{
    $description = "What number is missing in the progression?";
    $collection = [];
    for ($i = 0; $i < 3; $i++) {
        $collection[] = [
            'initValue' => rand(1, 20),
            'stepValue' => rand(1, 5)
        ];
    }
    $flowSteps = array_map(function ($item) {
        $range = range(
            $item['initValue'],
            $item['initValue'] + MAX_VALUE_IN_RANGE_FACTOR * $item['stepValue'],
            $item['stepValue']
        );
        $gapValue = rand(0, 9);
        $trueResult = $range[$gapValue];
        $range[$gapValue] = "..";

        return [
            'questionData' => implode(" ", $range),
            'trueResult' => (string)$trueResult
        ];
    }, $collection);

    runGame($description, $flowSteps);
}
