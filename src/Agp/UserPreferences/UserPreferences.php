<?php


namespace Agp\UserPreferences;


use Illuminate\Support\Collection;

class UserPreferences
{
    private $level;
    private $index;
    /**
     * @var Preferences
     */
    private $preference;

    /** Matriz com preferencias
     * @var Collection
     */
    private $preferencias;

    /**
     * UserPreferences constructor.
     * @param array $preferencias Preferencias
     */
    public function __construct($preferencias)
    {
        $this->preferencias = new Collection();
        $this->level = 0;
        $this->index = 0;
        $this->preference = null;

        $this->init($preferencias);
    }

    private function init($preferencias)
    {
        if (is_array($preferencias)) {
            foreach ($preferencias as $preferencia) {
                if (array_key_exists('id', $preferencia) && array_key_exists('title', $preferencia) && array_key_exists('value', $preferencia) && array_key_exists('options', $preferencia)) {
                    $item = new Preferences(
                        $preferencia['id'],
                        $preferencia['title'],
                        $preferencia['value'],
                        $preferencia['options']
                    );
                    $this->preferencias->add($item);
                }
            }
        }
    }

    public function getPreferencias()
    {
        return $this->preferencias;
    }

}
