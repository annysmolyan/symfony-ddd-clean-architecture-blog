# Category Feature

This module represents Implementation of Category Feature API.
 
## Overview
The feature contains the following layers:

- Application Layer – the middle layer between Domain and Presentation. Application layer gets 
DTO Request from Presentation Layer, makes some not specific validation, maps DTO to Domain models 
(and vice versa) and executes business logic methods.


- Domain Layer - the layer with business logic. This layer never knows anything about other layers, 
but provides them with contractors (interfaces) for a specific implementation.


- Infrastructure – the layer which works with external libs, framework classes and so on.


It's also possible to have Presentation layer here, but we will make for this blog separate Frontend Feature,
which will represent work with FE side.

But it's OK when each Feature has own presentation layer, e.g. when you build PIM system - Presentation layer
for each feature is a better solution.

## License
This extension is licensed under the GNU General Public License 3.0 (GPL-3.0)

