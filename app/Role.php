<?php

namespace App;

class Role extends Model
{
    protected $attributes = [
        'status' => 'ACTIVE',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role', 'role');
    }

    public function menus()
    {
        return $this->hasManyThrough(Menu::class, MenuRole::class, 'role', 'id', 'role', 'menu_id');
    }

    public function createMenu(array $data)
    {
        $menu = Menu::create($data);
        MenuRole::create([
            'role' => $this->role,
            'menu_id' => $menu->getKey(),
        ]);
    }
}

