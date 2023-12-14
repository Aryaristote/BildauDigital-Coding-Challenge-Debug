# Debug Challenge

Check out the following files and fix them to fulfill their purposes:

1. `cli\alphabet.php`
2. `cli\filter_array.php`
3. `cli\link.php`
4. `cli\random_name`

## Web + Database debugging

We are using the following database:

![DB Diagram](diagram.png)

<!--
https://dbdiagram.io/

Table users {
  id int [pk,increment]
  username varchar
  password varchar
}
Table questions {
  id int [pk, increment] // auto-increment
  owner_id int
  topic varchar
  content varchar
}
Ref: questions.owner_id > users.id

-->

The two PHP scripts (`web\login.php` and `web\action_delete.php`) have potential issues.

Find and fix as many as possible.

<!-- ------------------------------------------------------------------------------- -->
<!-- Corrected codes:  -->

<!-- Validated if 'id' is set in the POST request. -->
<!-- Used prepared statements to prevent SQL injection. -->
<!-- Checked the result of the mysqli_prepare, mysqli_stmt_bind_param, and mysqli_stmt_execute functions for errors. -->
<!-- Closed the prepared statement and database connection after use. -->
<!-- Provided placeholders for database credentials ($database_host, $database_user, $database_password, $database_name). Replace these with your actual database credentials.
