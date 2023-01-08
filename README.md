
# Currency Converter

A simple currency conversion app built with Laravel and Livewire.

## Prerequisites

- PHP 7.4+
- Composer
- Laravel 8+

## Installation

1. Clone the repository:

```bash
  https://github.com/KenjiWriter/currency-converter.git
```

2. Install dependencies:
```bash
  composer install
```

3. Set up the database:
```bash
  cp .env.example .env
  # Update .env file with your database credentials
  php artisan migrate
```

4. Start the development server:
```bash
  php artisan serve
```
    
## Usage

1. Go to the app in your browser:
```bash
  http://localhost:8000
```

2. Enter an amount to convert, select the currencies to convert from and to, and click the "Convert" button.


## Contributing

If you would like to contribute to the project, please fork the repository and create a pull request with your changes.


## License

This project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/). See the [LICENSE](https://choosealicense.com/licenses/mit/) file for details.

## Acknowledgements

- XE Currency API (or Open Exchange Rates API) for providing exchange rate data
- Laravel and Livewire for providing the web framework and front-end integration

