<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

const MAX_VALUE_IN_RANGE_FACTOR = 10;

function makeStep(): array
{
    $initValue = rand(1, 20);
    $stepValue = rand(1, 5);
    $range = range($initValue, $initValue + MAX_VALUE_IN_RANGE_FACTOR * $stepValue, $stepValue);
    $gapValue = rand(0, 9);
    $trueResult = $range[$gapValue];
    $range[$gapValue] = "..";

    return [
        'questionData' => implode(" ", $range),
        'trueResult' => (string)$trueResult
    ];
}

function runProgression(): void
{
    $description = "What number is missing in the progression?";
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
