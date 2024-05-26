## Requirements

- PHP >= 8
- Composer
- Node.js
- NPM or Yarn

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/algopro95/eci.git
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Install JavaScript dependencies:

    ```bash
    npm install
    # Or if you prefer Yarn
    yarn install
    ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the database configuration in the `.env` file.

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Migrate the database:

    ```bash
    php artisan migrate
    ```

7. Compile assets:

    ```bash
    npm run dev
    # Or for production
    npm run prod
    ```

8. Serve the application:

    ```bash
    php artisan serve
    ```

9. Access the application in your browser at `http://localhost:8000`.

## Usage

- The application includes CRUD functionality for managing departments, levels, jabatans, and karyawans.
- You can access the respective CRUD interfaces through the navigation menu.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
