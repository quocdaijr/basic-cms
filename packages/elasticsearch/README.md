Elasticsearch
=============
Packages elasticsearch

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist vendor/elasticsearch "*"
```

or add

```
"vendor/elasticsearch": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \Elasticsearch\AutoloadExample::widget(); ?>```