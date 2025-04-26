<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\answerIsTrue;
use function BrainGames\Engine\makeQuestionGetAnswer;
use function BrainGames\Engine\greeting;
use function BRainGames\Engine\goodAnswer;
use function BrainGames\Engine\badAnswer;
use function BrainGames\Engine\congratulations;
use const BrainGames\Engine\MAX_GAME_ROUNDS;

function runProgression(): void
{
    $name = greeting();
    print_r("What number is missing in the progression?\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $initValue = rand(1, 20);
        $stepValue = rand(1, 5);
        $range = range($initValue, $initValue + 10 * $stepValue, $stepValue);
        $gapValue = rand(0, 9);
        $result = $range[$gapValue];
        $range[$gapValue] = "..";
        $question = implode(" ", $range);
        $answer = makeQuestionGetAnswer($question);
        if (answerIsTrue((string)$result, $answer)) {
            goodAnswer();
        } else {
            badAnswer((string)$result, $answer, $name);
            return;
        }
    }
    congratulations($name);
}
