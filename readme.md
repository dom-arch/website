# <a name="title">DOMArch website [BETA]</a>

The DOMArch website context, no sessions, no cookies, no forms... only pages crawlable by search engines.

## <a name="summary">Summary</a>
* [Documentation](./doc#title)
* [Installation](#installation)
* [License](#license)

## <a name="installation">Installation :</a>

<strong>If you change the following example names, please adapt your `config.json`</strong>

* Firstly, install [DOMArch](https://github.com/dom-arch/dom-arch)
* Clone this repository into your `entrypoints` directory
   `git clone https://github.com/dom-arch/website.git website`
* Add a host, like `domain.tld`, to your `hosts` file
* Create a database like `domain-tld-website`
* Go to the `sql` directory and execute each table script
* In a shell, go to your `website` directory and exectute the following commands :
  * `composer install`
  * `php cli/setup.php`
* Go to http://domain.tld

## <a name="license">License :</a>
[This project is MIT licensed](https://github.com/dom-arch/service/blob/master/LICENSE)

Copyright © 2015 - 2016 Lcf.vs
