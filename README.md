## dit is coc-check gemaakt door Mitch Quist en Julian Forrer. en dit project is gebouwd voor ons eindexamen project.

1. dit project is werkende maar sommige features zijn nog niet helemaal compleet.

2. voor dit project moett je bepaalde paketten installeren zoals laravel Breeze, installatie staat beneden

## Getting Started

### Prerequisites

Before you begin, ensure you have met the following requirements:

- You have installed [PHP](https://www.php.net/downloads.php) (version 8.0 or higher).
- You have installed [Composer](https://getcomposer.org/download/).
- You have installed [Node.js](https://nodejs.org/) and [npm](https://www.npmjs.com/get-npm).
- You have installed [Git](https://git-scm.com/downloads).

### Installation

1. **Clone the repository:**

    ```sh
    git clone https://github.com/username/repository.git
    cd repository
    ```

2. **Install dependencies:**

    ```sh
    composer install
    npm install
    ```

3. **Copy the [.env.example](http://_vscodecontentref_/1) file to [.env](http://_vscodecontentref_/2):**

    ```sh
    cp .env.example .env
    ```

4. **Generate an application key:**

    ```sh
    php artisan key:generate
    ```

5. **Set up your database:**

    - Update your [.env](http://_vscodecontentref_/3) file with your database credentials.
    - Run the database migrations:

    ```sh
    php artisan migrate
    ```

6. **Seed the database (optional):**

    ```sh
    php artisan db:seed
    ```

7. **Build the front-end assets:**

    ```sh
    npm run dev
    ```

8. **Start the development server:**

    ```sh
    php artisan serve
    ```

    Your application should now be running at [http://localhost:8000](http://localhost:8000).
