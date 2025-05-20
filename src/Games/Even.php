<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

function runEven(): void
{
    $description = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $flowSteps = [];
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];

    for ($i = 0; $i < GAMES_COUNT; $i++) {
        $randValue = (string)rand(1, 100);
        $isEven = ($randValue + 1) % 2;
        $trueResult = ($isEven !== 0) ? "yes" : "no";
        $flowSteps['questionData'][] = $randValue;
        $flowSteps['trueResult'][] = $trueResult;
    }

    runGame($description, $flowSteps);
}
