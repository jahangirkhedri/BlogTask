## Blog task for interview

## install

run `./install.sh`

This bash file build docker, install packages, generate key and run migration and seeders

## Login

For login to panel go to :
- [localhost/login](http://localhost/login)

### admin panel
email : admin@gmail.com

password : 123456

### author panel
email : author@gmail.com

password : 123456

# Tests
Run this command for run tests

`docker exec app php artisan test`

# Code

we have 3 module in this project
- user : for authentication
- acl : for assign role to users
- blog : for posts
