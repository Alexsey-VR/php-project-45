<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_GAME_ROUNDS;

function runEven(): void
{
    $flow = [];
    $flow['description'] = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $flow['questionData'] = [];
    $flow['trueResult'] = [];

    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $randValue = (string)rand(1, 100);
        $isEven = ($randValue + 1) % 2;
        $trueResult = ($isEven !== 0) ? "yes" : "no";
        $flow['questionData'][] = $randValue;
        $flow['trueResult'][] = $trueResult;
    }

    runEngine($flow);
}
