# MakeSell - Buy, Produce & Trade

This is a portfolio project which is simplified and optimized version of BETON24. BETON24 was an ERP application designed to operate manufacturing companies.

## Features

- Dynamic portfolio management
- Responsive design for all devices
- Easy-to-use admin panel
- Modular and extensible codebase

## Requirements

Before you begin, ensure you have met the following requirements:

- PHP >= 7.4
- Composer
- MySQL or MariaDB
- Web server (Apache or Nginx)

## Installation

### Step 1: Clone the Repository

```bash
$ git clone https://github.com/your-repo/your-yii2-portfolio.git
$ cd your-yii2-portfolio
```

### Step 2: Install Dependencies

Run the following command to install PHP dependencies:

```bash
$ composer install
```

### Step 3: Configure Environment

Update the database and mailer configurations in the `common/config/main-local.php` file:

```php
<?php

return [
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;port=8889;dbname=makesell;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
            // Configure transport settings to send real emails
            // 'transport' => [
            //     'dsn' => 'smtp://user:pass@smtp.example.com:25',
            // ],
        ],
    ],
];
```

### Step 4: Database Migration

Run the migration command to set up the database schema:

Init -> Choose Development[0]

```bash
$ php init
$ php yii migrate
```

### Step 5: Configure Web Server

- **For Apache**: Ensure `DocumentRoot` is set to the `web` directory.
- **For Nginx**: Update the server block to point to the `web` directory as the root.

### Step 6: Serve the Application

Start the built-in PHP server for testing:

```bash
$ php yii serve
```

Then, visit `http://localhost:8080` in your browser.

### Platform-Specific Notes

#### macOS

1. Ensure PHP is installed. Use [Homebrew](https://brew.sh/) if needed:

   ```bash
   $ brew install php
   ```

2. Install Composer globally:

   ```bash
   $ brew install composer
   ```

3. Ensure your web server is configured correctly (e.g., using MAMP or Nginx).

#### Windows

1. Download and install PHP from [php.net](https://www.php.net/).
2. Install Composer globally by downloading it from [getcomposer.org](https://getcomposer.org/).
3. Use a local server environment like XAMPP or WAMP for easy setup.

## Usage

- Access the admin panel via `/admin` to manage your portfolio content.
- Add, edit, or delete projects dynamically.

## Contributing

Contributions are welcome! Please follow the [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.