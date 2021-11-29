<?php

declare(strict_types=1);

namespace NhanAZ\RevivalTax;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\player\PlayerDeathEvent;
use NhanAZ\RevivalTax\libs\JackMD\UpdateNotifier\UpdateNotifier;

class Main extends PluginBase implements Listener
{

	public function onLoad() : void
	{
		UpdateNotifier::checkUpdate($this->getDescription()->getName(), $this->getDescription()->getVersion());
	}

	public function onEnable() : void
	{
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onPlayerDeath(PlayerDeathEvent $event)
	{

		$Player = $event->getPlayer();

		$TaxPercent = $this->getConfig()->get('TaxPercent');

		$Money = EconomyAPI::getInstance()->myMoney($Player);
		$HandleTax = round(($Money * $TaxPercent / 100), 1);
		if ($Money >= 1) {
			EconomyAPI::getInstance()->reduceMoney($Player->getName(), $HandleTax);

			$Search = ['{TaxMoney}', '{TaxPercent}'];
			$Replace = [$HandleTax, $TaxPercent];
			$Subject = $this->getConfig()->get('TaxNotice');

			$Player->sendMessage(str_replace($Search, $Replace, $Subject));
		}
	}
}
