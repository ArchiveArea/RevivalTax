<?php

declare(strict_types=1);

namespace NhanAZ\RevivalTax;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\player\PlayerDeathEvent;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onPlayerDeath(PlayerDeathEvent $event): void {
		$player = $event->getPlayer();
		$taxPercent = $this->getConfig()->get("taxPercent", 10);
		$money = EconomyAPI::getInstance()->myMoney($player);
		$handleTax = round(($money * $taxPercent / 100), 1);
		if ($money >= 1) {
			EconomyAPI::getInstance()->reduceMoney($player->getName(), $handleTax);
			$replacements = [
				"{taxMoney}" => $handleTax,
				"{taxPercent}" => $taxPercent,
			];
			$subject = $this->getConfig()->get("taxMessage", "§aYou have been deducted §e{taxMoney} §arevival tax! §f(§bTax Percent: §c{taxPercent}%§f)§r");
			$player->sendMessage(str_replace(array_keys($replacements), $replacements, $subject));
		}
	}
}
