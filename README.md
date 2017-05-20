## Disable Frontend
Magento 2 

#### 1 - Installation Disable Frontend

##### Manual Installation

Install Disable Frontend for Magento2
 * Download the extension
 * Unzip the file
 * Create a folder {Magento root}/app/code/Abelbm/DisableFrontend
 * Copy the content from the unzip folder


##### Using Composer

```
composer require abelbm/magneto2-disablefrontend:1.0.2
```

#### 2 - Enable Disable Frontend

 * php bin/magento module:enable Abelbm_DisableFrontend
 * php bin/magento setup:upgrade
 * php bin/magento cache:flush
 * php bin/magento setup:di:compile