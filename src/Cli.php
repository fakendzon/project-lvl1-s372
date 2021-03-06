<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const QUESTIONS_COUNT = 3;

function game($generateQuestionAndAnswer, $descriptionGame)
{
    welcome();
    line($descriptionGame);
    $name = askUserName();

    for ($i = 0; $i < QUESTIONS_COUNT; $i++) {
        [$question, $rightAnswer] = $generateQuestionAndAnswer();
        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        if ($rightAnswer == $userAnswer) {
            line("Correct!");
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $userAnswer, $rightAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
    }

    line('Congratulations, %s!', $name);
}

function welcome()
{
    line('Welcome to the Brain Game!');
}

function askUserName()
{
    line('');
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');

    return $name;
}
