<?php


namespace Agp\UserPreferences;


use Illuminate\Support\Collection;

class Preferences
{
    private $id;
    private $title;
    private $value;
    private $options;
    /** Matriz com preferencias
     * @var Collection
     */
    private $preferencias;

    public function __construct($id, $title, $value, $items)
    {
        $this->id = $id;
        $this->title = $title;
        $this->value = $value;
        $this->preferencias = new Collection();
        $this->options = array();

        if (is_array($items)) {
            foreach ($items as $item) {
                if (array_key_exists('id', $item) && array_key_exists('title', $item) && array_key_exists('value', $item) && array_key_exists('options', $item)) {
                    $this->preferencias->add(new Preferences(
                        $item['id'],
                        $item['title'],
                        $item['value'],
                        $item['options']
                    ));
                } elseif (array_key_exists('value', $item)) {
                    $this->options[] = $item;
                }
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isActive()
    {
        return $this->value == 'true';
    }

    public function getPreferencias()
    {
        return $this->preferencias;
    }
}
