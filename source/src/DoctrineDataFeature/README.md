# DoctrineDataFeature

This module represents Implementation of Doctrine Data Feature API.
 
## Overview
The feature contains the following layers:

- Application Layer – the middle layer between Domain and Presentation. Application layer gets 
DTO Request from Presentation Layer, makes some not specific validation, maps DTO to Domain models 
(and vice versa) and executes business logic methods.


- Domain Layer - the layer with business logic. This layer never knows anything about other layers, 
but provides them with contractors (interfaces) for a specific implementation.


- Infrastructure – the layer which works with external libs, framework classes and so on.


We don't need to have here Presentation layer, because here we work only with data storage
## License
This extension is licensed under the GNU General Public License 3.0 (GPL-3.0)

