<?php

namespace Model;

/**
 * Class Model
 *
 * @package Model
 * @param int    $id
 * @param string $updated_at
 * @param string $created_at
 */
class Model extends \Model
{
    private $_populated = array();

    /**
     * @param string|null $connection
     * @return \ORM|\ORMWrapper|static|Model
     */
    public static function dispense($connection = null)
    {
        return self::factory(self::model(), $connection);
    }

    /**
     * Model type
     *
     * @return string
     */
    public static function model()
    {
        return substr(get_called_class(), strlen(__NAMESPACE__) + 1);
    }

    /**
     * Get model type dynamic
     *
     * @return string
     */
    public function type()
    {
        return self::model();
    }

    /**
     * Override to get function
     *
     * @param string $property
     * @return null|string|void
     */
    public function __get($property)
    {
        $value = parent::__get($property);

        if ($value === null) {
            if (!$this->_populated[$property] && method_exists($this, $property)) {
                $this->_populated[$property] = $this->$property();
            }
            return $this->_populated[$property];
        }

        return $value;
    }

    /**
     * Override save and update time
     *
     * @return
     */
    public function save()
    {
        if ($this->is_new()) {
            $this->created_at = time();
        } else {
            $this->updated_at = time();
        }

        return parent::save();
    }

}