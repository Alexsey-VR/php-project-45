<?php

namespace BrainGames\Games;

function getInputsFromEuclidianGcd($a, $b): array
{
    $input = [$a, $b];
    sort($input);
    $rem = $input[1] % $input[0];
    $result = [$input[0] * rand(1, 5), ($input[1] + $rem) * rand(1, 5)];
    shuffle($result);
    return $result;
}

function getEuclidianGcd($a, $b): int
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

function Gcd()
{
    $name = Greeting();
    print_r("Find the greatest common divisor of given nubers.\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $inputs = getInputsFromEuclidianGcd(rand(1, 10), rand(1, 10));
        $question = "{$inputs[0]} {$inputs[1]}";
        $answer = makeQuestionGetAnswer($question);
        $result = getEuclidianGcd($inputs[0], $inputs[1]);
        if (answerIsTrue($result, $answer)) {
            GoodAnswer();
        } else {
            BadAnswer($result, $answer, $name);
            return;
        }
    }
    Congratulations($name);
}
