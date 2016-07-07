# <a name="title">DOMArch website assemblies [BETA]</a>

An assembly is a component used to manipulate the DOM nodes

Basically, there is 3 major assembly types
* [Layouts](#layouts) (the different site layouts, invoked by the `Lib\Request\Incoming`)
* [Components](#components)
* [Sections](#sections) (the different site sections)

## <a name="layouts">Layouts :</a>

A layout is an assembly invoked by the `Lib\Request\Incoming` and used to fill the `Lib\View\HTML\Page`, passed to the current module view

It defines :
* the document language, based on the request
* the alternates links
* etc.

## <a name="components">Components :</a>

The components assemblies are made to create some shortcuts, for recurrent DOM operations

The most common component is the `Assemblies\Components\Section` wich is really, easy to use :

```php
/**
 * @method Assemblies\HTML\Section::assemble
 * @param HTMLPage $page
 * @param string $name
 * @param string $parent_selector = 'body > main'
 * @param array ...$params used for dynamic <h1> translation
 * @return static
 */
$section_assembly = Assemblies\HTML\Section::assemble($page, $name);

$section = $section_assembly->getNode();
```

## <a name="sections">Sections :</a>

A `Assembly\HTML\Section::assemble($page)` creates & appends a section element to the defined/default parent element and defines the dynamic nodes

It also have a `$assembly->translate()` called to translate the section contents, once all is defined
