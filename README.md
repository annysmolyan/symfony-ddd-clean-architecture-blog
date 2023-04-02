# Symfony Blog based on Clean Architecture and DDD

## Architecture Overview

This project follows the principles of Domain-Driven Design (DDD) and Clean Architecture to achieve a modular, maintainable, and testable codebase.


### Domain Layer

The domain layer contains the core business logic of the blog. It is responsible for defining the entities, value objects, and domain services that make up the blog's domain model. The domain layer should be independent of any specific infrastructure or framework, making it portable and reusable.

### Application Layer

It is responsible for orchestrating the domain objects and services to perform specific tasks that the blog supports. The application layer is also responsible for managing transactions and enforcing business rules.

### Infrastructure Layer

The infrastructure layer is responsible for providing the technical implementation details for the blog, such as database access, web server handling. The infrastructure layer should be decoupled from the domain and application layers to allow for flexibility and adaptability.

### Presentation Layer

The presentation layer is the entry point of the blog, responsible for handling user input and displaying output. In this project, the presentation layer is implemented using Symfony, a popular PHP web framework. The presentation layer should be thin, delegating most of the work to the application layer.


## Modules Overview


-  Category Feature API - represents API for other modules which implements category management.
Use this module as a port to the CategoryFeature implementations.

- Category Feature - This module represents Implementation of Category Feature API.

- Post Feature API - This module represents API for other modules which implements post management. Use this module as a port to the PostFeature implementations.

- Post Feature - This module represents Implementation of Post Feature API.

- Front Feature - his module represents Implementation of the blog frontend side.

- Data Manager Feature API - This module represents API for other modules which implements data management (save/delete operations). Use this module as a port to DataManagerFeature implementations. This API can be also used by other features in case of work with data storages (eg. for CRUD operations).

- DoctrineDataFeature - This module represents Implementation of Doctrine Data Feature API.



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
