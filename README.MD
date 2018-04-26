This is project 1 of 3 - porting a SaaS to 3 different stacks.

This is the LAMP port and includes:
- Linux
- Apache2
- MariaDB
- PHP 7.1
- JSON Web Token (JWT) - API security
- Vue/x - Frontend javascript components
- Stripe - payment gateway

View Javascript (Mullet stack) here: https://github.com/jaketoolson/travelr-js

# Plans
- See Github Projects, https://github.com/jaketoolson/travelr/projects, to view details projects and plans.
- After MVP, I will integrate various design patterns, with scalability focus.  This will be done using git branches to compare before and after.

# Notes
### Public API ###
The API is being created to follow the JSON API v.1 spec when returning a response.
(wip) JSON Schema 06 will be used to annotate and validate a json request against an API endpoint.
(wip) JWT Authorization    

****Models:****
Since Eloquent uses magic getters, I have added @property docblocks to all models. This is because I prefer a complete API be defined for all classes.

****Entities:****
I created entities with aggregates because I prefer to keep the Eloquent ORM models to the data layers only.  
(Paused this work for now)

# Credits
- UI based off ThemeStarz Directory Listing
- Photo by Octavian Rosca
- Photo by Go Wild
- Photo by Ales Krivec
- Photo by Alberto Restifo
- Photo by Sergei Akulich
- Photo by Pablo García Saldaña
- Photo by David Marcu

Copyright (c) 2018 Jake Toolson, All rights reserved
