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

## <a name="playing-with-the-elements">Playing with the elements :</a>

Here, you can only find the DOMArch extras doc on nodes, for a detailled documentation, please check the [PHPDOM tutorials](https://github.com/dom-arch/php-dom/tutorials#title)

## <a name="add-a-website-url-to-a-node">Add a website url to a node :</a>

```php
$document = $page->getDocument();

$a = $document->create([
    'tag' => 'a',
    'data' => 'Click here',
    'attributes' => [
        'href' => $document->url([
            'moduleName' => 'Module',
            'className' => 'Index'
        ])
    ],
]);
```

## <a name="add-an-app-url-to-a-node">Add an app url to a node :</a>

```php
$document = $page->getDocument();

$a = $document->create([
    'tag' => 'a',
    'data' => 'Click here',
    'attributes' => [
        'href' => $document->appUrl([
            'moduleName' => 'Login',
            'className' => 'Index'
        ])
    ],
]);
```

## <a name="translations">Translations :</a>

### <a name="how-it-works">How it works :</a>

When you ask the system to translate something, it gets the current value (element or attribute) and consider it as a translation format.

When the document is printed, the system retrieve only all needed translations, on the fly, by a single db request and makes the required changes on the document.

If the format is not found in the db, the system adds it automatically, and returns the format as default translation, until your really translate the db record, and mark it as `isTranslated = false`

Additionally, it tags the element (or it's parent) with a class `untranslated`, useful to highlight it in your view

### <a name="translate-a-specific-node">Translate a specific node :</a>

```php
// with a node content like :
// print-value-content %1$s : %2$s
// and sprintf ordered translation format (in the Translations table) like :
// 'the dynamic value equals to "%1$s", defined in %2$s'
// $node->translate(...$sprintf_params);

$node->translate('value', __FILE__); // prints : 'the dynamic value equals to "value", defined in filename'
```

### <a name="translate-a-specific-node-attribute">Translate a specific node attribute :</a>

```php
// with a node content like :
// print-value-content %1$s : %2$s
// and sprintf ordered translation format (in the Translations table) like :
// 'the dynamic value equals to "%1$s", defined in %2$s'
// $node->translateAttr($attr_name, ...$sprintf_params);

$node->translateAttr('title'); // prints an element.title 'the dynamic value equals to "value", defined in filename'
```

### <a name="translate-all-untranslated-assembly-nodes">Translate all untranslated assembly nodes :</a>

```php
$assembly->_translate($node);
```

### <a name="translate-all-untranslated-assembly-nodes">Translate all untranslated assembly nodes specific attribute :</a>

```php
$assembly->_translateAttr($node, $attr_name[, $value]);
```
