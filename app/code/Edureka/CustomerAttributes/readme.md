php bin/magento module:enable Edureka_CustomerAttributes
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush