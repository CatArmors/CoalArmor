<?php

namespace unnyancat\coalarmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§0Coal Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2028, 0), new ArmorTypeInfo(10, 500, 0), "coal helmet");
            $helmet->setTexture('coal_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2029, 0), new ArmorTypeInfo(10, 500, 1), "coal chestplate");
            $chestplate->setTexture('coal_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2030, 0), new ArmorTypeInfo(10, 500, 2), "coal leggings");
            $leggings->setTexture('coal_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2031, 0), new ArmorTypeInfo(10, 500, 3), "coal boots");
            $boots->setTexture('coal_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}