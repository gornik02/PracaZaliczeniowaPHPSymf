
    
## Jak zacząć

``` bash
# Zainstaluj dependencje
composer install

# Edytuj plik .env i dodaj parametry do Bazy danych

# Stwórz schema bazy danych
php bin/console doctrine:migrations:diff
# Uruchom migracje
php bin/console doctrine:migrations:migrate

# Dodaj Admin usera do bazy danych
Rola: ["ROLE_USER"] (Nie bierzemy jej pod uwagi, bo mamy tylko jednego usera - Admina)
Hasło powinno zostać wygenerowane komendą:
php bin/console security:encode-password

# Uruchom server symfony
symfony server:start

#Znajdziesz panel administratora pod url: /admin

```

# Autorzy: 
  - Gabriel Radzięta
  - Marcin Brzóska
  - Krzysztof Lewiarz

# Krótki opis
Strona firmowa przedsiębiorstwa nie sprecyzowanej branży, której zadaniem będzie informowanie klientów o pojawieniu się nowych produktów lub usług. Użytkownicy będą również informowani o ważnych zmianach w funkcjonowaniu firmy np. o zmianach w danych kontaktowych lub zmianach godzin otwarcia firmy. Do bazy klientów będzie można dopisać się na stronie podając email(newsletter).
Aplikacja będzie zawierała panel administratora, w którym będzie możliwość dodania, zmiany lub usunięcia produktu/usługi.

# Plan zadań
Implementacja aplikacji zostanie podzielona na 3 grupy.
## 1. Panel administratora
  - 1.1 Model danych logowania
  - 1.2 Formularz logowania
  - 1.3 Obsługa logowania
  - 1.4 Dodawanie, usuwanie, edycja produktów lub usługi
    
## 2. Serwis mailingowy (newsletter)
  - 2.1 Formularz newslettera
  - 2.2 Obsługa dodawania użytkowników
  - 2.3 Serwis informujący użytkownika o dodanych usługach lub zmianach w firmie. (Mailowo)
    
## 3. Layout aplikacji (widoki)
  - 3.1 Strona Główna
  - 3.2 Oferta (produkty/usługi)
  - 3.3 O Firmie
  - 3.4 Kontakt + (Formularz do wysyłania pytań)
  - 3.5 Panel Administratora
  
## 4. Rozbicie planu na poszczególne warstwy
  - 4.1 Model
    - Model danych logowania
    - Model danch newslettera
    - Model danych produktu
  - 4.2 Kontroler
    - LoginController: obsługa logowania Admina ( Easy Admin )
    - ProductController: (dodawanie, usuwanie, aktualizowanie produktów)
    - NewsletterUsersController: obsługa zapisów do newslettera
    - MailerController: obsługa wysyłania maili do użytkowników
    - SecurityController: Kontroler bezpieczeństwa logowania
  - 4.3 Widok
    - Login View: formularz logowania
    - Home View: widok głowna aplikacji + Zapis do newslettera
    - Product View: widok z ofertą firmy
    - About View: widok informacyjna o firmie
    - Contact View: widok z kontaktem do firmy
    - Admin View: widok Administratora 
## 5. Plan Bazy Danych
  - 5.1 Tabela User
    - id
    - email
    - roles
    - password(zahaszowane haslo)
  - 5.2 Tabela Newsletter
    - id
    - content
    - created_at
  - 5.3 Tabela NewsletterUsers
    - id
    - email
  - 5.4 Tabela Product
    - id
    - name
    - content
    - published
    - price
    - count    
