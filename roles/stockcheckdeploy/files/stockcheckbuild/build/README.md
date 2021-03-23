### Stockcheck v2.0

* Stockcheck is a platform that offers aggregated in-stock inventory from 
various suppliers
* Version 2.0
* www.stockcheck.com

> Please, *gently*, follow all the steps outlined below.
Read everything line by line, do not assume you know what is there 
because the line might have changed since your last pull!

### CREATE NETWORK
Create the initial network that the docker containers will work with

```
docker network ls | grep voxdocnet > /dev/null || docker network create \
  --ipam-driver=default --gateway=172.30.0.1 --attachable=true \
  --driver=bridge --subnet=172.30.0.0/16 voxdocnet
```

To check for the status of the docker network at any point in time:
> docker network inspect voxdocnet

For more information: http://manpages.ubuntu.com/manpages/bionic/man1/docker-network-create.1.html

### DB SETUP
Do ensure that your DB at https://github.com/vox-technologies/vox-mariadb 
is fully set up on your PC before you proceed.

### VARIABLES
The file `.env-example` contains all the dynamic variables.
Create yours as `cp .env-example .env` and alter your variables to taste.

See the IP address of the DB container:
> docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' vox-mariadb

Learn more about the DB container
> docker inspect vox-mariadb

Note
> You will have to alter your DB settings inside .env with the details you set at the `DB SETUP` section

### DOCKER INITIALIZATION GUIDELINE
* Create this directories by running `mkdir -p backend/web/assets backend/runtime backend/config`
* Run `docker-compose up --build -d` to build and run the containers.
* Run `docker exec -it vox-stockcheck sh initialize.sh`
* Run `docker exec -it vox-stockcheck mv vendor/bower-asset vendor/bower`

### GRANT stockcheck USER access to MARIADB
```
echo "GRANT ALL ON stockcheck.* TO stockcheck@'%' \
  IDENTIFIED BY 'passw0rd'; FLUSH PRIVILEGES" | \
  docker exec -i vox-mariadb bash -c 'exec mysql -uroot -ppassw0rd'
```

### USEFUL DOCKER COMMANDS
* See logs
> docker-compose logs --timestamps --follow
* Specific container log, e.g. vox-stockcheck (you can change it to taste)
> docker logs vox-stockcheck --timestamps --follow
* Formatted display
> docker ps -a --format "\nID\t{{.ID}}\nIMAGE\t{{.Image}}\nCOMMAND\t{{.Command}}\nCREATED\t{{.RunningFor}}\nSTATUS\t\
{{.Status}}\nPORTS\t{{.Ports}}\nNAMES\t{{.Names}}\n"
* Stop running containers (you have to be in the project DB_USER folder)
> docker-compose stop
* See the DB logs
> docker logs vox-mariadb --timestamps --follow

### RUNNING MIGRATION
* Run `docker exec -it vox-stockcheck php yii migrate`

### TEST SUPERVISOR
> docker exec -it vox-stockcheck exec /usr/bin/supervisord -c /etc/supervisord.conf

### ADDITIONS TO COMPOSER FILE
* Add the necessary information into the composer.json file
* Run `docker exec -it vox-stockcheck mv vendor/bower vendor/bower-asset`
* Run `docker exec -it vox-stockcheck composer update`
* Run `docker exec -it vox-stockcheck mv vendor/bower-asset vendor/bower`


### SETTING UP USER ROLES
* Run this  
> `INSERT INTO sc_auth_assignment (item_name, user_id, created_at) VALUES (ROLETYPE, USERID, '1551896527'); | docker exec -i vox-mariadb bash -c 'exec mysql -uDBUSER -pDBPASSWORD'`
Or you can run the command below in the adminer UI
> INSERT INTO sc_auth_assignment (item_name, user_id, created_at) VALUES (ROLETYPE, USERID, '1551896527');

Note: You need to replace the ROLETYPE and USERID with your role type and user id.


### Contribution guidelines
* Code review
* Other guidelines

### Support Channels
* support@voxtechnologies.com
* https://support.voxtechnologies.com
