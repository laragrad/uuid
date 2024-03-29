# laragrad/uuid

Package provides any functions to generate and analyze UUID with special structure.

There used special algorithm to generate UUID with next structure:

	SSSSSSSS-UUUU-UAAA-EEEE-RRRRRRRRRRRR

 - `S` - 8 hex digits is seconds value of UUID generating timestamp
 - `U` - 5 hex digits is microseconds value of UUID generating timestamp
 - `A` - 3 hex digits is custom application code
 - `E` - 4 hex digits is custom entity code
 - `R` - 12 hex digits is random value

The application code and the object code are integer values that are packed into the generated UUID. 
These codes allow you to identify (programmatically or even visually) the entity and application for which the UUID was generated.
Also, a UUID generation timestamp is packed into the UUID with an accuracy of microseconds.

## Installing

To install a package run command:

	composer require laragrad/uuid
	
## Using trait HasUuidPrimaryKey

Use trait `/Laragrad/Uuid/Models/Concerns/HasUuidPrimaryKey` in your model where required UUID primary key.

Declare public properties `$appCode` and `$entityCode` in your model to tune uuid generating.

Trait overwrites `getIncrementing()` and `getKeyType()` methods. You must not to fill properties `$incrementing` and `$keyType` in the model.

Trait registers model event handler for **creating**-event to generating UUID and filling model key. 

Example:

```php
use /Laragrad/Uuid/Models/Concerns/HasUuidPrimaryKey;

class MyModel extends Model
{
	use HasUuidPrimaryKey
	
	public $appCode = 0x002;

	public $entityCode = 0x000F;

}

```

## Helper functions

### gen_uuid()

Use gen_uuid() to generate uuid.

Syntax:

	gen_uuid( [[int $entityCode] , int $appCode] ) : string
	
Arguments:

* `$entityCode` - integer entity code (default - 0) in range from 0 to 65535
* `$appCode` - integer application code (default - 0) in range from 0 to 4095

Returning: Generated UUID as string.
	
```php
$uuid = gen_uuid(0xF,0x2);
echo $uuid; // 622235ea-8e54-f002-000f-742c8deebf77
```
	
### get_uuid_timestamp()

Extracts timestamp from uuid generated by **gen_uuid()**.

Syntax: 

	get_uuid_timestamp( string $uuid [, string $format] ) : mixed

Arguments:

* `$uuid` - analyzed UUID;
* `$format` - returning value format:
  * `Carbon` (default) \Carbon\Carbon;
  * `DateTime` \DateTime object;
  * format string to return formatted data string. Example: `'Y-m-d H:i:s.u'`

Returning: \Carbon\Carbon | \DateTime | string.

Example: 
```php
$uuid = gen_uuid(0xF,0x2);
echo get_uuid_timestamp($uuid', 'Y-m-d H:i:s.u');
// 2022-03-04 19:00:39.906514
```

### get_uuid_app_code()

Extracts application code from uuid generated by **gen_uuid()**.

Syntax: 

	get_uuid_app_code( string $uuid ) : string

Arguments:

* `$uuid` - analyzed UUID;

Example: 
```php
$uuid = gen_uuid(0xF,0x2);
echo get_uuid_app_code($uuid');
// 2
```

### get_uuid_entity_code()

Extracts entity code from uuid generated by **gen_uuid()**.

Syntax: 

	get_uuid_entity_code( string $uuid ) : string

Arguments:

* `$uuid` - analyzed UUID;

Example: 
```php
$uuid = gen_uuid(0xF,0x2);
echo get_uuid_entity_code($uuid');
// 15
```
