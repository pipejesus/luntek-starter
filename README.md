### I. Tworzenie nowego projektu WordPress z użyciem Lando

Krok 0: Sklonuj repozytorium:

```
git clone git@github.com:pipejesus/luntek-starter.git
```

Krok 1: Przejdź do sklonowanego folderu i uruchom Lando:

```bash
cd luntek-starter

lando start
```

Jeśli wszystko się powiodło, po przejściu na `https://nazwaprojektu.lndo.site` zobaczysz testowy ekran powitalny.

Krok 2: Ściągnij najnowszego WordPressa do folderu `app`

```bash
lando wp core download --locale=pl_PL
```

Krok 3: Stwórz lokalny `wp-config.php` przy użyciu `wp-cli`

```bash
lando wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database --dbcharset=utf8
```

Krok 4: Uruchom instalację WordPress z linii poleceń

```bash
lando wp core install --url='https://nazwaprojektu.lndo.site' --title='Czoko' --admin_user='tamago' --admin_email='twoj.adres@tamago.software'
```

W odpowiedzi na ostatnią komendę dostaniesz wygenerowane nowe hasło do wp-admina. Przekleisz je później razem z  loginem do `README.md` w repozytorium projektu, żeby każdy, kto pracuje nad projektem miał je pod ręką.

### II. Instalacja theme bazowego - Sage

Krok 1: Przejdź do folderu `themes`

```bash
cd app/wp-content/themes
```

Krok 2: Używając composera ściągnij najnowsze `Sage`. Zastąp `nazwatheme` docelową nazwą folderu z  theme.

```bash
lando composer create-project roots/sage nazwatheme
```

Krok 3: Przejdź do folderu z theme i zainstaluj pakiet `roots/acorn`

```bash
cd nazwatheme
lando composer require roots/acorn
```

Krok 4:  Wyedytuj plik `composer.json` i w kluczu `scripts` dodaj `post-autoload-dump`. Po dodaniu sekcja `scripts` powinna wyglądać mniej więcej tak:

```json
{
	"scripts": { 	
		"lint": [  
		  "phpcs --extensions=php --standard=PSR12 app"  
		],		
		"post-autoload-dump": [
			"Roots\\Acorn\\ComposerScripts::postAutoloadDump"
		]				
	}
}
```

Krok 5: Aktywuj theme

```
lando wp theme activate nazwatheme
```

Krok 5: Opublikuj pliki konfiguracyjne pakietów z katalogu `vendor` do folderu theme.

Niektóre moduły posiadają pliki konfiguracyjne, które możemy automatycznie skopiować jako nasze lokalne wersje, trzymane w theme.

```
lando wp acorn vendor:publish
```

W pierwszym pytaniu zostaniesz poproszony o wskazanie plików do publikacji - wpisz `0` i wciśnij `[ENTER]` aby wybrać wszystkie. W drugim pytaniu odpowiedz `yes`.

Krok 6: Zainstaluj pakiety Node'a

```
lando yarn
```

Krok 7: Wyedytuj `bud.config.js` aby skonfigurować live-reload gdy `yarn dev` jest uruchomiony wewnątrz kontenera Lando. Odnajdź linijki zawierające `.setUrl` oraz `.setProxyUrl` i podmień następująco:

```javascript
  app
    .setUrl('http://0.0.0.0:3000') // <---- tu 0.0.0.0 zamiast localhost
    .setProxyUrl('https://nazwaprojektu.lndo.site')  // <---- tu podmien na twoja nazwe projektu
    // ...
```

Krok 8: Odpal kompilację JS/CSS w tle:

```bash
# Uruchamia kompilowanie na żywo
lando yarn dev
```

Sprawdź, czy działa live-reload.
Powinieneś móc wejść pod adres `http://localhost:3000` .

Krok 9: Jeśli potrzebujesz wersji `build`, skompiluj theme:

```bash
# Kompiluje theme
lando yarn build
```