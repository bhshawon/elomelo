An experimentary PHP framework.

# elomelo
## Requirements
* Composer
* Apache Server
## Installation
* Clone this repository.
* Run `composer install` on terminal from project directory.
## Framework Structure
### Controllers
Ideally, Controllers should live at `App/Controllers` directory. Controllers extends `Core/Controller` class.
#### Public methods
* **view($view, $data=[])** Renders a `twig` view with given data.
* **redirect($url)** Redirects to given url.
### Models
[Eloquent](https://laravel.com/docs/5.2/eloquent) ORM is used for handling database operations. Thus models are extended from Eloquent models.
### Views
[Twig](https://github.com/twigphp/Twig) is used for rendering views.
