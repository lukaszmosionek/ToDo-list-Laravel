Jak uruchomić:

   Wersja php - 8.2

 - composer install
 - php artisan migrate
 - php artisan serve
 - php artisan queue:work

Uruchomienie docker:
 
 - docker compose up --build

Google Calendar:

Kroki konfiguracji:

 Instrukcja: https://github.com/spatie/laravel-google-calendar?tab=readme-ov-file

 1. Przejdź do Google Cloud Console.
 2. Utwórz nowy projekt (jeśli jeszcze go nie masz).
 3. Włącz API Google Calendar:
   - Wejdź do API & Services > Library.
   - Znajdź Google Calendar API i kliknij Enable.
 4. Utwórz poświadczenia (OAuth 2.0 Client ID):
   - Wejdź do API & Services > Credentials.
   - Kliknij Create Credentials i wybierz OAuth 2.0 Client ID.
   - Skonfiguruj ekran zgody OAuth (Google może wymagać podania informacji o aplikacji).
   - Wybierz Desktop App lub Web Application jako typ aplikacji.
   - Pobierz plik JSON (to będą nasze klucze API).
 5. Zapisz plik JSON w storage/app/google-calendar.json.
