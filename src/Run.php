<?php

$autoload = null;

$autoloadFiles = [
    __DIR__ . '/../vendor/autoload.php'
];

foreach ($autoloadFiles as $autoloadFile) {
    if (file_exists($autoloadFile)) {
        $autoload = $autoloadFile;
        break;
    }
}

if (!$autoload) {
    echo "Autoload file not found; try 'composer dump-autoload'." . PHP_EOL;
    exit(1);
}

require $autoload;

while (true) {
    printMenu();

    $choice = trim(fgets(STDIN));

    switch ($choice) {

        case 1: {
            startGame();
            break;
        }
        case 2: {
            exit;
            break;
        }
        default: {
            echo "\n\nPlease provide a valid choice.\n\n";
        }
    }
}

function printMenu()
{
    echo str_repeat('*', 48) . PHP_EOL;
    echo '*' . str_pad('Hi there, what would you like to do?', 46, " ", STR_PAD_BOTH) . "*\n";
    echo str_repeat('*', 48) . PHP_EOL;
    echo '*' . str_pad(' 1 - [Re]Start game', 46, " ", STR_PAD_RIGHT) . "*\n";
    echo '*' . str_pad(' 2 - Exit', 46, " ", STR_PAD_RIGHT) . "*\n";
    echo str_repeat('*', 48) . PHP_EOL;
    echo "Enter your choice from 1 to 2 ::";


}

function startGame()
{
    $game = new \Vz\Game();
    $cardDeck = new \Vz\Game\Deck();
    $croupier = new \Vz\Game\Croupier($game, $cardDeck);

    echo str_repeat('*', 48) . PHP_EOL;
    echo '*' . str_pad("New deck cards", 46, " ", STR_PAD_BOTH) . "*\n";
    echo str_repeat('*', 48) . PHP_EOL;
    $croupier->showCards();
    echo PHP_EOL . PHP_EOL . PHP_EOL;

    $croupier->shuffleDeck();

    $croupier->dealCards();
    foreach ($game->getPlayers() as $player) {
        echo str_repeat('*', 48) . PHP_EOL;
        echo '*' . str_pad("{$player->getName()} cards", 46, " ", STR_PAD_BOTH) . "*\n";
        echo str_repeat('*', 48) . PHP_EOL;
        $player->showCards();
        echo PHP_EOL . PHP_EOL;
    }
}