# Developer test

This is an interactive commandline application.
Application produces simple 2 option menu.

 `1 - [Re]Start game`
 
 `2 - Exit`

When game starts application prints all cards in deck in it's initial sequence.
Then application shuffles cards and deals to each player.
Each player takes 7 cards in 7 round. 1 card per round.
Then application player cards and again shows initial menu.

Implementation is breaching KISS principles.
I tried to make it more complex in structure and use some design patterns.


# Update dependencies
Before your run application or execute tests please update package dependencies.
`composer install`

# Run application
To run application from command line simply type `php src/Run.php`.

# Run tests
To execute tests run `vendor/bin/phpunit tests`
