<?php
/**
 * Nederlandse taal constanten gerelateerd aan module-informatie
 *
 * @copyright	Copyright fiammybe (David Janssens) 2026
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since		1.0
 * @author		fiammybe (David Janssens) <david.j@impresscms.org>
 * @package		library
 * @version		$Id$
 */

defined("ICMS_ROOT_PATH") or die("ICMS root pad niet gedefinieerd");

define("_MI_LIBRARY_MD_NAME", "Bibliotheek");
define("_MI_LIBRARY_MD_DESC", "Eenvoudige Bibliotheek voor ImpressCMS");
define("_MI_LIBRARY_PUBLICATIONS", "Publicaties");

define("_MI_LIBRARY_CATEGORIES", "Categorieën");
define("_MI_LIBRARY_COLLECTIONS", "Collecties");
define("_MI_LIBRARY_ARCHIVES", "Open Archief");
define("_MI_LIBRARY_START_PAGE", "Startpagina");
define("_MI_LIBRARY_START_PAGE_DSC", "Welke pagina wilt u gebruiken als de startpagina voor deze module?");
define("_MI_LIBRARY_SHOW_BREADCRUMB", "Breadcrumbs weergeven?");
define("_MI_LIBRARY_SHOW_BREADCRUMB_DSC", "Schakelt het zichtbaar maken van breadcrumbnavigatie");
define("_MI_LIBRARY_DEFAULT_LANGUAGE", "Standaardtaal");
define("_MI_LIBRARY_DEFAULT_LANGUAGE_DSC", "Wordt gebruikt als de standaardoptie in het formulier voor publicatie-indiening om tijd te besparen");
define("_MI_LIBRARY_ENABLE_ARCHIVE", "Open Archives (OAIPMH) webdienst inschakelen?");
define("_MI_LIBRARY_ENABLE_ARCHIVE_DSC", "Wilt u uw publicatiemetadata delen met externe sites via het Open Archives Initiative Protocol for Metadata Harvesting? Als ingeschakeld, zal de module reageren op binnenkomende OAIPMH-verzoeken tegen zijn basis-URL. Als niet, doet hij dat niet. OAIPMH laat gespecialiseerde zoekmachines uw publicatiemetadata importeren voor indexering toe.");
define("_MI_LIBRARY_FEDERATE", "Publicatiemetadata standaard federeren?");
define("_MI_LIBRARY_FEDERATE_DSC", "Federatiepublicaties maken hun metadata toegankelijk voor externe sites via het Open Archives Initiative Protocol for Metadata Harvesting. U kunt hier de standaardwaarde voor de federatie-instelling in het formulier 'publicatie toevoegen' instellen. U kunt dit overschrijven, het is slechts een handigigheid.");
define("_MI_LIBRARY_INSTRUCTIONS", "Instructies");
define("_MI_LIBRARY_IMAGE_HEIGHT", "Maximale weergavehoogte afbeelding (pixels)");
define("_MI_LIBRARY_IMAGE_HEIGHTDSC", "De hoogte waarop afbeeldingspublicaties worden weergegeven in de enkele weergavemodus. Afbeeldingen worden geschaald met behoud van aspectratio, volgens de grootste opgegeven dimensie (breedte of hoogte). In werkelijkheid wordt beeldschaling beperkt door ofwel de breedte of de hoogte die u heeft opgegeven, maar niet beide.");
define("_MI_LIBRARY_IMAGE_WIDTH", "Maximale weergavebreedte afbeelding (pixels)");
define("_MI_LIBRARY_IMAGE_WIDTHDSC", "De breedte waarop afbeeldingspublicaties worden weergegeven in de enkele weergavemodus. Afbeeldingen worden geschaald met behoud van aspectratio, volgens de grootste opgegeven dimensie (breedte of hoogte). In werkelijkheid wordt beeldschaling beperkt door ofwel de breedte of de hoogte die u heeft opgegeven, maar niet beide.");
define("_MI_LIBRARY_IMAGE_UPLOAD_HEIGHT", "Maximale HOGTE van geüploade afbeeldingen (pixels)");
define("_MI_LIBRARY_IMAGE_UPLOAD_HEIGHTDSC", "Dit is de maximale toegestane hoogte voor geüploade afbeeldingen. Vergeet niet dat afbeeldingen automatisch worden geschaald voor weergave, dus het is ok om grotere afbeeldingen toe te staan dan u eigenlijk gaat gebruiken. Het geeft uw site wat flexibiliteit als u later besluit de weergave-instellingen aan te passen.");
define("_MI_LIBRARY_IMAGE_UPLOAD_WIDTH", "Maximale BREEDTE van geüploade afbeeldingen (pixels)");
define("_MI_LIBRARY_IMAGE_UPLOAD_WIDTHDSC", "Dit is de maximale toegestane breedte voor geüploade afbeeldingen. Vergeet niet dat afbeeldingen automatisch worden geschaald voor weergave, dus het is ok om grotere afbeeldingen toe te staan dan u eigenlijk gaat gebruiken. Het geeft uw site wat flexibiliteit als u later besluit de weergave-instellingen aan te passen.");
define("_MI_LIBRARY_IMAGE_FILE_SIZE", "Maximale BESTANDSGROOTTE van geüploade afbeeldingen (bytes)");
define("_MI_LIBRARY_IMAGE_FILE_SIZEDSC", "Dit is de maximale grootte (in bytes) die voor afbeeldingsuploads wordt toegestaan.");
define("_MI_LIBRARY_COLLECTIONSDSC", "Toont een lijst van bibliotheekcollecties");
define("_MI_LIBRARY_NEW_ITEMS", "Nieuwe publicaties");
define("_MI_LIBRARY_NEW_ITEMSDSC", "Bij het bekijken van de pagina met nieuwe publicaties");
define("_MI_LIBRARY_PUBLICATION_INDEX_DISPLAY_MODE", "Toont de publicatie-indexpagina als lijst van samenvattingen?");
define("_MI_LIBRARY_NEW_VIEW_MODE", "Nieuwe collecties standaard in compacte weergave tonen?");
define("_MI_LIBRARY_NEW_VIEW_MODEDSC", "Hiermee wordt de standaardwaarde ingesteld in het formulier 'collectie toevoegen' voor gebruiksgemak. U kunt dit overschrijven. Compacte weergave toont geen publicatiebeschrijvingen, het is ideaal voor collecties waar liditems normaal gesproken geen beschrijvingen hebben, zoals muziekalbums. Als uw tracks wel beschrijvingen hebben, kies dan de uitgebreide weergave die aantrekkelijker is.");
define("_MI_LIBRARY_NUMBER_RSS_ITEMS", "Aantal publicaties in RSS-feeds");
define("_MI_LIBRARY_NUMBER_RSS_ITEMSDSC", "Regelt het aantal recente publicaties dat verschijnt in RSS-feeds doorheen de module.");
define("_MI_LIBRARY_RECENT", "Nieuwe publicaties");
define("_MI_LIBRARY_RECENTDSC", "Toont een lijst van de meest recente publicaties");
define("_MI_LIBRARY_SCREENSHOT_HEIGHT", "Screenshot hoogte (in pixels)");
define("_MI_LIBRARY_SCREENSHOT_HEIGHTDSC", "Deze waarde wordt gebruikt om de hoogte te schalen waarop screenshotafbeeldingen worden weergegeven. Het aspectverhouding zal behouden blijven.");
define("_MI_LIBRARY_SCREENSHOT_WIDTH", "Screenshot breedte (in pixels)");
define("_MI_LIBRARY_SCREENSHOT_WIDTHDSC", "Screenshots zijn de coverart/afbeeldingen die worden weergegeven wanneer een publicatie in de enkele weergavemodus wordt bekeken (behalve voor 'afbeelding'-type publicaties, die standaard aanzienlijk groter worden weergegeven. Deze waarde wordt gebruikt om de breedte te schalen waarop afbeeldingen worden weergegeven. Het aspectverhouding zal behouden blijven, dus het is de grootste van de breedte- en hoogtevoorkeuren die de beperking vormt.");
define("_MI_LIBRARY_NUMBER_PUBLICATIONS", "Aantal publicaties om op één pagina weer te geven");
define("_MI_LIBRARY_NUMBER_PUBLICATIONSSDSC", "Bij het bekijken van de publicatie-indexpagina is dit het maximale aantal publicaties dat in een enkele weergave wordt getoond. Als er meer zijn, worden paginabeheercontroles ingevoegd.");
define("_MI_LIBRARY_NUMBER_COLLECTIONS", "Aantal collecties om op één pagina weer te geven");
define("_MI_LIBRARY_NUMBER_COLLECTIONSDSC", "Bij het bekijken van de collectie-indexpagina is dit het maximale aantal collecties dat in een enkele weergave wordt getoond. Als er meer zijn, worden paginabeheercontroles ingevoegd.");
define("_MI_LIBRARY_NEW", "Nieuw");
define("_MI_LIBRARY_META_DESCRIPTION", "Meta-omschrijving publicatie-index");
define("_MI_LIBRARY_META_DESCRIPTIONDSC", "Wordt gebruikt om de beschrijving-meta tag aan te passen op de publicatie-indexpagina's van de bibliotheekmodule. De beschrijvingen van andere indexpagina's (tag, open archief) bevinden zich in de taalbestanden.");
define("_MI_LIBRARY_META_KEYWORDS", "Meta-sleutelwoorden publicatie-index");
define("_MI_LIBRARY_META_KEYWORDSDSC", "Wordt gebruikt om de sleutelwoorden-meta tag aan te passen op de publicatie-indexpagina van de bibliotheekmodule. Splits sleutelwoorden met een komma.");

// Display preferences
define("_MI_LIBRARY_SHOW_TAG_SELECT_BOX", "Toon tags selectievakje");
define("_MI_LIBRARY_SHOW_TAG_SELECT_BOX_DSC", "Schakelt het tags selectievakje aan/uit voor de projecten-indexpagina (alleen als Sprockets-module geïnstalleerd).");
define("_MI_LIBRARY_DISPLAY_COUNTER", "Aantal bekeken");
define("_MI_LIBRARY_DISPLAY_COUNTERDSC", "Zichtbaarheid schakelen in gebruikers-template");
define("_MI_LIBRARY_DISPLAY_CREATOR", "Auteur veld weergeven");
define("_MI_LIBRARY_DISPLAY_CREATORDSC", "Schakelt zichtbaarheid in gebruikers-template");
define("_MI_LIBRARY_DISPLAY_DATE", "Datum veld weergeven");
define("_MI_LIBRARY_DISPLAY_DATEDSC", "Schakelt zichtbaarheid in gebruikers-template");
define("_MI_LIBRARY_DATE_FORMAT", "Datumformaat");
define("_MI_LIBRARY_DATE_FORMAT_DSC", "U kunt het tijdstip op uw publicatie formatteren door de formaatstring te wijzigen volgens de PHP date() functie. Zie de PHP-handboek voor formatcodes.");
define("_MI_LIBRARY_DISPLAY_FORMAT", "Formaat veld weergeven");
define("_MI_LIBRARY_DISPLAY_FORMATDSC", "Schakelt zichtbaarheid in gebruikers-template");
define("_MI_LIBRARY_DISPLAY_FILE_SIZE", "Bestandsgrootte weergeven");
define("_MI_LIBRARY_DISPLAY_FILE_SIZEDSC", "Schakelt zichtbaarheid in gebruikers-template");
define("_MI_LIBRARY_DISPLAY_PUBLISHER", "Uitgever veld weergeven");
define("_MI_LIBRARY_DISPLAY_PUBLISHERDSC", "Schakelt zichtbaarheid in gebruikers-template");
define("_MI_LIBRARY_DISPLAY_LANGUAGE", "Taal veld weergeven");
define("_MI_LIBRARY_DISPLAY_LANGUAGEDSC", "Schakelt zichtbaarheid in gebruikers-template");
define("_MI_LIBRARY_DISPLAY_RIGHTS", "Rechten veld weergeven");
define("_MI_LIBRARY_DISPLAY_RIGHTSDSC", "Schakelt zichtbaarheid in gebruikers-template");
define("_MI_LIBRARY_DISPLAY_SOURCE", "Bron veld weergeven");
define("_MI_LIBRARY_DISPLAY_SUBMITTER", "Indienster veld weergeven");
define("_MI_LIBRARY_PUBLICATION_ADD", "Publicatie indienen");

// Menu
define("_MI_LIBRARY_PUBLICATION_NEW", "Nieuw");
define("_MI_LIBRARY_TAG_DIRECTORY", "Tags");
define("_MI_LIBRARY_CATEGORY_DIRECTORY", "Categorieën");
define("_MI_LIBRARY_TIMELINE_DIRECTORY", "Tijdbaan");
define("_MI_LIBRARY_OPEN_ARCHIVES_INITIATIVE", "Open archief");

// Page titles
define("_MI_LIBRARY_TIMELINE", "Publicatietijdbaan");
define("_MI_LIBRARY_ALL_TAGS", "Publicaties per tag");
define("_MI_LIBRARY_ALL_CATEGORIES", "Publicaties per categorie");

// Additional admin menu items
define("_MI_LIBRARY_TEMPLATES", "Sjablonen");
define("_MI_LIBRARY_MANUAL", "Handleiding");

// Notifications - categories
define("_MI_LIBRARY_GLOBAL_NOTIFY", "Alle inhoud");
define("_MI_LIBRARY_GLOBAL_NOTIFY_DSC", "Meldingen gerelateerd aan alle publicaties en collecties in deze module");

define("_MI_LIBRARY_PUBLICATION_NOTIFY", "Publicatie");
define("_MI_LIBRARY_PUBLICATION_NOTIFY_DSC", "Meldingen gerelateerd aan individuele publicaties");

// Notifications - events
define("_MI_LIBRARY_GLOBAL_PUBLICATION_PUBLISHED_NOTIFY", "Nieuwe publicatie gepubliceerd");
define("_MI_LIBRARY_GLOBAL_PUBLICATION_PUBLISHED_NOTIFY_CAP", "Kijk uit naar een melding wanneer een nieuwe publicatie wordt gepubliceerd.");
define("_MI_LIBRARY_GLOBAL_PUBLICATION_PUBLISHED_NOTIFY_DSC", "Ontvang een melding wanneer een nieuwe publicatie wordt gepubliceerd.");
define("_MI_LIBRARY_GLOBAL_PUBLICATION_PUBLISHED_NOTIFY_SBJ",
		"New publication published at {X_SITENAME}");

// Updated in V1.03
define("_MI_LIBRARY_PUBLICATION_INDEX_DISPLAY_MODEDSC", "Schakelt hoe de nieuwe publicatie-indexpagina wordt weergegeven. Kies 'ja' om beschrijvende samenvattingen van elke publicatie weer te geven (het is aantrekkelijker en helpt bij navigatie door screenshots ingeschakeld zijn). Kies 'nee' om een samenvattings tabel weer te geven.");
