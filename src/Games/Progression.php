<?php

namespace BrainGames\Games;

use function BrainGames\Games\answerIsTrue;
use function BrainGames\Games\makeQuestionGetAnswer;
use function BrainGames\Games\greeting;
use function cli\line;
use function BrainGames\Games\congratulations;

use const BrainGames\Games\MAX_GAME_ROUNDS;

function runProgression(): void
{
    $name = showGreeting();
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
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    congratulations($name);
}
