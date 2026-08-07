# ![developers.italia](https://docs.italia.it/media/docsitalia/icons/favicon-32x32.png "developers.italia")  ItaliaWP2
## Tema WordPress per la Pubblica Amministrazione

---

#### [**Guarda la demo**](http://italiawp.borisamico.it/demo2) | [**Scarica il tema**](https://raw.githubusercontent.com/italia/design-wordpress-theme-italiaWP2/master/italiawp2.zip) | [**Pagina del tema**](http://italiawp.borisamico.it)

---

**ItaliaWP2** è un tema basato su [**Bootstrap Italia**](https://italia.github.io/bootstrap-italia/) utilizzabile per i **siti** della **Pubblica Amministrazione**, sviluppato per [**WordPress**](https://it.wordpress.org/) (CMS open-source).

**ItaliaWP2** utilizza i componenti del [**Prototipo per siti PA di AgID**](https://italia.github.io/design-comuni-prototipi/) delle [**linee guida di design dell'Agenzia per l'Italia digitale**](https://docs.italia.it/italia/designers-italia/design-linee-guida-docs/it/stabile/index.html) rilasciare dal [**Team per la trasformazione digitale**](https://teamdigitale.governo.it/) e su [**Bootstrap Italia**](https://italia.github.io/bootstrap-italia/).

**ItaliaWP2** è una **soluzione open-source e gratuita**, ideale per comuni, istituti e piccoli enti pubblici in genere che hanno scelto di utilizzare WordPress per il proprio sito intenet, ed è l'evoluzione di [**ItaliaWP** (versione 1)](http://italiawp.borisamico.it/v1).

---

## Installare _ItaliaWP2_:

1. Scaricare il file [.zip](https://raw.githubusercontent.com/italia/design-wordpress-theme-italiaWP2/master/italiawp2.zip) in locale
2. Aggingere un nuovo tema nella sezione _"Aspetto" > "Temi"_
3. Selezionare _"Aggiungi nuovo"_ e successivamente _"Carica tema"_
4. Scegliere il file .zip scaricato in precedenza, senza decomprimerlo e cliccare _"Installa ora"_
5. Selezionare _"Attiva"_ per poter utilizzare il tema

### Requisiti

| | |
|---|---|
| **WordPress** | 6.0 o superiore |
| **PHP** | 8.0 o superiore (testato su 8.3) |
| **Bootstrap Italia** | 1.6.4, incluso nel tema |

Il tema è compatibile con l'editor a blocchi **Gutenberg**. Chi preferisce l'editor
classico può installare il plugin [**Classic Editor**](https://it.wordpress.org/plugins/classic-editor/).

## In caso di utilizzo del _Tema Child_:

Ripetere la procedura precedente ma con il file [.zip](https://raw.githubusercontent.com/italia/design-wordpress-theme-italiaWP2/master/italiawp2-child.zip)
del _Tema Child_, successivamente configurare il _Tema Child_ lasciando _ItaliaWP2_ con la configurazione iniziale.

---

## Configurare _ItaliaWP2_:

1. Creare 2 pagine per "Home" e "Articoli"
2. In _"Impostazioni" > "Lettura"_ selezionare _"Una pagina statica"_
3. Assegnare le pagine appena create rispettivamente ad "Homepage" e "Pagina articoli"
4. Impostare i dati di contatto e i dettagli nella sezione _"Dettagli"_ (qui si imposta anche, facoltativamente, il _Measurement ID_ di Google Analytics 4)
5. Attivare le sezioni della "Home" in _"Aspetto" > "Personalizza"_ > _"Sito & Homepage"_
6. In _"Aspetto" > "Menu"_ Creare un nuovo Menu ed inserirlo nella posizione "Menu Principale"
7. [Facoltativo] Installare (e poi attivare) i Plugins consigliati in _"Aspetto" > "Plugin richiesti"_

---

## Principali caratteristiche di _ItaliaWP2_:

* **WordPress**: è realizzato per l'ultima versione di _WordPress_ disponibile in Italiano
* **Responsive**: si adatta ad _ogni tipo di dispositivo_ (desktop, tablet e mobile) mantenendo le funzionalità
* Pagina **"DETTAGLI"** nel backend: è possibile inserire e modificare facilmente le _informazioni di contatto_, i _link dei profili social_, il numero di _ultimi articoli_ in homepage, gli _ID delle pagine_ Privacy, Note legali e Contatti, e il _Measurement ID_ di **Google Analytics 4**
    * Il campo Analytics è **facoltativo**: se lasciato vuoto non viene caricato alcuno script di tracciamento e non parte alcuna richiesta verso terze parti
* **11 posizioni del menu**: _menu principale_, _menu in alto_ e 9 per i _box servizi_ (divisi in 3 tipologie)
    * Nei menu **Box Servizi** è possibile inserire delle immagini utilizzando i _Link personalizzati_ e inserendo direttamente il tag html **< img src="URL" >** nel _Testo del link_
* **5 aree widget**: _Footer Colonne_, _Sidebar Pagine_ (disattivabile scegliendo l'apposito _Template_), _Sidebar Articoli_, _Sezione Notifica_ e _Sezione Credits_
* **Logo, titolo e descrizione**: personalizzazione del _logo_, del _titolo_, della _denominazione_ e dell'_icona_ del sito direttamente dalla personalizzazione del tema
* **Immagini** e **Gallerie Fotografiche**: ritaglio e sistemazione automatica delle _immagini principali_ degli articoli, gestione grafica secondo le linee guida delle _singole immagini_ (disattivabile) e _gallerie_ caricate negli articoli o nella pagine. Gestione di Gallerie Fotografiche esterne tramite _Custom Post Type_
* **Liste Allegati**: gestione degli allegati (e relative liste) tramite _Plugin esterno_ di cui si richiede l'installazione al momento dell'attivazione del tema
* Integrazione con il **Customizer (Pesonalizza)** di Wordpress:
    * Sezione **"Sito & Homepage"** consente di fissare o no il _menu principale_ e di attivare o disattivare le varie _sezioni_ in home page
    * Sezione **"Preferenze Pagine & Articoli"** consente di attivare l'_immagine in evidenza_ di _default_ (per gli articoli che non ne hanno una), consente di disattivare le _cornici grafiche_ per le immagini "singole"
    * Sezione **"Colori"** consente di impostare il _colore principale_ del sito, le varianti e i colori secondati previsti dalle linee guida saranno generate dinamicamente in automatico
    * Sezione **"Immagine dell'header"** consente di impostare l'_immagine di copertina_ dell'homepage
    * Sezione **"Menu"** consente di creare, gestire e posizionare i _menu personalizzati_ nelle posizioni previste
    * Sezione **"Widget"** consente di creare, gestire e posizionare i _widget_ nelle colonne del footer

---

## Aggiornamenti:

Gli aggiornamenti sono notificati in _"Aspetto" > "Temi"_ oppure nella _pagina degli aggiornamenti_ del backend di WordPress.

---

## Sviluppo:

Il tema **non richiede alcun passaggio di build** e non ha alcuna dipendenza esterna:
niente SCSS, niente bundler, niente gestori di pacchetti. Si scarica, si attiva e funziona.
Gli asset di _Bootstrap Italia_ sono file già compilati, inclusi in `static/`, e la
personalizzazione grafica avviene tramite i fogli di stile del tema caricati _dopo_ di essi.

Per passare a una versione diversa di Bootstrap Italia si sostituiscono i file a mano,
prendendoli dalla cartella `dist/` della release desiderata:

| Da `dist/` | A |
|---|---|
| `css/bootstrap-italia.min.css` | `static/css/` |
| `js/bootstrap-italia.min.js` | `static/js/` |
| `svg/sprite.svg` | `static/svg/` |

e si aggiorna di conseguenza la costante `ITALIAWP2_BOOTSTRAP_ITALIA_VERSION` in
`inc/enqueue.php`, che funge da _cache buster_. È l'unico punto in cui la versione è
dichiarata: non viene mai ricavata dinamicamente, la decide lo sviluppatore.

> **Nota:** la linea 1.x di Bootstrap Italia si è conclusa con la **1.6.4**, la versione
> attualmente inclusa: è quindi l'ultima a cui il tema può essere aggiornato senza
> modifiche. Il passaggio alla 2.x non è un aggiornamento ma un cambio di framework
> — Bootstrap 5 al posto di Bootstrap 4, nessuna dipendenza da jQuery, componenti
> distribuiti come moduli ESM e attributi `data-bs-*` — e richiede la revisione del markup
> e del JavaScript del tema.

---

## Plugin Wordpress:

I seguenti plugins WordPress, già compresi o consigliati, sono già gestiti graficamente nel tema.

**Importanti:**

* [**Classic Editor**](https://it.wordpress.org/plugins/classic-editor/) ripristina l'*Editor Classico* di WordPress

**Compresi nel tema:**

* [**TGM Example Plugin**](http://tgmpluginactivation.com) consente l'inclusione di Plugin nel tema

**Consigliati:**

* [**Attachments**](https://it.wordpress.org/plugins/attachments/) consente il caricamento di allegati in Pagine e Articoli

---

## Licenza:

Copyright (c) 2018-2021 & moral rights [**Boris Amico**](http://borisamico.it).

Special thanks to **Erik Golinelli**.

Il testo integrale della licenza è nel file [`LICENSE.md`](LICENSE.md).

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

---

## Altre licenze:

* **Bootstrap Italia** [clicca qui](https://github.com/italia/bootstrap-italia/blob/master/LICENSE)
* **jQuery** [clicca qui](https://jquery.org/license/) — il tema utilizza la copia inclusa in WordPress, non ne distribuisce una propria
* Plugin jQuery **Magnific Popup** [clicca qui](https://github.com/dimsemenov/Magnific-Popup)
* Plugin jQuery **Owl Carousel 2** [clicca qui](https://github.com/OwlCarousel2/OwlCarousel2/blob/develop/LICENSE)
* **Leaflet** [clicca qui](https://github.com/Leaflet/Leaflet/blob/main/LICENSE)
* **Theme Update Checker** [clicca qui](https://github.com/YahnisElsts/wp-update-server)
* **TGM Plugin Activation** [clicca qui](http://tgmpluginactivation.com)
* Plugin WordPress **Attachments** [clicca qui](https://github.com/jchristopher/attachments)
