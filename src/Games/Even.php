<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

function makeStep(): array
{
    $randValue = rand(1, 100);
    $isEven = ($randValue + 1) % 2;
    return [
        'questionData' => (string)$randValue,
        'trueResult' => $trueResult = ($isEven !== 0) ? "yes" : "no"
    ];
}

function runEven(): void
{
    $description = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
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
