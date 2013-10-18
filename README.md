smplPDO-Based-Project
=====================

Project that integrates smplPDO Database Abstraction Class

smplPDO is a simple and light-weight PHP PDO Database Abstraction Class written to extend PHP Data Objects (PDO) with extremely useful features. Shorthand methods packed with it can reduce the amount of duplicate code and increase readability of your scripts as well as improve security and performance with automatically preparing & executing prepared statements.

With smplPDO, you can write fully functional database driven PHP apps with ZERO knowledge of SQL.

// Very simple user authentication example with smplPDO.

// init smplPDO
$db = new smplPDO( "mysql:host=localhost;dbname=database", 'dbuser', 'dbpass' );

// user posted her email and password with a form
$email = array( 'email'=>$_POST['email'] );

// Check if a user exists with the submitted email:
if( ! $db->exists( 'users', $email ) ) 
  exit('User not found!');

// If user is found, check if submitted password is correct:
else if( $db->get_var( 'users', $email, 'password' ) != md5( $_POST['pwd'] ) ) 
  exit('Wrong Password');

// User found & password is correct, so let's welcome with firstname:
echo 'Welcome, ' . $db->get_var( 'users', $email, 'firstname' );
Check out documentation for more code examples.

Main Features

Lightweight: clean, easy to understand code.
Uses PHP Data Objects (PDO) with best practises.
Automatically Creates Prepared Statements.
Easy Insert, Update, Delete Methods.
Select Rows, Columns, Variables with one-liners.
Fully Documented.
Continuous Support.
Support

Contact me if you have any questions or problems with this class. I will do my best to answer all the emails as fast as possible.

Usage

// Include class file in your script.
require('/path/to/smplPDO.php');

$db_host = 'localhost';
$db_name = 'database';
$db_user = 'db_username';
$db_pass = 'db_password';

// init the class same as PDO
$db = new smplPDO( "mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass );

// INSERT, UPDATE, DELETE with prepared statements:
$db->insert( 'table', array( 'name'=>'John Doe', 'age'=>28 ) );
$db->update( 'table', array( 'age'=>29 ), array( 'name'=>'John Doe' ) );
$db->delete( 'table', array( 'name'=>'John Doe' ) );

// SELECT all, single row, single column and single variable:
$db->get_all( 'table', array( 'age'=>22 ) );
$db->get_row( 'table', array( 'name'=>'John Doe' ) );
$db->get_col( 'table', array( 'age'=>28 ), array('name') );
$db->get_var( 'table', array( 'name'=>'John Doe' ) );

// GROUP BY, ORDER BY AND LIMIT
// set them right before any get_* call:
$db->group_by = "age"; // group rows by age field.
$db->order_by = "id DESC"; // order by id field descending.
$db->limit = "0,10"; // get 10 rows starting from 0.
$db->get_all( 'table', array( 'age'=>22 ) );

// Check if a record exists: 
if( $db->exists( 'table', array( 'name'=>'John Doe' ) ) ) echo 'Record exists!';

// Get the count of matching records:
$db->get_count( 'table', array( 'age'=>22 ) );

// See the last error catched:
echo $db->error;

// Print out all necessary properties:
$db->debug();
