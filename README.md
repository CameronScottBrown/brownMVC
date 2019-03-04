# Welcome to the BrownMVC
This is a custom PHP framework using the MVC design pattern.
Created by Cameron Brown, the framework was inspired by and adapted from [Brad Traversy's](https://github.com/bradtraversy) TraversyMVC.

# How To Use

First, you'll want to download and host this project through an Apache Desktop Server such as XAMPP. Once you've got that sorted, here's how to start customizing the framework.

1. Rename the main project folder for your project (ex. 'my-project')
2. Use PHPMyAdmin (through your localhost dashboard) to create a Database (ex. 'my-db')
	- set your root password and privileges for the Database
3. Update the variables in the config file (**'../app/config/config.php**)
	- set DBNAME to 'my-db', etc.
4. Update **Line 4** in the main htaccess file (**'../.htaccess'**)
5. You can now begin customizing and creating your own components
	- check out **'../libraries/Database.php'** for example DB methods

## Notes

- Model files should be written in singular form (ex. 'Post.php')
- Controller files should be written in plural form (ex. 'Posts.php')
- More information regarding this particular framework structure can be found [here](https://www.udemy.com/object-oriented-php-mvc/)
- For presentation purposes, the header and footer files (**'../views/inc/'**) contain external links to a [Bootstrap 4 CDN](https://www.bootstrapcdn.com/) (CSS and JS files)

