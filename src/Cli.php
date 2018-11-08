<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    line('');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');

    return $name;
}

function game($logicGame, $question)
{
    $name = run();

    for ($i = 0; $i < 3; $i++) {
        $questionCalculate = array_map(function ($item) {
            if (is_callable($item)) {
                return $item();
            }

            return $item;
        }, $question);


        $questionStr   = implode(' ', $questionCalculate);
        $checkedNumber = eval("return {$questionStr};");
        line("Question: {$questionStr}");

        $userAnswer = prompt('Your answer');
        line("Your answer: %s!", $userAnswer);

        $result = $logicGame($userAnswer, $checkedNumber);

        if (array_key_exists('right', $result) && $result['right'] === true) {
            line("Correct!");
        } elseif (array_key_exists('right_answer', $result)) {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $userAnswer, $result['right_answer']);
            line('Let\'s try again, %s!', $name);
            return;
        } else {
            line('Error: bad request from game!');
            return;
        }
    }

    line('Congratulations, %s!', $name);
}
