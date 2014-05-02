---
Title:    Installing SQLite
Topics:   installation, SQLite
Code:     -
Id:       119
Position: 14
---

{problem}
You'd like to use SQLite, but PHP isn't configured for it.
{/problem}

{solution}
Install the PHP Driver for SQLite.

{bash}
$ sudo apt-get install -y php5-sqlite
{/bash}

Then restart apache.

{bash}
$ sudo service apache2 restart
{/bash}
{/solution}

{discussion}
SQLite requires no server.

It is a self-contained SQL database engine. Most often SQLite is used for testing, but it can be useful for small applications.

See also [[Setting up the SQLite Database Driver]].
{/discussion}
