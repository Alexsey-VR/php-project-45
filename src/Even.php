<?php

namespace BrainGames\Even;

function Even()
{
    print_r("Welcome to the Brain Games!\nMay I have your name? ");
    $name = trim(fgets(STDIN));
    print_r("Hello, {$name}!\n");
    print_r("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    for ($i = 0; $i < 3; $i++) {
        $randValue = rand(1, 100);
        print_r("Question: {$randValue}\n");
        print_r("Your answer: ");
        $answer = trim(fgets(STDIN));
        $answer = strtolower($answer);
        $isEven = ($randValue + 1) % 2;
        $correctAnswer = $isEven ? "yes" : "no";
        if (strcmp($answer, $correctAnswer) === 0) {
            print_r("Correct!\n");
        } else {
            print_r("'{$answer}' is wrong answer ;(. ");
            print_r("Correct answer was '{$correctAnswer}'.\nLet's try again, {$name}!\n");
            return;
        }
    }
    print_r("Congratulations, {$name}!\n");
}
