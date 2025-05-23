<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

function runEven(): void
{
    $description = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $collection = [rand(1, 100), rand(1, 100), rand(1, 100)];
    $flowSteps = array_map(function ($item) {
        $isNotEven = $item % 2;
        return [
            'questionData' => (string)$item,
            'trueResult' => ($isNotEven === 0) ? "yes" : "no"
        ];
    }, $collection);

    runGame($description, $flowSteps);
}
