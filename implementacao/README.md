<p align="center">
  <a href="https://magento.com">
    <img src="https://static.magento.com/sites/all/themes/magento/logo.svg" width="300px" alt="Magento" />
  </a>
</p>
<p align="center">
    <br /><br />
    <a href="https://www.codetriage.com/magento/magento2">
        <img src="https://www.codetriage.com/magento/magento2/badges/users.svg" alt="Open Source Helpers" />
    </a>
    <a href="https://gitter.im/magento/magento2?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge">
        <img src="https://badges.gitter.im/Join%20Chat.svg" alt="Gitter" />
    </a>
    <a href="https://crowdin.com/project/magento-2">
        <img src="https://d322cqt584bo4o.cloudfront.net/magento-2/localized.svg" alt="Crowdin" />
    </a>
</p>

## Module
New module created to be accessed via URL and print the candidate's name together with a product chosen from the catalog
### Infos
* Module: **ItHappens\AlissonGomes**
* Location: ``www/app/code/ithappens/alissongomes``
* File structure:
```
alissongomes
-- composer.json
-- registration.php
-- README.md
-- Block
---- Test.php
-- Controller
---- Index
------ Test.php
-- etc
---- modulel.xml
---- frontend
------ routes.xml
-- view
---- frontend
------ layout
-------- alissongomes_index_test.xml
------ templates
-------- test.phtml
------ web
-------- css
---------- custom.css
```

### Result
* Get to [http://localhost/alissongomes/index/test](http://localhost/alissongomes/index/test)

### Important notes
* Env defined as DEVELOPMENT
* Sign static files turned OFF
* Cache full page, blocks and layouts turned OFF