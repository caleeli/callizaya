<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    private static $childrenCallbacks = [];

    /**
     * Populate an array with child menues
     *
     * @param array $menus
     *
     * @return array
     */
    public function populateChildren(array $menus, User $user)
    {
        $key = $this->getKey();
        if (isset(self::$childrenCallbacks[$key])) {
            foreach (self::$childrenCallbacks[$key] as $callback) {
                $menus = $callback($menus, $user);
            }
        }
        return $menus;
    }

    /**
     * Register children callback
     *
     * @param callable $callback
     *
     * @return void
     */
    public function registerMyChildren(callable $callback)
    {
        self::registerChildren($this->getKey(), $callback);
    }

    /**
     * Register children callback
     *
     * @param callable $callback
     *
     * @return void
     */
    public static function registerChildren($key, callable $callback)
    {
        self::$childrenCallbacks[$key][] = $callback;
    }
}
