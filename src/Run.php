<?php

// Setup autoload for our classes
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
    // If autoloader is not found print a message and exit.
    echo "Autoload file not found; try 'composer dump-autoload'." . PHP_EOL;
    exit(1);
}
require_once $autoload;


//Loop to print menu and wait for input
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
            echo "\n\n!!! Unrecognized command. Please check available options. !!!\n\n";
        }
    }
}


/**
 * Prints menu on a screen
 */
function printMenu()
{
    echo str_repeat('*', 48) . PHP_EOL;
    echo '*' . str_pad('Hi there, what would you like to do?', 46, " ", STR_PAD_BOTH) . "*\n";
    echo str_repeat('*', 48) . PHP_EOL;
    echo '*' . str_pad(' 1 - Start a new game', 46, " ", STR_PAD_RIGHT) . "*\n";
    echo '*' . str_pad(' 2 - Exit', 46, " ", STR_PAD_RIGHT) . "*\n";
    echo str_repeat('*', 48) . PHP_EOL;
    echo "Enter your choice from 1 to 2 ::";
}

/**
 * Initiates game classes and runs the game.
 */
function startGame()
{
    //Initialize game
    $game = new \Vz\Game();
    $cardDeck = new \Vz\Game\Deck();
    $croupier = new \Vz\Game\Croupier($game, $cardDeck);

    //Show new deck cards to players
    echo str_repeat('*', 48) . PHP_EOL;
    echo '*' . str_pad("New deck cards", 46, " ", STR_PAD_BOTH) . "*\n";
    echo str_repeat('*', 48) . PHP_EOL;
    $croupier->showCards();
    echo PHP_EOL . PHP_EOL . PHP_EOL;

    //Shuffle cards in a deck adn deal to a players.
    $croupier->shuffleDeck();
    $croupier->dealCards();

    //Players show cards they got
    foreach ($game->getPlayers() as $player) {
        echo str_repeat('*', 48) . PHP_EOL;
        echo '*' . str_pad("{$player->getName()} cards", 46, " ", STR_PAD_BOTH) . "*\n";
        echo str_repeat('*', 48) . PHP_EOL;
        $player->showCards();
        echo PHP_EOL . PHP_EOL;
    }


    unset($game);
    unset($cardDeck);
    unset($croupier);
}