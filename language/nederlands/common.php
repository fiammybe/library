<?php
/**
 * Nederlandse taal constanten gebruikt in de module
 *
 * @copyright	Copyright fiammybe (David Janssens) 2026
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since		1.0
 * @author		fiammybe (David Janssens) <david.j@impresscms.org>
 * @package		library
 * @version		$Id$
 */

defined("ICMS_ROOT_PATH") or die("ICMS root pad niet gedefinieerd");

// Publication
define("_CO_LIBRARY_PUBLICATION_TYPE", "Type");
define("_CO_LIBRARY_PUBLICATION_TYPE_DSC", "Selecteer het type publicatie dat u wilt invoeren. De pagina wordt opnieuw geladen met de juiste gegevensinvoervelden.");
define("_CO_LIBRARY_PUBLICATION_TITLE", "Titel");
define("_CO_LIBRARY_PUBLICATION_TITLE_DSC", "Naam van de publicatie.");
define("_CO_LIBRARY_PUBLICATION_IDENTIFIER", "URL");
define("_CO_LIBRARY_PUBLICATION_IDENTIFIER_DSC", "De link om het bijbehorende bestand te downloaden (indien aanwezig).");
define("_CO_LIBRARY_PUBLICATION_CREATOR", "Maker");
define("_CO_LIBRARY_PUBLICATION_CREATOR_DSC", "Scheiding van meerdere auteurs met een pipe &#039;|&#039; teken. Gebruik een conventie voor consistentie, bijv. John Smith|Jane Doe.");
define("_CO_LIBRARY_PUBLICATION_TAG", "Tags");
define("_CO_LIBRARY_PUBLICATION_TAG_DSC", "Selecteer de tags (onderwerpen) die u aan dit object wilt toewijzen.");
define("_CO_LIBRARY_PUBLICATION_CATEGORY", "Categorieën");
define("_CO_LIBRARY_PUBLICATION_CATEGORY_DSC", "Selecteer de categorieën waartoe dit object behoort.");
define("_CO_LIBRARY_PUBLICATION_DESCRIPTION", "Beschrijving (samenvatting)");
define("_CO_LIBRARY_PUBLICATION_DESCRIPTION_DSC", "Een samenvattende beschrijving of abstract van de publicatie. Het wordt weergegeven wanneer meerdere publicaties op een pagina worden vermeld en in OAIPMH-responses. Het is een belangrijk veld voor de presentatie aan de gebruikerszijde. Lever altijd een beschrijving indien mogelijk.");
define("_CO_LIBRARY_PUBLICATION_EXTENDED_TEXT", "Uitgebreide (volledige) tekst");
define("_CO_LIBRARY_PUBLICATION_EXTENDED_TEXT_DSC", "Optioneel. Dit is een alternatieve beschrijving die wordt weergegeven in de weergave van een enkele publicatie. Als het leeg wordt gelaten, wordt in plaats daarvan het beschrijvingsveld gebruikt. U hoeft dit veld alleen te gebruiken als u een volledige beschrijving wilt hebben die te lang is om comfortabel te bekijken wanneer meerdere publicaties op een pagina worden vermeld.");
define("_CO_LIBRARY_PUBLICATION_PUBLISHER", "Uitgever");
define("_CO_LIBRARY_PUBLICATION_PUBLISHER_DSC", "Het agentschap dat verantwoordelijk is voor het publiceren van dit werk.");
define("_CO_LIBRARY_PUBLICATION_FORMAT", "Formaat");
define("_CO_LIBRARY_PUBLICATION_FORMAT_DSC", "U kunt meer bestandsformaten (mimetypes) aan deze lijst toevoegen door de Library-module toestemming te geven om ze te gebruiken in de Mimetype Manager van de Systeemmodule.");
define("_CO_LIBRARY_PUBLICATION_FILE_SIZE", "Bestandsgrootte");
define("_CO_LIBRARY_PUBLICATION_FILE_SIZE_DSC", "Voer in BYTES in, het wordt automatisch omgezet naar een leesbaar formaat. Dit is de grootte van het bestand dat is opgegeven in het URL-veld, indien aanwezig.");
define("_CO_LIBRARY_PUBLICATION_IMAGE", "Afbeelding");
define("_CO_LIBRARY_PUBLICATION_IMAGE_DSC", "Upload hier publicaties van het type 'Afbeelding', publicatieomslagen en albumillustraties. De maximale afbeeldingsbreedte, -hoogte en bestandsgrootte kunnen worden aangepast in de voorkeuren. Afbeeldingstypen zijn momenteel beperkt tot PNG, GIF en JPG.");
define("_CO_LIBRARY_PUBLICATION_DATE", "Datum");
define("_CO_LIBRARY_PUBLICATION_DATE_DSC", "Publicatiedatum van dit werk.");
define("_CO_LIBRARY_PUBLICATION_SOURCE", "Bron");
define("_CO_LIBRARY_PUBLICATION_SOURCE_DSC", "Een collectie waarvan deze publicatie deel uitmaakt, bijvoorbeeld een wetenschappelijk tijdschrift waartoe een artikel behoort, een album waarin een soundtrack is opgenomen, of een evenement waarbij een presentatie werd gegeven.");
define("_CO_LIBRARY_PUBLICATION_LANGUAGE", "Taal");
define("_CO_LIBRARY_PUBLICATION_LANGUAGE_DSC", "Taal van de publicatie, indien aanwezig.");
define("_CO_LIBRARY_PUBLICATION_RIGHTS", "Rechten");
define("_CO_LIBRARY_PUBLICATION_RIGHTS_DSC", "De licentie waaronder deze publicatie wordt verspreid. In de meeste landen zijn artistieke werken auteursrechtelijk beschermd (zelfs als u dit niet aangeeft) tenzij u een andere licentie specificeert.");
define("_CO_LIBRARY_PUBLICATION_COMPACT_VIEW", "Compacte weergave");
define("_CO_LIBRARY_PUBLICATION_COMPACT_VIEW_DSC", "Wilt u deze collectie in compacte vorm weergeven (een eenvoudige inhoudslijst, het beste voor albums en soortgelijke waar lidpublicaties meestal geen beschrijvingen bevatten) of in uitgebreide weergave met beschrijvingen en andere metadata?");
define("_CO_LIBRARY_PUBLICATION_ONLINE_STATUS", "Online status");
define("_CO_LIBRARY_PUBLICATION_ONLINE", "Online");
define("_CO_LIBRARY_PUBLICATION_OFFLINE", "Offline");
define("_CO_LIBRARY_PUBLICATION_ONLINE_STATUS_DSC", "Schakel deze publicatie online of offline.");
define("_CO_LIBRARY_PUBLICATION_FEDERATED", "Gefedereerd");
define("_CO_LIBRARY_PUBLICATION_NOT_FEDERATED", "Niet gefedereerd");
define("_CO_LIBRARY_PUBLICATION_FEDERATED_DSC", "Syndiceer de metadata van deze publicatie met andere sites (cross site search) via het Open Archives Initiative Protocol for Metadata Harvesting?");
define("_CO_LIBRARY_PUBLICATION_SUBMISSION_TIME", "Indieningstijd");
define("_CO_LIBRARY_PUBLICATION_SUBMISSION_TIME_DSC", "");
define("_CO_LIBRARY_PUBLICATION_SUBMITTER", "Indiener");
define("_CO_LIBRARY_PUBLICATION_SUBMITTER_DSC", "");
define("_CO_LIBRARY_PUBLICATION_OAI_IDENTIFIER", "OAI Identifier");
define("_CO_LIBRARY_PUBLICATION_OAI_IDENTIFIER_DSC", "Wordt gebruikt om deze publicatie uniek te identificeren op gefedereerde sites, en voorkomt dat publicaties meerdere keren worden gedupliceerd of geïmporteerd. Mag onder geen enkele omstandigheid worden gewijzigd.");
define("_CO_LIBRARY_PUBLICATION_VIEW", "Bekijk publicatie");
define("_CO_LIBRARY_PUBLICATION_SUBCATEGORY_LISTING", "Subcategorie lijst");
define("_CO_LIBRARY_PUBLICATION_NO_PUBLICATIONS", "Er zijn geen publicaties om weer te geven.");

// Dublin Core Metadata Initiative Type Vocabulary
define("_CO_LIBRARY_TEXT", "Tekst");
define("_CO_LIBRARY_SOUND", "Geluid");
define("_CO_LIBRARY_IMAGE", "Afbeelding");
define("_CO_LIBRARY_MOVINGIMAGE", "Video");
define("_CO_LIBRARY_DATASET", "Dataset");
define("_CO_LIBRARY_SOFTWARE", "Software");
define("_CO_LIBRARY_COLLECTION", "Collectie");

// Filters
define("_CO_LIBRARY_PUBLICATION_FEDERATION_ENABLED", "Federatie ingeschakeld");
define("_CO_LIBRARY_PUBLICATION_FEDERATION_DISABLED", "Federatie uitgeschakeld");

// User side presentation aids
define("_CO_LIBRARY_PUBLICATION_AUTHORS", "Auteur(s):");
define("_CO_LIBRARY_PUBLICATION_PUBLISHED", "Gepubliceerd:");
define("_CO_LIBRARY_PUBLICATION_VIEWS", "bekeken");
define("_CO_LIBRARY_PUBLICATION_DOWNLOAD", "Downloaden");
define("_CO_LIBRARY_PUBLICATION_PERMALINK", "Permalink");
define("_CO_LIBRARY_STREAMING", "Streaming");
define("_CO_LIBRARY_RELATED_WORKS", "Gerelateerde werken");

// RSS feeds
define("_CO_LIBRARY_NEW", "Recente publicaties");
define("_CO_LIBRARY_NEW_DSC", "De nieuwste publicaties van ");
define("_CO_LIBRARY_SUBSCRIBE_RSS", "Abonneer op RSS-feed");
define("_CO_LIBRARY_SUBSCRIBE_RSS_ON", "Abonneer op onze RSS-feed op ");
define("_CO_LIBRARY_ALL", "Alle publicaties");

// Tags
define("_CO_LIBRARY_PUBLICATION_ALL_TAGS", "-- Alle publicaties --");

// Open Archives Initiative Protocol for Metadata Harvesting
define("_CO_LIBRARY_ARCHIVE_MUST_CREATE", "Fout: Een archiefobject moet worden aangemaakt voordat OAIPMH-verzoeken kunnen worden verwerkt. Maak er een aan via het Open Archive-tabblad in de Sprockets-administratie.");
define("_CO_LIBRARY_NO_ARCHIVE", "Er zijn nog geen artikelen om weer te geven.");

// Timeline page
define("_CO_LIBRARY_TIMELINE", "Publicatietijdslijn");
define("_CO_LIBRARY_TIMELINE_DESCRIPTION", "Gearchiveerde publicaties gesorteerd op maand.");
define("_CO_LIBRARY_TIMELINES", "Publicatietijdslijn");
define("_CO_LIBRARY_NO_TIMELINE", "Sorry, er zijn nog geen publicaties om weer te geven.");
define("_CO_LIBRARY_TIMELINE_PUBLICATIONS", "Publicaties");
define("_CO_LIBRARY_TIMELINE_ACTIONS", "Acties");
define("_CO_LIBRARY_TIMELINE_DATE", "Datum");
define("_CO_LIBRARY_TIMELINE_VIEWS", "Bekeken");
define("_CO_LIBRARY_TIMELINE_TAGS", "Tags");
define("_CO_LIBRARY_TIMELINE_TAGS_DESCRIPTION", "Bekijk publicaties gesorteerd op tag.");
define("_CO_LIBRARY_TIMELINE_THEREAREINTOTAL", "Er zijn in totaal ");
define("_CO_LIBRARY_TIMELINE_PUBLICATIONS_LOWER", " publicaties:");
define("_CO_LIBRARY_CAL_JANUARY", "Januari");
define("_CO_LIBRARY_CAL_FEBRUARY", "Februari");
define("_CO_LIBRARY_CAL_MARCH", "Maart");
define("_CO_LIBRARY_CAL_APRIL", "April");
define("_CO_LIBRARY_CAL_MAY", "Mei");
define("_CO_LIBRARY_CAL_JUNE", "Juni");
define("_CO_LIBRARY_CAL_JULY", "Juli");
define("_CO_LIBRARY_CAL_AUGUST", "Augustus");
define("_CO_LIBRARY_CAL_SEPTEMBER", "September");
define("_CO_LIBRARY_CAL_OCTOBER", "Oktober");
define("_CO_LIBRARY_CAL_NOVEMBER", "November");
define("_CO_LIBRARY_CAL_DECEMBER", "December");
define("_CO_LIBRARY_META_TIMELINE_INDEX_DESCRIPTION", "Index van publicaties gesorteerd op datum");

// Download page
define("_CO_LIBRARY_PUBLICATION_UNAVAILABLE", "Sorry, deze publicatie is niet beschikbaar");

// Tag index page
define("_CO_LIBRARY_TAG_INDEX", "Publications: Tags");
define("_CO_LIBRARY_META_TAG_INDEX_DESCRIPTION", "Index of publications sorted by tag");
define("_CO_LIBRARY_CATEGORY_INDEX", "Publications: Categories");

// Notification mail template
define("_CO_LIBRARY_PUBLICATION_UPDATE_YOUR_SUBSCRIPTIONS", "update uw abonnementen");
define("_CO_LIBRARY_PUBLICATION_UNTAGGED", "Untagged");


