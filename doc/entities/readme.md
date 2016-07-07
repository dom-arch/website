# <a name="title">DOMArch website entities [BETA]</a>

The website entities are very limited and, normally, you never need to change them, except to add/remove some locales

Actually, you have only 2 types : `Routes` and `Translations`, used to automatically translate your nodes and urls

## <a name="add-or-remove-locales">Add or remove locales :</a>

* Edit the `locales` field in your `config.json` (the first is the default locale)
* Remove the current entities
* In a shell, go to your `website` directory and execute :
  * `php cli/map-entities.php`
  * `php cli/generate-methods.php`

To create some routes and translations, please read [HTML pages](./lib/view/html/pages#title)