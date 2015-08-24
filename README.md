# MMUCRS

This is the workshop material for building a RESTful API in Laravel. Every step in the workshop is documented in this commit, so you can "rewind" and "fast-foward" through the workshop material.

# Requirements

* You should be familiar with PHP syntax, concepts and functions, e.g. arrays, classes, inheritance.
* The following software is required:
** Git (For PC: Git-Bash is recommended https://github.com/msysgit/msysgit/releases/)
** Vagrant+Virtualbox, for consistent VM environments (http://www.vagrantup.com/downloads.html) (https://www.virtualbox.org/wiki/Downloads)
** A MySQL client. For PC, HeidiSQL is recommended.

# Optional

* A Git GUI. SourceTree is recommended - needs a free Bitbucket account. (https://www.sourcetreeapp.com/)
* A code editor (duh)
* An API tool. Recommended: https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop

# Setup

* Right click on the folder where you want to start, and choose "Git Bash" from the Windows context menu. We'll be using Git Bash over the Command Prompt for this workshop.
* Install the vagrant box `vagrant box add laravel/homestead /path/to/homestead.box --name=laravel/homestead`
* Check out the repository. If you are using the local version, `git clone /path/to/mmucrs.git` (You can also type the file path into Sourcetree). You should be on the "workshop" branch - "#4 - Modify homestead file for local use"
* copy `Homestead.yaml.base` to `Homestead.yaml`
* copy `.env.example` to `.env`
* In `homestead.yaml`:
    * change the folders -> map property to point to the folder where you are hosting the project, e.g. `C:/Documents/Code/MMUCRS` (note that you use backslashes, not a forward slash)
    * In Git Bash/Terminal, generate an SSH Key: `ssh-keygen`. Use the default answers to any prompts.
    * Put the location of your public key (by default `~/.ssh/id_rsa.pub`) under the `authorize` entry.
* Modify your hosts file to point homestead.app to 192.168.10.10.: http://www.rackspace.com/knowledge_center/article/how-do-i-modify-my-hosts-file
* Execute `vagrant up` in the project folder.
* You should now be able to `vagrant ssh` in the project folder to tunnel into the virtual server!


# Notes
* You will be provided with the required and optional software, as well as the Laravel local environment VM and an offline copy of this repository.
* You will be on the "workshop" branch of the repository. You will be able to fast-forward or rewind your progress by using the "master" branch.
* Laravel usually uses Composer heavily, and the /vendor folder is usually not committed into Git, but because of the way things are set up and to make things as offline as possible, this workshop won't require Composer as the downloaded libraries will be committed in Git.
* If you hit any "class not found" errors, run `composer dump-autoload` in your project shell.

# Useful reading
* https://en.wikipedia.org/wiki/Don%27t_repeat_yourself
* http://metalpolyglot.com/guides/fat-models-and-skinny-controllers-all-about-that-bass/
* http://jwt.io/
* https://philsturgeon.uk/blog/2012/03/packages-the-way-forward-for-php/
