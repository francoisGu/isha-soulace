# Isha SoulAce

This is the markdown cheatsheet which is useful when you want to edit
markdown file.

[markdown cheatsheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)

## Description of this project
This project is a website for proof-of-concept that aims the support victims of domestic violence.

## Instructions

1. This instruction will help you to check out the repository on bitbucket to
your local machine.

2. Instruct you how to commit your changes of code to bitbucket.

### Check out repository into your local machine

( Make sure **git** is already installed )

* [git for Windows](http://msysgit.github.io)

* [git for MacOS](http://sourceforge.net/projects/git-osx-installer/)

+ Using "cd" to navigate to the folder where you want to place your
repository

+ Then, copy and paste the commands below into your terminal or shell


![alt text](https://bitbucket.org/litao_shen/swen30007_group9/raw/d90135153ea8f5cf40c187dfb666560c97632ead/clone_repo.png
"clone repo instructions")

** git clone
https://[username]@bitbucket.org/[username]/swen90014-relationship-project.git **


### Add, commit and push files that you change onto git

```
* git add "file"

* git commit -m "log message"

* git push -u origin master
```

further information about how to Clone Your Git Repo and Add Source Files.
[click
here](https://confluence.atlassian.com/display/BITBUCKET/Clone+Your+Git+Repo+and+Add+Source+Files)

### Fork a Repo, Compare code, and Create a Pull Request

you can use command below to update your repo up-to-date

```
* git pull https://[username]@bitbucket.org/[username]/swen30007_group9 master
* or, git pull 
```

### Create tags

```
* To list all tags created using command: git tag -l

* To show information in tag using: git tag show tag-name

* To create annotated tag: git tag -a tag-name -m 'messages'

* After tags been created you need to push it onto repo by：
                git push origin --tags
```
[for more information about tag, click here](http://git-scm.com/book/en/Git-Basics-Tagging)
                
### Running test file

###Installing the project
You will need to install composer to manage dependencies for the project.
```
 https://getcomposer.org/doc/00-intro.md
```
Follow the installation instruction in the above link for your OS environment.

Once you have composer installed, run "composer update" in the directory you have stored the project.

Set up your database connection in "app/config/database.php".

Run "php artisan migrate" to migrate the database tables.

Run "php artisan serve" to deploy the website.

This project uses the Laravel Framework and MySQL.

You may find further help at:
```
http://laravel.com/
```