# Coding Challenge Magento 2
This repository contains a completed coding challenge for Lime Ecommerce focusing on Magento 2 customization and module development.

## Challenge Requirements ✅

| Task | Status |
|------|--------|
| Install Magento via Composer | ✅ Completed |
| Create "Lime/Sample" module | ✅ Completed |
| Create a custom URL showing "Hello World" | ✅ Completed |
| Add homepage link in Navigation Bar on all pages | ✅ Completed |
| Avoid modifying core code | ✅ Completed |
| Change URL to magento.local | ✅ Completed |
| Install slider module | ✅ Completed |
| Disable ElasticSearch/OpenSearch | ✅ Completed |

## Environment Setup

This implementation was developed on **Ubuntu 22.04**. While other Linux distributions should work similarly, there may be minor differences in configuration.

> **Note:** Magento version 2.4.6 was used initially and later upgraded to 2.4.7 for compatibility with the product slider module.

### System Requirements

```
- PHP 8.2+
- MariaDB 10.7.x
- Composer (for dependency management)
- Nginx (as web server)
```

## Installation Instructions

### 1. Installing Magento

Run the following command to set up Magento:

```bash
cd coding-challenge/path

# Install the vendor
composer install

# Setup installation for magento
php bin/magento setup:install \
--base-url=http://magento.local/ \
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
--use-rewrites=1
```

> **Note:** ElasticSearch/OpenSearch is disabled using [Zepgram's module](https://github.com/zepgram/module-disable-search-engine)

### 2. Installing Sample Data (Optional)

```bash
php bin/magento sampledata:deploy
```

### 3. Finalizing Installation

```bash
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
```

### 4. Handling 2FA (If Needed)

If you encounter 2FA blocking admin login:

```bash
bin/magento config:set twofactorauth/general/force_providers google
```

### 5. Nginx Configuration

Create a new file at `/etc/nginx/sites-available/magento.conf` with the following content:

```nginx
upstream fastcgi_backend {
  server unix:/run/php/php8.2-fpm.sock;  # Updated to match PHP 8.2
}

server {
  listen 80;
  server_name magento.local www.magento.local;  # Updated to match project domain
  set $MAGE_ROOT /path/to/your/magento2;  # Update with your actual path
  include $MAGE_ROOT/nginx.conf.sample;
}
```

Enable the site and restart Nginx:

```bash
sudo ln -s /etc/nginx/sites-available/magento.conf /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl restart nginx
```

## Host Configuration

Add the following entry to your `/etc/hosts` file:

```
127.0.0.1 magento.local www.magento.local
```

## Project Highlights

### Custom Module Development

The `Lime/Sample` module demonstrates:
- Custom routing
- Frontend integration
- Navigation bar customization

### Custom "Hello World" URL

Created a dedicated endpoint that displays "Hello World" message.

### Navigation Bar Enhancement

Added a persistent "Home" link to the navigation bar across all pages.


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

