<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MAX_GAME_ROUNDS;

function runProgression(): void
{
    $flowSteps = [];
    $flowSteps['description'] = "What number is missing in the progression?";
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $initValue = rand(1, 20);
        $stepValue = rand(1, 5);
        $range = range($initValue, $initValue + 10 * $stepValue, $stepValue);
        $gapValue = rand(0, 9);
        $trueResult = $range[$gapValue];
        $range[$gapValue] = "..";
        $flowSteps['questionData'][] = implode(" ", $range);
        $flowSteps['trueResult'][] = $trueResult;
    }

    runGame($flowSteps);
}
