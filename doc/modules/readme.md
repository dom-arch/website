# <a name="title">DOMArch website modules [BETA]</a>

A module is simply a directory for controllers and views

## <a name="controllers">Controllers :</a>

By design, a controller has a method for each accepted HTTP method (`get`, `post`, `put`, `delete`)

And it calls the related view method

## <a name="views">Views :</a>

By design, a view has a method for each controller method and compose the page content

* It calls the required assemblies
* It defines what nodes must be translated, optionally passing some dynamic params