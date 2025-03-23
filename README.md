Jak uruchomić:

 - php artisan queue:work


Google Calendar:

Kroki konfiguracji:
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
