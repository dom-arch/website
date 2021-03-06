<?php
namespace Lib;

use DOMArch;

class Url
    extends DOMArch\Url
{
    protected $_locale;
    protected $_format;
    protected $_canonical;
    protected $_alternates = [];

    public function setModuleName(
        string $name
    )
    {
        $this->getParams()
            ->set('moduleName', $name);

        return $this;
    }

    public function getModuleName()
    {
        return $this->getParams()
            ->get('moduleName')
        ?? Config::global()
            ->get('context')
            ->get('home')
            ->get('module');
    }

    public function setClassName(
        string $name
    )
    {
        $this->getParams()
            ->set('className', $name);

        return $this;
    }

    public function getClassName()
    {
        return $this->getParams()
            ->get('className', 'Index');
    }

    public function setMethod(
        string $name
    )
    {
        $this->getParams()
            ->set('method', $name);

        return $this;
    }

    public function getMethod(
        string $default = 'get'
    )
    {
        return $this->getParams()
            ->get('method', $default);
    }

    public function setLocale(
        string $locale
    )
    {
        $this->_locale = $locale;

        return $this;
    }

    public function getLocale()
    {
        if ($this->_locale) {
            return $this->_locale;
        }

        $locales = Config::global()
            ->get('common')
            ->get('locales')
            ->toArray();

        return reset($locales);
    }

    public function setCanonical(
        string $translation
    )
    {
        $this->_canonical = $translation;

        return $this;
    }

    public function getCanonical()
    {
        return $this->_canonical;
    }

    public function addAlternate(
        string $locale,
        string $translation
    )
    {
        $this->_alternates[$locale] = $translation;

        return $this;
    }

    /**
     * @return array
     */
    public function getAlternates()
    {
        return $this->_alternates;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->_format;
    }

    /**
     * @param $format
     * @return $this
     */
    public function setFormat(
        string $format
    )
    {
        $this->_format = $format;

        return $this;
    }
}
