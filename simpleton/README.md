# simple-framework

This is a dummy framework I started writing and playing with a long time age. It's a mess, incomplete and newbie-level; but I've decided to push it to GitHub, clean it up a little and keep it for historical purpose.

Don't even think about using it for serious purposes. You've been warned.

## How to run

First do a `composer install` and then:

```bash
composer run-script serve
```

## Code Structure

Project files are organized into following

* **controllers**: Contains the controllers
* **layout**: It's a possible target for refactoring (ignore it for now)
* **lib**: Contains the framework code and project wide libraries
* **models**: Contains the models
* **public**: Contains the index.php and static assets (*.js, *.css etc)
* **vendor**: Composer packages are located here
* **views**: Views are placed here
