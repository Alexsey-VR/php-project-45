<?php

namespace BrainGames\Games;

function progression(): void
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
