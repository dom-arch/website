# <a name="title">DOMArch website request incoming [BETA]</a>

A class that handles the client request

## <a name="useful-methods">Useful methods</a>

### Get the original request

`Request\Incoming::requested()`

### Get the current request

(may be different to the requested, by forwards, for example, after the route parsing)

`Request\Incoming::current()`

### Get the previous request

`$request->getPrevious()`

### Get the request headers

`$request->getHeaders()`

### Add a response header

`$request->getResponse()->getHeaders()->set('name', 'value')`

### Get the url

`$request->getUrl()`

### Redirect

(if no url specified, it sends the status code and simply exit)

`$request->redirect(int $status_code, Url $url = null)`

### Forward

(internal redirection, changes the current request)

`$request->forward(Url $url, string $method = 'get')`

### Get the url

`$request->getUrl()`

### Display the custom 404 error page

`$request->notFound()`

### Display the custom 500 error page

`$request->internalError()`

### Display the maintenance page

`$request->serviceUnavailable()`

### Display the dump page and dump a value

`$request->dump($value = null)`