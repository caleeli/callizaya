<?php

namespace Tests\Unit;

use App\Menu;
use App\User;
use Tests\TestCase;

/**
 * Application menus
 */
class MenuTest extends TestCase
{
    /**
     * Get the menu list for the user.
     *
     * @return void
     */
    public function testGetMenuesForUser()
    {
        // Create a user and a menu object
        $user = new User();
        $menu = new Menu;

        // Get the menu list for the user.
        $menus = $menu->populateChildren([], $user);

        // Assertion: Returns a valid array of menus
        $this->assertIsArray($menus);
        $this->assertGreaterThan(0, count($menus));
    }

    /**
     * Register a menu dynamically.
     *
     * @return void
     */
    public function testRegisterMenus()
    {
        // Create a user and a menu object
        $user = new User();
        $menu = new Menu;

        // Register a callback to add a menu item
        Menu::registerChildren(null, function ($menus, $user) {
            $menus[] = [
                'id' => 'unique',
                'parent' => null,
                'icon' => 'fa fa-icon',
                'name' => 'Menu name',
                'action' => 'this.startProcess(processUrl, startEventId)',
            ];
            return $menus;
        });

        // Get the menu list for the user.
        $menus = $menu->populateChildren([], $user);

        // Assertion: The menu list contains the registered menu
        $this->assertIsArray($menus);
        $this->assertContains([
            'id' => 'unique',
            'parent' => null,
            'icon' => 'fa fa-icon',
            'name' => 'Menu name',
            'action' => 'this.startProcess(processUrl, startEventId)',
        ], $menus);
    }
}
