<?php

namespace App\Traits;

use App\Menu;

/**
 * @property \App\Menu[] $menu
 */
trait HasMenus
{
    /**
     * User static menues
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_role', 'role', 'role');
    }

    /**
     * Return all the menues loaded
     *
     * @return array
     */
    public function allMenus()
    {
        return $this->roleObject->menus;
        $menu = new Menu();
        $all = $menu->populateChildren([], $this);
        foreach($this->menus as $menu) {
            $all[] = [
                'id' => $menu->id,
                'parent' => $menu->parent_id,
                'name' => $menu->name,
            ];
            $all = $menu->populateChildren($all, $this);
        }
        return $all;
    }
}
