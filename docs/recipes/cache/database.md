---
Title:    Setting Up the Database Cache Driver
Topics:   configuration
Code:     Cache::decrement(), Cache::increment(), Schema::create()
Id:       38
Position: 2
---

{problem}
You want to use a cache across multiple machines.

You want to use a cache, but your web application runs on a couple different servers. The File cache driver won't work because anything cached is cached only for a single machine. _(And you don't want to use a file cache on a network share across multiple machines.)_
{/problem}

{solution}
Use the Database cache driver.

First, edit `app/config/cache.php` and change the driver.

{php}
'driver' => 'database',
{/php}

Next, you must create a database table.

{text}
$ mysql -u username -p
mysql> use mydatabase
mysql> create table cache (`key` varchar(255) not null, value text not null)
    -> expiration int not null, unique key (`key`));
mysql> exit
{/text}
{/solution}

{discussion}
This recipe assumes your database is installed and configured.

If not see [[Installing MySQL]] and
[[Setting up the MySQL Database Driver]].

You can also change the connection name and table used for caching. Laravel ships with the following configured in `app/config/cache.php`.

{php}
'connection' => null,
'table' => 'cache',
{/php}

If you had another database connection configured in `app/config/database.php` named 'mydb' and a cache table set up in the database named 'mycache', then you'd configure `app/config/cache.php` as follows.

{php}
'connection' => 'mydb',
'table' => 'mycache',
{/php}

#### Using Schema builder to build the cache table

If you want to set up the cache table using Laravel's Schema builder, here's the code.

{php}
Schema::create('cache', function($table)
{
	$table->string('key')->unique();
	$table->text('value');
	$table->integer('expiration');
});
{/php}

#### Database driver limitations

Like the File Cache driver, the database driver doesn't support Cache Sections, or the `Cache::increment()` or `Cache::decrement()` methods.
{/discussion}
