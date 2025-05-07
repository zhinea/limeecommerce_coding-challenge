# Coding Challenge Magento 2
Coding challenge for limeecommerce test

## Goals
- [x] Installing magento via composer
- [x] create one module name "Lime/Sample" 
- [x] Create a custom URL that says "Hello World"
- [x] Add homepage link in every page in Navigation Bar
- [x] Not changing core code
- [x] Change url to magento.local
- [x] Install module slider

## Installing Magento 
When developing this, I used `Ubuntu 22.04`, there may be differences when you use a different version or os.
However, if it is still in the linux family, the difference will not be significant.

I also apologize for not using the magento 2.4.4 version due to the issues I mentioned in the private chat with Mr. Soma.

For now I am using magento version `2.4.6` during installation, and upgrading to 2.4.7 (compatibility with module product slider)

### Requirements
```
- PHP 8.2
- Mariadb 10.7.x
- Composer (to installing vendor again)
- Nginx (when you want to run it on a webserver)
```

### Setup Magento 2 back
Basically, since I only added a folder to /app, if the application is re-initiated, then there shouldn't be any changes, even though the data is different.

as long as there is dummy data or valid data that has been installed
```
php bin/magento setup:install \
--base-url=http://magento.local/ \ # Change this url based on your url
--db-host=magento \
--db-name=magento \
--db-user=magento \
--db-password=magento \
--admin-firstname=Admin \
--admin-lastname=User \
--admin-email=admin@example.com \
--admin-user=admin \
--admin-password=admin123 \
--language=en_US \
--currency=USD \
--timezone=Asia/Jakarta \
--use-rewrites=1"
# ElasticSearch/Opensearch is completely disable by using zepgram
# You can check on https://github.com/zepgram/module-disable-search-engine

# After installing setup, you can install the sampledata (optional)
php bin/magento sampledata:deploy

# After all, completely i ran this section
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f

# Warn. Usually magento is try to use 2fa when users admin loggedin.
# When you got 2fa block. use this line
sudo bin/magento config:set twofactorauth/general/force_providers google # set provider to google
```

## Proofs

### Installing via Composer
![screenshots/installing-on-composer.png](screenshots/installing-on-composer.png)

### Use Sample data
![./screenshots/use-sample-data.png](./screenshots/use-sample-data.png)

### Create a custom URL "Hello World"
![screenshots/hello-world.png](screenshots/hello-world.png)

### Use magento.local as domain
![screenshots/use-magento.local-domain.png](screenshots/use-magento.local-domain.png)

### Add "home" on Navigation Bar 
![screenshots/add-home-url-on-navigation-bar.png](screenshots/add-home-url-on-navigation-bar.png)

### Featured Homepage
![screenshots/featured-homepage.png](screenshots/featured-homepage.png)
![screenshots/featured-homepage-code.png](screenshots/featured-homepage-code.png)

