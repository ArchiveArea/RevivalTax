<h1>RevivalTax<img src="https://github.com/NhanAZ/RevivalTax/blob/main/images/icon.png" height="64" width="64"  align="left"></img></h1><br/>

[![](https://poggit.pmmp.io/shield.state/RevivalTax)](https://poggit.pmmp.io/p/RevivalTax)

[![](https://poggit.pmmp.io/shield.api/RevivalTax)](https://poggit.pmmp.io/p/RevivalTax)

The player will be deducted the revival tax on death. A useful plugin for RPG survival servers?

# Setup
How to setup? Very simple! Follow the steps below:
- Step 1: Download the plugin and put it in plugins`(PocketMine-MP/plugins)`
- Step 2: Start the server to load `config.yml`
- Step 3: After server startup is complete, stop the server.
- Step 4: Go to the path `PocketMine-MP/plugin_data/RevivalTax/config.yml`
- Step 5: Then edit tax percentage and tax withholding notice at `config.yml`

# Images
<img src="https://github.com/NhanAZ/RevivalTax/blob/main/images/ingame.png" />

# Config
## config.yml
```
---
# Percentage of tax amount deducted by player after revival
# The player's deducted amount is calculated using the formula below:
# (Player's Money) x TaxPercent(%) / 100 = (Player taxes are deducted when they revival)
TaxPercent: 10 #Percent(%)

# Notifications sent to players when they death
# {TaxMoney} : Server revival tax percentage
# {TaxPercent} The amount of the player's revival tax to pay
TaxNotice: "§aYou have been deducted §e${TaxMoney} §arevival tax! §f(§bTax Percent: §c{TaxPercent}%§f)§r"
...
```

# Contact
If you encounter an error or would like to contribute to my plugin, contact me via the platforms below:
- Discord: NhanAZ#9115
- Xbox: NhanAZ
- Zalo: @thanhnhanaz
- FaceBook: fb.com/thanhnhanaz

# License
[GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.html)
