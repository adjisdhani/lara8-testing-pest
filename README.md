# Laravel 8 Testing with PEST

This repository demonstrates how to use PEST for testing API endpoints in Laravel 8.

## Setup Instructions

Follow these steps to set up and run the project:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/adjisdhani/lara8-testing-pest.git
   ```

2. **Navigate into the repository**:
   ```bash
   cd lara8-testing-pest
   ```

3. **Install dependencies**:
   ```bash
   composer install
   ```

4. **Configure environment variables**:
   Copy the `.env.example` file to `.env` and update the database configuration to match your local setup:
   ```bash
   cp .env.example .env
   ```
   Then, edit the `.env` file to set up your database credentials.

5. **Run migrations**:
   Create the necessary database tables by running:
   ```bash
   php artisan migrate
   ```

6. **Install PEST**:
   Initialize PEST in the project by running:
   ```bash
   php artisan pest:install
   ```

7. **Run tests**:
   Execute the tests using PEST:
   ```bash
   ./vendor/bin/pest
   ```

8. **Done!**
   You can now review the test results and modify or extend the tests as needed.

## Additional Notes
- Ensure that your database is properly configured and accessible.
- PEST is an elegant testing framework that simplifies writing and running tests. Learn more about it at [PEST Documentation](https://pestphp.com/).

Feel free to explore the project and contribute! 😊