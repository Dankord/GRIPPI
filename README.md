# GRIPPI

**Geo Rendering Innovative Police Patrol Interface**

A web-based geospatial crime pattern analytics support system designed to support crime data analysis, spatial visualization, and patrol planning.

## Table of Contents

- [Project Overview](#project-overview)
- [Technology Stack](#technology-stack)
- [Prerequisites](#prerequisites)
- [Installation and Setup](#installation-and-setup)
- [PostgreSQL and PostGIS Setup](#postgresql-and-postgis-setup)
- [Laravel Environment Configuration](#laravel-environment-configuration)
- [Install Dependencies](#install-dependencies)
- [Run the Application](#run-the-application)
- [Development Workflow](#development-workflow)
- [Troubleshooting](#troubleshooting)

## Project Overview

GRIPPI is a Laravel-based web application focused on geospatial crime pattern analytics. It aims to transform crime incident data into spatial and temporal insights that can support law enforcement decision-making and patrol planning.

The project uses PostgreSQL for relational data storage and PostGIS for spatial data management and geographic analysis.

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP | Backend programming language |
| Laravel | Backend framework and application structure |
| Blade | Server-rendered HTML templates |
| Tailwind CSS | Styling and responsive UI |
| Node.js | JavaScript runtime for frontend tooling |
| npm | JavaScript package management |
| Vite | Frontend asset bundling and development server |
| PostgreSQL | Relational database |
| PostGIS | Spatial database extension |
| pgAdmin 4 | Graphical PostgreSQL database management |

## Prerequisites

Install the following tools before setting up the project.

### 1. Git

Used to clone the repository and manage version control.

Download: https://git-scm.com/downloads

Verify the installation:

```bash
git --version
```

### 2. PHP

Install PHP through [Laravel Herd](https://herd.laravel.com/) or another compatible PHP installation.

Use a PHP version supported by the Laravel version specified in the project's `composer.json`.

Verify the installation:

```bash
php -v
```

Check the required PHP extensions:

```bash
php -m
```

The project requires the extensions specified by Laravel and its installed dependencies. For PostgreSQL connectivity, ensure that `pdo_pgsql` is enabled.

Verify the PostgreSQL driver specifically on Windows:

```powershell
php -m | findstr pgsql
```

Expected output should include:

```text
pdo_pgsql
pgsql
```

If these extensions are missing, enable or install them for the PHP version used by your terminal.

### 3. Composer

Composer manages Laravel's PHP dependencies.

Download: https://getcomposer.org/download/

Verify the installation:

```bash
composer --version
```

### 4. Node.js and npm

Node.js runs the frontend development tools, while npm installs the project's JavaScript dependencies.

Download the Node.js LTS release: https://nodejs.org/

npm is included with the standard Node.js installation.

Verify both tools:

```bash
node -v
npm -v
```

If PowerShell blocks the `npm.ps1` script because of its execution policy, use:

```powershell
npm.cmd -v
```

You can also run npm commands using `npm.cmd`, such as:

```powershell
npm.cmd install
npm.cmd run dev
```

Alternatively, use Command Prompt as your VS Code terminal.

### 5. PostgreSQL and pgAdmin 4

Install PostgreSQL for Windows and pgAdmin 4.

Download: https://www.postgresql.org/download/windows/

Recommended local configuration:

- Host: `127.0.0.1`
- Port: `5432`
- Database: `grippi`
- Username: `postgres`
- Password: The password chosen during PostgreSQL installation

Keep PostgreSQL running while developing the application.

### 6. PostGIS

PostGIS provides spatial data types and geographic functions required for GRIPPI's geospatial features.

Install a PostGIS package compatible with your PostgreSQL version and Windows architecture.

Official installation information: https://postgis.net/install/

## Installation and Setup

### Step 1: Clone the Repository

Open a terminal and navigate to the directory where you want to store the project.

```bash
git clone <REPOSITORY_URL>
```

Navigate into the cloned project:

```bash
cd grippi
```

Replace `<REPOSITORY_URL>` with the actual repository URL.

### Step 2: Install PHP Dependencies

Run:

```bash
composer install
```

This installs the dependencies listed in `composer.lock`.

Do not run `composer update` as part of the normal setup process, because it may change dependency versions.

### Step 3: Create the Environment File

Copy the example environment file:

**PowerShell or Command Prompt:**

```powershell
Copy-Item .env.example .env
```

If using Command Prompt, use:

```cmd
copy .env.example .env
```

If a local `.env` file already exists, do not overwrite it without checking its contents first.

### Step 4: Generate the Application Key

Run:

```bash
php artisan key:generate
```

This generates the Laravel application encryption key in `.env`.

Each developer should use their own local environment configuration. Never commit `.env` or share production secrets.

## PostgreSQL and PostGIS Setup

### Step 1: Start PostgreSQL

Open pgAdmin 4 and connect to your local PostgreSQL server.

If the server is not running, start the corresponding PostgreSQL service through Windows Services.

### Step 2: Create the GRIPPI Database

In pgAdmin 4:

1. Expand **Servers**.
2. Expand your PostgreSQL server.
3. Right-click **Databases**.
4. Select **Create → Database**.
5. Set the database name to `grippi`.
6. Set the owner to `postgres`, or use the designated development database user if one has been configured.
7. Click **Save**.

The database must exist before Laravel runs its migrations.

### Step 3: Enable PostGIS

Select the `grippi` database and open **Tools → Query Tool**.

Execute:

```sql
CREATE EXTENSION IF NOT EXISTS postgis;
```

Verify the installation:

```sql
SELECT PostGIS_Full_Version();
```

If the query returns version information, PostGIS is enabled for the `grippi` database.

If the extension cannot be created, confirm that PostGIS was installed for the correct PostgreSQL version and that your database user has the necessary privileges.

### Step 4: Configure Laravel's Database Connection

Open the project's `.env` file and configure the database settings:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=grippi
DB_USERNAME=postgres
DB_PASSWORD=your_postgres_password
```

Replace `your_postgres_password` with your local PostgreSQL password.

Do not commit your real credentials to Git.

### Step 5: Run Database Migrations

After configuring the database, execute:

```bash
php artisan config:clear
php artisan migrate
```

Laravel will create the database tables defined by the project's migrations.

**Important:** Do not use `php artisan migrate:fresh` on a database containing data you need to preserve. It drops existing tables before recreating them.

## Install Dependencies

### Install JavaScript Dependencies

From the project root, run:

```bash
npm install
```

This installs the dependencies defined by `package.json` and uses `package-lock.json` when available.

If PowerShell blocks the npm script, run:

```powershell
npm.cmd install
```

### Build Frontend Assets

For development, run:

```bash
npm run dev
```

Keep this terminal running while developing. Vite will monitor frontend assets and rebuild them as needed.

For a production-style asset build, run:

```bash
npm run build
```

If your terminal requires the Windows command workaround, use `npm.cmd` in place of `npm`.

## Run the Application

You will generally need two terminal sessions.

### Terminal 1: Laravel

From the project root:

```bash
php artisan serve
```

The application will usually be available at:

http://127.0.0.1:8000

### Terminal 2: Vite

From the same project root:

```bash
npm run dev
```

Keep Vite running so that frontend assets load correctly during development.

If you use Laravel Herd's configured local domain instead, use that domain rather than starting a second Laravel development server.

## Troubleshooting

### Laravel cannot connect to PostgreSQL

Check that:

- The PostgreSQL service is running.
- The database `grippi` exists.
- The host and port are correct.
- The username and password are correct.
- PHP has the `pdo_pgsql` extension enabled.
- The `.env` settings are correct.

Then run:

```bash
php artisan config:clear
```

### PostGIS extension is missing

Connect to the `grippi` database in pgAdmin and execute:

```sql
CREATE EXTENSION IF NOT EXISTS postgis;
```

If this fails, verify that the matching PostGIS package is installed and that the database user has the necessary permissions.

### npm is blocked in PowerShell

Try:

```powershell
npm.cmd install
```

Or switch the VS Code terminal to Command Prompt.

### Tailwind CSS is not loading

Ensure that Vite is running:

```bash
npm run dev
```

Verify that the Blade layout includes the appropriate Vite directives for the project's configured assets, typically:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Also confirm that the Tailwind configuration and CSS entry point match the installed Tailwind version.

### Composer reports missing PHP extensions

Check the PHP version and extensions used by your terminal:

```bash
php -v
php -m
```

