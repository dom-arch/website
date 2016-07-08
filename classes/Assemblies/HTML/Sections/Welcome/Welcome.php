<?php
namespace Assemblies\HTML\Sections;

use Assemblies\HTML\Components\Section;
use DOMArch\Assembly;
use Lib\View\HTML\Page as HTMLPage;

class Welcome
    extends Assembly
{
    public static function assemble(
        HTMLPage $page
    )
    {
        $document = $page->getDocument();
        $section = Section::assemble($page, 'welcome')->getNode();

        $a = $section->select('a');

        $a->attrset->href = $document->url([
            'moduleName' => 'Login',
            'className' => 'Index'
        ]);

        return new static($section);
    }

    public function translate()
    {
        $section = $this->_node;

        $this->_translateAttr($section, 'href');

        $this->_translate($section);
    }
}