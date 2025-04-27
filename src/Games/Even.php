<?php

namespace BrainGames\Games;

use function BrainGames\Games\answerIsTrue;
use function BrainGames\Games\makeQuestionGetAnswer;
use function BrainGames\Games\greeting;
use function cli\line;
use function BrainGames\Games\congratulations;

use const BrainGames\Games\MAX_GAME_ROUNDS;

function runEven(): void
{
    $name = showGreeting();

    print_r("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $randValue = (string)rand(1, 100);
        $answer = makeQuestionGetAnswer($randValue);
        $isEven = ($randValue + 1) % 2;
        $result = ($isEven !== 0) ? "yes" : "no";
        if (answerIsTrue($result, $answer)) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    congratulations($name);
}
