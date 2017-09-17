# Developer test

The scenario is as follows:
-	You have a deck of 52 cards, comprised of 4 suits (hearts, clubs, spades and diamonds) each with 13 values (Ace, two, three, four, five, six, seven, eight, nine, ten, jack, queen and king).
-	There are four players waiting to play around a table.
-	The deck arrives in perfect sequence (so, ace of hearts is at the bottom, two of hearts is next, etc. all the way up to king of diamonds on the top).

The task is a simple one. Please create a simple command line program that when executed recreates the scenario above and then performs the following two actions:
-	Shuffle the cards  - We would like to take the deck that is in sequence and shuffle it so that no two cards are still in sequence.
-	Deal the cards - We would then like to deal seven cards to each player (one card to the each player, then a second card to each player, and so on)



This is an interactive commandline application.
Application produces simple 2 option menu.

Application takes a new deck of cards for a game, 
shuffles it and deals 7 cards to each player in 7 iterations.
One card to each player per iteration.

# Update dependencies
Before your run application or execute tests please update package dependencies.
`composer install`

# Run application
To run application from command line simply type `php src/Run.php`.

# Run tests
To execute tests run `vendor/bin/phpunit tests`
