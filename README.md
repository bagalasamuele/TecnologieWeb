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


