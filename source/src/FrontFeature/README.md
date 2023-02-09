# FrontFeature

This module represents Implementation of frontend.
 
## Overview
The feature contains the following layers:

- Presentation - contains Controllers and views. Each controller represents only one action. 
Also, here was created a template system (base theme).


Mind, that Controllers will not work until you edit this file: config/routes.yaml

````

frontend_feature_controllers:
    resource: '../src/FrontFeature/Presentation/Controller/'
    type: attribute
    trailing_slash_on_root: false

````

And also need to write paths for twig templates config/packages/twig.yaml :

````

twig:
    default_path: '%kernel.project_dir%/templates'
    paths:
        'src/FrontFeature/Presentation/view': 'frontend_feature_templates'

when@test:
    twig:
        strict_variables: true


````


## License
This extension is licensed under the GNU General Public License 3.0 (GPL-3.0)

