# <a name="title">DOMArch website : `Lib\Url` [BETA]</a>

An url parser/rewriter (stringifiable)

## <a name="useful-methods">Useful methods</a>

### Rewrite

```php
$new_url = $url->rewrite([
      'moduleName' => 'Module',
      'className' => 'Index',
      // ...
], 'hash)
```

### Get params

```php
$url->getParams()
```

### Get param value

```php
$url->getParams()->get('name')
```

### Set param value

```php
$url->getParams()->set('name', $value)
```

### Encrypt url

```php
$new_url = $url->encrypt($key)
```

### Decrypt url

```php
$new_url = $url->decrypt($key)
```
