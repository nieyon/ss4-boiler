# Silverstripe 4.3.3 Boilerplate

Front-End Developers Silverstripe Template

### How to install Silverstripe 4.3.3 boiler

- go to ```/var/www/html```
- create your project and type 
  ```composer create-project silverstripe/installer <project-name> 4.3.3```
- go to your project
- type ```sudo chown -R [laptop-name]:www-data .```
- type ```sudo chmod -R 775 .```
- go to URL ```localhost/<project-name>/public``` then set up and install
- go to .env and add
```
SS_DEFAULT_ADMIN_USERNAME='admin'
SS_DEFAULT_ADMIN_PASSWORD='admin'
SS_ENVIRONMENT_TYPE='dev'
```
- type ```git init```
- type ```git remote add boiler git@github.com:nieyon/ss4-boiler.git```
- type ```git pull boiler master```
- type ```composer update```
- type ```npm install```