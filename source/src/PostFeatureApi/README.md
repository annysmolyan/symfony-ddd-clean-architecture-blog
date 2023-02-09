# Post Feature API

This module represents API for other modules which implements post management.
Use this module as a port to the PostFeature implementations.
 
## Overview

- DTORequest - describes incoming data to the module.
- DTORequestFactory - describes factories for DTORequest
- DTOResponse - describes output of the module
- Service - describes service classes here

## Additional Info
Post Feature API can be omitted and all interfaces can be stored inside PostFeature,
but only if you want to use this feature as a separate bundle. In this case no need to keep 2 repositories:
one for API and the other for implementation.

So, it's also OK to do that:

-PostFeature

--API

----DTORequest

----DTORequestFactory

----DTOResponse

----Service

--APPLICATION

----Application layer impl

--DOMAIN

----Domain layer impl

--INFRASTRUCTURE

-----infrastructure impl here


In this blog example, Post Feature API will be used as a separate feature, we won't make any bundles here.

## License
This extension is licensed under the GNU General Public License 3.0 (GPL-3.0)

