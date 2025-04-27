<?php

namespace BrainGames\Games;

use function BrainGames\Engine\answerIsTrue;
use function BrainGames\Engine\makeQuestionGetAnswer;
use function BrainGames\Engine\greeting;
use function BRainGames\Engine\goodAnswer;
use function BrainGames\Engine\badAnswer;
use function BrainGames\Engine\congratulations;

use const BrainGames\Engine\MAX_GAME_ROUNDS;

function getInputsFromEuclidianGcd(int $a, int $b): array
{
    $input = [$a, $b];
    sort($input);
    $rem = $input[1] % $input[0];
    $result = [$input[0] * rand(1, 5), ($input[1] + $rem) * rand(1, 5)];
    shuffle($result);
    return $result;
}

function getEuclidianGcd(int $a, int $b): int
{
    $input = [$a, $b];
    sort($input);
    do {
        $result = $input[0];
        $rem = $input[1] % $input[0];
        $input = [$rem, $input[0]];
    } while ($rem !== 0);

    return $result;
}

function runGcd(): void
{
    $name = greeting();
    print_r("Find the greatest common divisor of given numbers.\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $inputs = getInputsFromEuclidianGcd(rand(1, 10), rand(1, 10));
        $question = "{$inputs[0]} {$inputs[1]}";
        $answer = makeQuestionGetAnswer($question);
        $result = getEuclidianGcd($inputs[0], $inputs[1]);
        if (answerIsTrue((string)$result, $answer)) {
            goodAnswer();
        } else {
            badAnswer((string)$result, $answer, $name);
            return;
        }
    }
    congratulations($name);
}
