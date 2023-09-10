# Vintage Shop

**Author:** Samuele David Bagalà

**University:** Tecnologie Web, University of Turin, Italy

## Description

Vintage Shop is a web application designed for an online store specializing in the sale of vintage items. Registered users can buy or sell vintage products using this platform.

## Development Environment Setup

To set up the development environment for this project, follow these steps:

### Prerequisites

1. **XAMPP Installation**: Download and install [XAMPP](https://www.apachefriends.org/index.html) on your system.

2. **Importing the Database**: Utilize phpMyAdmin to import the provided database. Ensure that the database connection details in the `db_connection.php` file match your configuration.

### Displaying PHP Errors

During development, displaying PHP errors can be helpful for debugging. Add the following PHP code to your file to enable error display:

```php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
```

## Compiling SCSS

The project utilizes SCSS for stylesheets, including Bootstrap 5.1 for enhanced styling. To compile the SCSS file into CSS, run the following command in your terminal:

```bash
sass style.scss style.css
```

## Usage

Instructions for using the application:

1. **Logging In**: Provide details on how users can log in to their accounts.

2. **Searching and Purchasing Products**: Explain how users can search for and purchase products.

3. **Adding New Products for Sale**: Describe the process for users to add new products for sale.


### API (PHP File Descriptions)


### AddFavorite.php

This script adds an item to the user's favorites list. It verifies if the item is already in the user's favorites and adds it if not.

### Check_Login.php

This script checks if a user is logged in. If the user is not logged in, it redirects them to the login page.

### DB_Connection.php

This script establishes a database connection using MySQLi. It includes the database server, username, password, and database name.

### DeleteItem.php

This script deletes an item from the database. It takes the item's ID to be deleted from the GET request and removes it from the `vintage_items` table.

### Favorite.php

This script handles the purchase of items in the user's favorites list. If the user decides to purchase items, they are deleted from the user's favorites, simulating a purchase.

### getSessionData.php

This script initiates a session and returns the current user's role in JSON format. The user's role is used to determine permissions and available features.

### Logout.php

This script terminates the user's session and redirects them to the login page. It destroys the current session, ensuring the user is logged out.

### NewObject.php

This script handles the addition of new items for sale by administrators. It verifies if the user is authenticated as an administrator before allowing access to the page. If the user is an administrator and has filled out the item entry form, the data is inserted into the database. Some data checks are also performed before insertion.

### RemoveFavorite.php

This script allows users to remove an item from their favorites. It takes the item's ID to be removed from the GET request and then removes it from the user's favorites table.

These descriptions provide a high-level overview of the purpose and functionality of each PHP file.
