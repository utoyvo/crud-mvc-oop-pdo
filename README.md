# CRUD MVC OOP PDO

A simple and intuitive CRUD system using the MVC pattern in OOP paradigm. To connect to the database using PDO.

![crud mvc oop pdo](screenshot.png)

## CONFIG

### Database

```php
$this->config['db'] = array(
	'driver'   => 'mysql',
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'name'     => 'crud-mvc-oop-pdo'
);
```

### Session

```php
$this->config['session-name'] = 'SID';
```

## DATABASE

### Posts

| Field        | Type         | Null | Key | Default           | Extra                       |
|:-------------|:-------------|:-----|:----|:------------------|:----------------------------|
| post_id      | INT(11)      | NO   | PRI | NULL              | AUTO_INCREMENT              |
| post_created | DATETIME     | NO   |     | CURRENT_TIMESTAMP |                             |
| post_updated | DATETIME     | NO   |     | CURRENT_TIMESTAMP | ON UPDATE CURRENT_TIMESTAMP |
| post_title   | VARCHAR(255) | NO   |     | NULL              |                             |
| post_author  | INT(11)      | NO   |     | NULL              |                             |
| post_content | TEXT         | NO   |     | NULL              |                             |
| post_cover   | VARCHAR(255) | NO   |     | NULL              |                             |

### Users

| Field         | Type         | Null | Key | Default           | Extra                       |
|:--------------|:-------------|:-----|:----|:------------------|:----------------------------|
| user_id       | INT(11)      | NO   | PRI | NULL              | AUTO_INCREMENT              |
| user_created  | DATETIME     | NO   |     | CURRENT_TIMESTAMP |                             |
| user_updated  | DATETIME     | NO   |     | CURRENT_TIMESTAMP | ON UPDATE CURRENT_TIMESTAMP |
| user_name     | VARCHAR(255) | NO   |     | NULL              |                             |
| user_email    | VARCHAR(255) | NO   |     | NULL              |                             |
| user_password | VARCHAR(255) | NO   |     | NULL              |                             |
| user_role     | VARCHAR(20)  | NO   |     | NULL              |                             |

## CONTRIBUTOR

Oleksandr Klochko [@utoyvo](https://github.com/utoyvo)

## LICENSE

Code released under the [MIT License](LICENSE).
