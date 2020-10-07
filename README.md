# laragrad/uuid

## Description

Package provides any functions to generate and analyze UUID.

### Structure of generated UUID

There used custom algorithm to generate UUID with next structure:

	SSSSSSSS-UUUU-UAAA-EEEE-RRRRRRRRRRRR

 - `S` - 8 hex digits is seconds value of UUID generating timestamp
 - `U` - 5 hex digits is microseconds value of UUID generating timestamp
 - `A` - 3 hex digits is custom application code
 - `E` - 4 hex digits is custom entity code
 - `R` - 12 hex digits is random value

