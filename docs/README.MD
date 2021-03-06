Promathius Web Game [![Circle CI](https://circleci.com/gh/Shopify/Timber.svg?style=svg)]
=====================

Promathius is a turn-based strategy game built on PHP and MySQL. It leverages the Smarty Template Framework for separation between the view and the controller, and also includes phpBB2 for its forum.

The front-end display and rules of the game are separated from the backend game engine in an organized "data" folder. These files can be modified with minimal programming experience for customization and optimization. 

Installation
---------------
* Setup PHP/MySQL server (PHP 4.5.1+)
* Edit game/config.php to reflect your MySQL database
* Upload database.sql to your server (delete the file once uploaded)

App Structure
---------------
```
├── data
│   └── "includes" contains javascript front-end code
│   └── "ini" contains game configuration
│   └── "scripts" includes customized events using simplifed class-based language
│   └── "styles" contains all CSS stylesheets
│   └── "templates" contains all HTML files
│   └── images
│   └── "guide" contains lightweight .wik files for help feature
├── forum
│   ├── phpBB2 files
├── game
│   └── all game engine code and logic
│   └── actions
│   └── clanforums
│   └── JS and CSS minifcation and cache
│   └── template cache
│   └── game configuration cache
│   └── shared libraries
├── config.php
│   └── essential database configuration
```

Credits
---------------
* phpBB2
* Smarty Template Engine
* eWiki

License
---------------
The game is under GPL 3.0 license.
