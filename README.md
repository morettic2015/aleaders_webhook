# Mautic Unsubscribe Webhook

## ABOUT

This is Mautic Webhook to unsubscribe leads from inside campaign given some action
of interest. So you basically pass two parameters from url: email and mobile
Given this to the webhook URL it will unsubscribe leads from Mautic. DNC. 

## COMPATIBILITY

its tested with Mautic 2.15.3

## INSTALL

### 1) Open /br/com/morettic/dao/GenericDao.php and change:

    *       'database_name' => 'mautic', //Your database name
    *       'server' => 'cloud.a-leaders.com', //Your database host
    *       'username' => 'r1', //Username
    *       'password' => '***************' //Password

if you dont know your database credentials look inside mautic install file
named local.php inside /app/config

### 2) Create a folder called webhook inside mautic install
### 3) Upload files to webhook folder
### 4) Change files permissions to CHMOD  775 ./webhook -R
### 5) Change Files group to chown www-data:www-data ./webhook -R
### 6) Inside campaign call webhook url => https://yourmauticinstall.com/webhook/index.php?mobile=xxxx&email=123@mail.com
### 7) Its done now you will have a unsubscibe webhook for some mautic campaign
