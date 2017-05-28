# Robots

Simple robot simulation


## Running

`php robots.php`

or

`php robots.php -file=testfile.txt`


### Dependencies

PHP 7.0
PHPUnit 6.1 


## Running the tests

To run all tests use `vendor/bin/phpunit`


## Assumptions and Design Decisions

I tried to limit the amount of a assumptions made and designed for maximum flexibility. 
I wanted to show my understanding of DRY coding principles. I designed the app based off the assumption that the requirements for the robot's functionality would change in the future. eg: making it so the robot could move diagonally. Additionally I made sure that parsing commands and extending the command set is simple and self documenting. I also wanted to make sure that command parsing and the robot was as loosely coupled as possible. The command system could be used for anything at this point. 

Output could easily be improved with some kind of logging system. Additionally, the use of IoC could drastically improve the project and tests in this regard. 

I wrote the board to be flexible and to ensure that it could be expanded later on. Initially I was going to have the board keep track (or manage) the objects on it as to allow for multiple objects and to be able to avoid collisions with those objects in the future. However, I decided not to since it was a more straight forward design to have the robot simply manage which board it was on. 


