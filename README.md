<p align="center">
<img src="https://github.com/aurko-nsu/appnap-project/blob/master/public/appnap.png" width="600">
</p>

## Steps to run the App

Follow the steps to run this app:

- Download the project file as zip from github in `\xampp\htdocs` directory of your machine. Or clone the github repository using Git Bash.
```
https://github.com/aurko-nsu/appnap-project.git
``` 
- Download composer from the [link](https://getcomposer.org/download/).
- Rename `.env.example` file to `.env` in the project folder.
- Run the command promt in the project directory.
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan serve`
- Go to `http://localhost:8000/`

And the app will run.
