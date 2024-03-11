# Laravel Project

This is a Laravel project for a Twilio VoIP.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP
- Composer
- npm
- Laravel

### Installing

1. Clone the repository
```bash
git clone https://github.com/erickne/dev-challenge-phone-laravel
```

2. Install PHP dependencies
```bash
composer install
```

3. Copy the .env.example file to .env
```bash
cp .env.example .env
```

4. Generate an application key

```bash
php artisan key:generate
```

5. Start the local development server
```bash
php artisan serve
```

6. Initialize ngrok to expose server and allow Twilio to connect to it
```bash
ngrok http 8000
```

7. Update Twilio webhook

- https://console.twilio.com/us1/develop/phone-numbers/manage/incoming/
- Add `ngrok` url, including the api path
```txt
https://******.ngrok-free.app/api/handle_calls
```

### Usage
The application has the following routes:

- `GET /access_token` - Executes the GenerateAccessTokenController
- `POST /handle_calls` - Executes the HandleIncomingCallsController
- `POST /handle_response` - Executes the HandleResponseFromCallerController
- `POST /handle_recording` - Executes the HandleRecordingController
- `GET /call_reject` - Executes the IncomingCallRejectController
- `GET /call_accept` - Executes the IncomingCallAcceptController
- `GET /calls` - Executes the GetAllCallsController
