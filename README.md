# Symfony Blog based on Clean Architecture and DDD

## Docker Requirements
   - docker **(20.10.7)**
   - docker-compose **(1.29.2)**
       
## Build project

Clone this repository, open root repository folder and run:
          make init
Please, make sure you have correct access rights.

After "make" job, add line for /etc/hosts

```
   sudo gedit /etc/hosts
```

add at the end of the file this line:

```
   127.0.0.1       blog-example.local
```

now open in browser

```
	http://blog-example.local:105
```

Or use your custom port from docker-compose file for web-server-blog-example image.


## Connect to DB

Don't forget to connect the blog to the DB eg:

```
	DATABASE_URL="mysql://dev:dev@mysql-server-blog-example/blog_example"
```


after, please run migration by:


```
	php bin/console  doctrine:migrations:migrate                
```
