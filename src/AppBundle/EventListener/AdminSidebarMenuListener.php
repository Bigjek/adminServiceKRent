<?php

namespace AppBundle\EventListener;


// ...

use Avanzu\AdminThemeBundle\Event\SidebarMenuEvent;
use Avanzu\AdminThemeBundle\Model\MenuItemModel;
use Symfony\Component\HttpFoundation\Request;

class AdminSidebarMenuListener {

    // ...

    public function onSetupMenu(SidebarMenuEvent $event) {

        $request = $event->getRequest();

        foreach ($this->getMenu($request) as $item) {
            $event->addItem($item);
        }

    }

    protected function getMenu(Request $request) {
        // Build your menu here by constructing a MenuItemModel array
        $menuItems = array(
            $content = new MenuItemModel('page', 'Контент', false, array(/* options */), 'iconclasses fa fa-file-text-o'),
            $teams = new MenuItemModel('page1', 'Команда', false, array(/* options */), 'iconclasses fa fa-file-text-o'),
            $video = new MenuItemModel('page2', 'Портфолио', false, array(/* options */), 'iconclasses fa fa-file-text-o'),
            $contacts = new MenuItemModel('page3', 'Контакты', false, array(/* options */), 'iconclasses fa fa-file-text-o')
        );

        $content->addChild(new MenuItemModel('pages', 'Страницы', 'admin_page', array()));
        $teams->addChild(new MenuItemModel('teams', 'Homosapien', 'team_page', array()));
        $contacts->addChild(new MenuItemModel('contacts', 'Страница', 'contact_page', array()));
        $video->addChild(new MenuItemModel('portfolios', 'Видео', 'portfolio_page', array()));
        
        return $this->activateByRoute($request->get('_route'), $menuItems);
    }

    protected function activateByRoute($route, $items) {

        foreach($items as $item) {
            if($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            }
            else {
                if($item->getRoute() == $route) {
                    $item->setIsActive(true);
                }
            }
        }

        return $items;
    }

}