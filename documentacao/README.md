![Grupo Mateus](https://static.wixstatic.com/media/37f7ab_e7549c2e94e049cd8a4d8e5e433e42fd~mv2.png/v1/fill/w_284,h_72,al_c,q_85,usm_0.66_1.00_0.01/GRUPO%20MATEUS%20new.webp)

# Test ITHappens 1307 - Magento 2

## Docker Setup
* Create a docker-compose file with 3 services, 1 network and 1 volume (database)
* Custom [php-apache](https://hub.docker.com/_/php) image with [composer cli](https://hub.docker.com/_/composer) and required php extensions (bcmath gd pdo_mysql zip xsl soap intl opcache)
* [MySQL](https://hub.docker.com/_/mysql) image 
* [Adminer](https://hub.docker.com/_/adminer) image - to manage databases from web GUI

## Magento 2 download and installation
* Access ``web`` container with bash/sh command: ``docker exec -it implementacao_web_1 sh``
* [Create new project from composer](https://devdocs.magento.com/guides/v2.3/install-gde/composer.html#get-the-metapackage)

```shell
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition ./magento 
```
*(!) set public and private keys to authenticate in Magento Repo*

*(!) this step takes a while*
* Setup file [permissions](https://devdocs.magento.com/guides/v2.3/install-gde/composer.html#set-file-permissions)
```
cd /var/www/html/magento
find var generated vendor pub/static pub/media app/etc -type f -exec chmod g+w {} +
find var generated vendor pub/static pub/media app/etc -type d -exec chmod g+ws {} +
chown -R :www-data .
chmod u+x bin/magento
```
* Install magento from the [CLI](https://devdocs.magento.com/guides/v2.3/install-gde/composer.html#command-line)
```
bin/magento setup:install \
    --base-url=http://localhost \
    --db-host=database \
    --db-name=magento_database \
    --db-user=magento_user \
    --db-password=mxpTfDbaUVxQWha5ZETA \
    --admin-firstname=admin \
    --admin-lastname=admin \
    --admin-email=admin@admin.com \
    --admin-user=admin \
    --admin-password=admin123 \
    --language=pt_BR \
    --currency=BRL \
    --timezone=America/Sao_Paulo \
    --use-rewrites=1
```
* Finish installation! Now you can access your store in [http://localhost](http://localhost)

**Note: for this installation admin painel in [http://localhost//admin_w9b7ss](http://localhost//admin_w9b7ss)** 

## Sample data
* Setup sample data from [CLI](https://devdocs.magento.com/guides/v2.3/install-gde/install/sample-data-before-composer.html)
```
bin/magento sampledata:deploy
```
* On finish progress run cli command to update database and schema
```
bin/magento setup:upgrade
```

## Results

<p align="center">
  <img src="https://github.com/alissonphp/test-ithappens-1307/raw/develop/documentacao/prints/desktop.png" alt="Desktop" />
  <br>
  Desktop
</p>
<p align="center">
    <img src="https://github.com/alissonphp/test-ithappens-1307/raw/develop/documentacao/prints/mobile.png" width="400px" alt="Mobile" />
    <br>
        Mobile
</p>