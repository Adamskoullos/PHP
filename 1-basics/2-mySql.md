# MySql Basics

- **Login**: `sudo mysql -u userName -p`
- **Logout**: `quit`
- **Create Database**: `create database mytodo;`
- **Delete Database**: ``
- **Create Table**: `create table todos (id integer PRIMARY KEY AUTO_INCREMENT, description text NOT NULL, completed boolean NOT NULL);`
- **Delete Table**: `drop table todos;`
- **Use Database**: `use mytodo;`
- **Show all Database**: `show databases;`
- **Show Tables**: `show tables;`
- **Show specific table details**: `describe todos;`
- **Add item to database**: `insert into todos(description, completed) values('Buy some eggs', false);`
- **Select items in database**: `select * from todos;`

```sql
mysql> select * from todos;
+----+---------------+-----------+
| id | description   | completed |
+----+---------------+-----------+
|  1 | Buy some eggs |         0 |
+----+---------------+-----------+
```

Specific querries can be done to drill into and select data:

```sql

select * from todos where completed = 1;

```

## Pattern to create a table

The below pattern has three arguments the first being the `id` which is a integer, unique and automatically incremented and assigned to each new row/item added to the todo list:

`create table todos (id integer PRIMARY KEY AUTO_INCREMENT, description text NOT NULL, completed boolean NOT NULL);`

```sql
mysql> describe todos;
+-------------+------------+------+-----+---------+----------------+
| Field       | Type       | Null | Key | Default | Extra          |
+-------------+------------+------+-----+---------+----------------+
| id          | int        | NO   | PRI | NULL    | auto_increment |
| description | text       | NO   |     | NULL    |                |
| completed   | tinyint(1) | NO   |     | NULL    |                |
+-------------+------------+------+-----+---------+----------------+
```

```sql
mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| mytodo             |
| performance_schema |
| sys                |
```
