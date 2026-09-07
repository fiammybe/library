<?php
/**
 * Class representing Library publication objects
 *
 * @copyright    Copyright Madfish (Simon Wilkinson) 2012
 * @license        http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since        1.0
 * @author        Madfish (Simon Wilkinson) <simon@isengard.biz>
 * @package        library
 * @version        $Id$
 */

namespace src\class;

use icms;
use icms_ipf_Controller;
use icms_ipf_object;
use icms_ipf_seo_Object;
use icms_member_user_Handler;
use str;

defined("ICMS_ROOT_PATH") or die("ICMS root path not defined");

class mod_library_Publication extends icms_ipf_seo_Object
{
    /**
     * Constructor
     *
     * @param mod_library_Publication $handler Object handler
     */
    public function __construct(&$handler)
    {
        icms_ipf_object::__construct($handler);
        icms::handler("icms_module")->getByDirname('library');

        $this->quickInitVar("publication_id", XOBJ_DTYPE_INT, true);
        $this->quickInitVar("type", XOBJ_DTYPE_TXTBOX, true);
        $this->quickInitVar("title", XOBJ_DTYPE_TXTBOX, true);
        $this->quickInitVar("identifier", XOBJ_DTYPE_TXTBOX, false);
        $this->quickInitVar("creator", XOBJ_DTYPE_TXTBOX, false);
        $this->initNonPersistableVar('tag', XOBJ_DTYPE_INT, 'tag', false, false, false, true);
        $this->initNonPersistableVar(
            'category',
            XOBJ_DTYPE_INT,
            'category',
            false,
            false,
            false,
            true
        );
        $this->quickInitVar("description", XOBJ_DTYPE_TXTAREA, true);
        $this->quickInitVar("extended_text", XOBJ_DTYPE_TXTAREA, false);
        $this->quickInitVar("format", XOBJ_DTYPE_TXTBOX, true);
        $this->quickInitVar("file_size", XOBJ_DTYPE_INT, false);
        $this->quickInitVar("image", XOBJ_DTYPE_IMAGE, false);
        $this->quickInitVar("date", XOBJ_DTYPE_STIME, false);
        $this->quickInitVar("source", XOBJ_DTYPE_TXTBOX, false);
        $this->quickInitVar(
            "language",
            XOBJ_DTYPE_TXTBOX,
            false,
            false,
            false,
            icms_getConfig('default_language', 'library')
        );
        $this->quickInitVar("rights", XOBJ_DTYPE_TXTBOX, true);
        $this->quickInitVar("publisher", XOBJ_DTYPE_TXTBOX, false);
        $this->quickInitVar("compact_view", XOBJ_DTYPE_INT, false, false, false, 0);
        $this->quickInitVar("online_status", XOBJ_DTYPE_INT, true, false, false, 1);
        $this->quickInitVar(
            "federated",
            XOBJ_DTYPE_INT,
            true,
            false,
            false,
            icms_getConfig('library_default_federation', 'library')
        );
        $this->quickInitVar("submission_time", XOBJ_DTYPE_LTIME, true);
        $this->quickInitVar("submitter", XOBJ_DTYPE_INT, true);
        $this->quickInitVar(
            "oai_identifier",
            XOBJ_DTYPE_TXTBOX,
            true,
            false,
            false,
            $this->handler->setOaiId()
        );
        $this->quickInitVar('notification_sent', XOBJ_DTYPE_INT, true, false, false, 0);
        $this->initCommonVar("counter");
        $this->initCommonVar("dohtml", false, true); // HTML tags always enabled
        $this->initCommonVar("dobr", true, false); // Linebreaks optional, default off

        $this->initiateSEO();

        // Enable HTML editors
        $this->setControl('description', 'dhtmltextarea');
        $this->setControl('extended_text', 'dhtmltextarea');

        $this->setControl('type', [
            'name' => 'select',
            'itemHandler' => 'publication',
            'method' => 'getTypeOptions',
            'module' => 'library',
            'onSelect' => 'submit'
        ]);

        // Only display the tag / category / rights fields if the sprockets module is installed
        icms_getModuleInfo('sprockets');
        if (icms_get_module_status("sprockets")) {
            $this->setControl('tag', [
                'name' => 'selectmulti',
                'itemHandler' => 'tag',
                'method' => 'getTags',
                'module' => 'sprockets'
            ]);

            $this->setControl('category', [
                'name' => 'selectmulti',
                'itemHandler' => 'tag',
                'method' => 'getCategoryOptions',
                'module' => 'sprockets'
            ]);

            $this->setControl('rights', [
                'itemHandler' => 'rights',
                'method' => 'getRights',
                'module' => 'sprockets'
            ]);
        } else {
            $this->hideFieldFromForm('tag');
            $this->hideFieldFromSingleView('tag');
            $this->hideFieldFromForm('category');
            $this->hideFieldFromSingleView('category');
            $this->hideFieldFromForm('rights');
            $this->hideFieldFromSingleView('rights');
            $this->setFieldAsRequired('rights', false);
        }

        $this->setControl('format', [
            'name' => 'select',
            'itemHandler' => 'publication',
            'method' => 'getFormatOptions',
            'module' => 'library'
        ]);

        $this->setControl("image", "imageupload");

        // Set uploads directory for images
        $this->setControl('image', ['name' => 'image']);
        $url = ICMS_URL . '/uploads/' . basename(dirname(__FILE__, 2)) . '/';
        $path = ICMS_ROOT_PATH . '/uploads/' . basename(dirname(__FILE__, 2)) . '/';
        $this->setImageDir($url, $path);

        $this->setControl('source', [
            'itemHandler' => 'publication',
            'method' => 'getSourceList',
            'module' => 'library'
        ]);

        $this->setControl('language', [
            'name' => 'select',
            'itemHandler' => 'publication',
            'method' => 'getLanguageOptions',
            'module' => 'library'
        ]);

        $this->setControl('submitter', 'user');
        $this->setControl('compact_view', 'yesno');
        $this->setControl('online_status', 'yesno');
        $this->setControl('federated', 'yesno');

        // MANDATORY CONTROL VIEW SETTINGS:

        // Make the oai_identifier read only for OAIPMH archive integrity purposes. These must
        // never change as external harvesters use them as markers to detect duplicate records
        $this->doMakeFieldreadOnly('oai_identifier');

        // For backend use only - tracking notifications for this object
        $this->hideFieldFromForm('notification_sent');
        $this->hideFieldFromSingleView('notification_sent');

        // For backend use only - compact view is only available to Collection type publications
        $this->doHideFieldFromForm('compact_view');
        $this->hideFieldFromSingleView('compact_view');
    }

    /**
     * Overriding the icms_ipf_Object::getVar method to assign a custom method on some
     * specific fields to handle the value before returning it
     *
     * @param str $key key of the field
     * @param str $format format that is requested
     * @return mixed value of the field that is requested
     */
    public function getVar($key, $format = "s")
    {
        if ($format == "s" && in_array($key, [
                'creator',
                'date',
                'file_size',
                'image',
                'language',
                'rights',
                'source',
                'online_status',
                'federated',
                'submitter',
                'submission_time',
                'format',
                'oai_identifier'
            ])) {
            return call_user_func([$this, $key]);
        }

        return parent::getVar($key, $format);
    }

    /*
     * Converts pipe-delimited creator field to comma separated for user side presentation
    */
    public function creator()
    {
        $creator = $this->getVar('creator', 'e');
        if ($creator) {
            $creator = str_replace("|", ", ", $creator);
        }

        return $creator;
    }

    /*
     * Formats the date in a sane (non-American) way
    */
    public function date()
    {
        $date = $this->getVar('date', 'e');
        if ($date) {
            $date = date(icms_getConfig('date_format', 'library'), $date);
        }

        return $date;
    }

    /*
     * Converts federated field to human readable value
    */

    public function federated()
    {
        $button = '';
        $this->getVar('type', 'e');
        $federated = $this->getVar('federated', 'e');
        $button = '<a href="' . ICMS_URL . '/modules/' . basename(dirname(__FILE__, 2))
            . '/admin/publication.php?publication_id=' . $this->getVar('publication_id')
            . '&amp;op=changeFederated">';

        if ($federated == false) {
            $button .= '<img src="' . ICMS_IMAGES_SET_URL . '/actions/button_cancel.png" alt="'
                . _CO_LIBRARY_PUBLICATION_OFFLINE . '" title="'
                . _CO_LIBRARY_PUBLICATION_NOT_FEDERATED . '" /></a>';
        } else {
            $button .= '<img src="' . ICMS_IMAGES_SET_URL . '/actions/button_ok.png" alt="'
                . _CO_LIBRARY_PUBLICATION_ONLINE . '" title="'
                . _CO_LIBRARY_PUBLICATION_FEDERATED . '" /></a>';
        }

        return $button;
    }

    /*
     * Utility to convert bytes to a more readable form (KB, MB etc)
    */
    public function file_size()
    {
        $unit = '';
        $value = '';
        $bytes = $this->getVar('file_size', 'e');

        if ($bytes == 0 || $bytes < 1024) {
            $unit = ' bytes';
            $value = $bytes;
        } elseif ($bytes > 1023 && $bytes < 1048576) {
            $unit = ' KB';
            $value = ($bytes / 1024);
        } elseif ($bytes > 1048575 && $bytes < 1073741824) {
            $unit = ' MB';
            $value = ($bytes / 1048576);
        } else {
            $unit = ' GB';
            $value = ($bytes / 1073741824);
        }

        $value = round($value, 2);

        return $value . ' ' . $unit;
    }

    /*
     * Converts mimetype id to human readable value (extension)
    */
    public function format()
    {
        if ($this->getVar('format', 'e') !== 0) {
            $system_mimetype_handler = icms_getModuleHandler('mimetype', 'system');
            $mimetypeObj = $system_mimetype_handler->get($this->getVar('format', 'e'));
            return $mimetypeObj->getVar('extension');
        } else {
            return false;
        }
    }

    /*
     * Generates a html snippet for visualising the image
     */
    public function image()
    {
        $image = $this->getVar('image', 'e');
        if ($image) {
            $image_for_display = '<img src="' . $this->getImageDir() . $image
                . '" alt="' . $this->getVar('title')
                . '" title="' . $this->getVar('title') . '" />';
        }

        return $image_for_display;
    }

    /*
     * Converts the language key to a human readable title
    */
    public function language()
    {
        $language_key = $this->getVar('language', 'e');
        if ($language_key) {
            $language_list = $this->handler->getLanguageOptions();
            return $language_list[$language_key];
        }
    }

    /*
     * Converts the rights id to a human readable title
    */
    public function rights()
    {
        $sprocketsModule = icms_getModuleInfo('sprockets');

        if (icms_get_module_status("sprockets")) {
            $rights_id = $this->getVar('rights', 'e');
            $sprockets_rights_handler = icms_getModuleHandler(
                'rights',
                $sprocketsModule->getVar('dirname'),
                'sprockets'
            );
            $rights_object = $sprockets_rights_handler->get($rights_id);
            return $rights_object->getItemLink();
        } else {
            return false;
        }
    }

    /*
     * Converts the oai_identifier to a permalink
     */
    public function oai_identifier()
    {
        $oai_identifier = $this->getVar('oai_identifier', 'e');
        return '<a href="' . ICMS_URL . '/modules/' . basename(dirname(__FILE__, 2))
            . '/permalink.php?id=' . $oai_identifier . '">'
            . _CO_LIBRARY_PUBLICATION_PERMALINK . '</a>';
    }

    /*
     * Converts the source (publication/collection) id to a human readable title with link
    */
    public function source()
    {
        $source = $this->getVar('source', 'e');

        if (!empty($source)) {
            $library_publication_handler = icms_getModuleHandler(
                'publication',
                basename(dirname(__FILE__, 2)),
                'library'
            );
            $publicationObj = $library_publication_handler->get($source);
            if ($publicationObj) {
                return $publicationObj->getItemLink();
            }
        }

        return false;
    }

    /*
     * Converts status field to clickable icon that can change status
    */
    public function online_status()
    {
        $button = '';
        $this->getVar('type', 'e');
        $status = $this->getVar('online_status', 'e');
        $button = '<a href="' . ICMS_URL . '/modules/' . basename(dirname(__FILE__, 2))
            . '/admin/publication.php?publication_id=' . $this->getVar('publication_id')
            . '&amp;op=changeStatus">';

        if ($status == '1') {
            $button .= '<img src="' . ICMS_IMAGES_SET_URL . '/actions/button_ok.png" alt="'
                . _CO_LIBRARY_PUBLICATION_ONLINE . '" title="'
                . _CO_LIBRARY_PUBLICATION_ONLINE . '" /></a>';
        } else {
            $button .= '<img src="' . ICMS_IMAGES_SET_URL . '/actions/button_cancel.png" alt="'
                . _CO_LIBRARY_PUBLICATION_ONLINE . '" title="'
                . _CO_LIBRARY_PUBLICATION_ONLINE . '" /></a>';
        }

        return $button;
    }

    /*
     * Converts user id to human readable user name
    */
    public function submitter()
    {
        return icms_member_user_Handler::getUserLink($this->getVar('submitter', 'e'));
    }

    /*
     * Converts the submission time to human readable
     */

    public function submission_time()
    {
        $submission_time = $this->getVar('submission_time', 'e');
        return date(icms_getConfig('date_format', 'library'), $submission_time);
    }

    /**
     * Load tags linked to this publication
     *
     * @return void
     */
    public function loadTags()
    {
        $ret = [];

        // Retrieve the tags for this object
        $sprocketsModule = icms_getModuleInfo('sprockets');
        if (icms_get_module_status("sprockets")) {
            $sprockets_taglink_handler = icms_getModuleHandler(
                'taglink',
                $sprocketsModule->getVar('dirname'),
                'sprockets'
            );
            $ret = $sprockets_taglink_handler->getTagsForObject(
                $this->id(),
                $this->handler,
                '0'
            ); // label_type = 0 means only return tags
            $this->setVar('tag', $ret);
        }
    }

    /**
     * Load categories linked to this publication
     *
     * @return void
     */
    public function loadCategories()
    {
        $ret = [];

        // Retrieve the categories for this object
        $sprocketsModule = icms_getModuleInfo('sprockets');
        if (icms_get_module_status("sprockets")) {
            $sprockets_taglink_handler = icms_getModuleHandler(
                'taglink',
                $sprocketsModule->getVar('dirname'),
                'sprockets'
            );
            $ret = $sprockets_taglink_handler->getTagsForObject(
                $this->id(),
                $this->handler,
                '1'
            ); // label_type = 1 means only return categories
            $this->setVar('category', $ret);
        }
    }

    /**
     * Shows, hides fields and sets requirement status of fields according to publication type.
     *
     * Modifies the publication submission form to suit the type of publication currently selected.
     * It also tries to protect the user by enforcing required fields where possible. However, the
     * user must still use their brain occasionally to make sensible decisions. See the user manual
     * for guidance on use of the publication submission form.
     */
    public function contextualiseFormFields()
    {
        switch ($this->getVar('type', 'e')) {
            case 'Text':
                // Identifier and file size are optional, for example a text-only article displayed
                // on screen doesn't need them. However, a downloadable PDF version of an
                // article *does*. Admins need to make intelligent choices when submitting items.
                $this->setFieldAsRequired('description', true);
                break;

            case 'Image':
                // If the object is an image, then the image field is required. Only local images
                // are allowed for integrity reasons, therefore the identifier field is hidden.
                // IPF bug: Setting image fields as required doesn't seem to work.
                $this->setFieldAsRequired('image', true);
                $this->setFieldAsRequired('file_size', true);
                $this->setFieldAsRequired('format', true);

                $this->doHidefieldFromForm('identifier');
                $this->hideFieldFromSingleView('identifier');
                $this->setVar('identifier', '');

                $this->doHidefieldFromForm('language');
                $this->setVar('language', 0);
                break;

            case 'MovingImage':
                // Can support embedded or downloadable videos, therefore identifier, file size and
                // format are optional. However, maybe the module should just target linked files
                // (no embedded Youtube videos!) for reasons of archive integrity. I'll think about it.
                // Problem is, if file size is not set as required, failing to declare a file size
                // of a linked video file can break Podcasting clients and streams.
                break;

            case 'Sound':
                // Sound files require a URL to the resource. The format and file size are required
                // as these are important for correct representation of media enclosures in RSS /
                // podcasting fields.
                $this->setFieldAsRequired('identifier', true);
                $this->setFieldAsRequired('file_size', true);
                $this->setFieldAsRequired('format', true);
                break;

            case 'Dataset':
            case 'Software':
                // Downloadable items, identifier, file size and format are required.
                $this->setFieldAsRequired('identifier', true);
                $this->setFieldAsRequired('description', true);
                $this->setFieldAsRequired('file_size', true);
                $this->setFieldAsRequired('format', true);
                break;

            case 'Collection';
                // Collections do not *have* to be downloadable entities (for example, could be a
                // text description of an album, with individually downloadable soundtracks,
                // so identifier, file size and format are optional. Compact view is a setting that
                // is only available to collections; it displays the related works as a simple list
                // to save space (or in cases where the related works don't have a description,
                // which is often the case with soundtracks that are part of an album).
                $this->setFieldAsRequired('description', true);
                $this->setVar('source', 0);
                $this->doHideFieldFromForm('source');
                $this->hideFieldFromSingleView('source');
                $this->doShowFieldOnForm('compact_view');
                break;

            default:
        }
    }

    /*
     * Performs the same function as toArray(), but does not permit getVar() overrides for specified
     * fields (ie. those requiring query lookups), so that they can be *manually* overriden from
     * buffers. This can substantially reduce the number of queries when converting a large number
     * of objects (for example, on an index page).
     */
    public function toArrayWithoutOverrides()
    {
        $ret = [];
        $vars = [];
        // These are the properties that we don't want converted, because each one costs a query
        $blacklisted_vars = ['rights', 'format'];

        $vars = $this->getVars();
        foreach ($vars as $key => $var) {
            if (in_array($key, $blacklisted_vars)) {
                $value = $this->getVar($key, 'e');
                $ret[$key] = $value;
            } else {
                $value = $this->getVar($key);
                $ret[$key] = $value;
            }
        }

        if ($this->handler->identifierName != "") {
            $controller = new icms_ipf_Controller($this->handler);
            /**
             * Addition of some automatic value
             */
            $ret['itemLink'] = $controller->getItemLink($this);
            $ret['itemUrl'] = $controller->getItemLink($this, true);
            $ret['editItemLink'] = $controller->getEditItemLink($this, false, true);
            $ret['deleteItemLink'] = $controller->getDeleteItemLink($this, false, true);
            $ret['printAndMailLink'] = $controller->getPrintAndMailLink($this);
        }

        return $ret;
    }

    public function initiateStreaming()
    {
        $identifier = $this->getVar('identifier');
        if (!empty ($identifier)) {
            // Update counter
            if (!icms_userIsAdmin(icms::$module->getVar('dirname'))) {
                $this->handler->updateCounter($publicationObj);
            }

            // Send playlist headers to the browser, followed by the audio file URL as contents (iso-8859-1 charset is standard for m3u)
            header(
                'Content-Type: audio/x-mpegurl audio/mpeg-url application/x-winamp-playlist audio/scpls audio/x-scpls; charset=iso-8859-1'
            );
            header("Content-Disposition:inline;filename=stream_soundtrack.m3u");

            // Less widely recognised m3u8 alternative playlist format for utf-8 - use INSTEAD of the two lines above, if you need this:
            // header ('Content-Type: audio/x-mpegurl audio/mpeg-url application/x-winamp-playlist audio/scpls audio/x-scpls; charset=utf-8');
            // header("Content-Disposition:inline;filename=stream_soundtrack.m3u8");

            echo $identifier;
            exit();
        }
    }

    /**
     * Customise object itemLink to append the SEO-friendly string.
     */
    public function getItemLinkWithSEOString()
    {
        $short_url = $this->short_url();
        if (!empty($short_url)) {
            $seo_url = '<a href="' . $this->getItemLink(true) . '&amp;title=' . $this->short_url()
                . '">' . $this->getVar('title', 'e') . '</a>';
        } else {
            $seo_url = $this->getItemLink(false);
        }

        return $seo_url;
    }

    /**
     * View publication within admin page
     */
    public function getAdminViewItemLink()
    {
        return '<a href="' . LIBRARY_ADMIN_URL . 'publication.php?op=view&amp;publication_id='
            . $this->getVar('publication_id', 'e') . '" title="' . _CO_LIBRARY_PUBLICATION_VIEW
            . '">' . $this->getVar('title') . '</a>';
    }

    /*
     * Sends notifications to subscribers when a new publication is published, called by afterSave()
    */
    public function sendNotifPublicationPublished()
    {
        global $icmsConfig;

        $this->id();
        $this->getVar('source', 'e');
        $libraryModule = icms::handler("icms_module")->getByDirname('library');
        $module_id = $libraryModule->getVar('mid');
        $notification_handler = icms::handler('icms_data_notification');

        $tags = [];
        $tags['ITEM_TITLE'] = $this->getVar('title', 'e');
        $tags['ITEM_URL'] = $this->getItemLink(false); // Get a title *with* link
        $tags['PUBLICATION_NAME'] = $this->getVar('source', 's');
        $tags['SITE_LINK'] = '<a href="' . $icmsConfig['sitename'] . '">' . ICMS_URL . '</a>';
        $tags['UPDATE_YOUR_DESCRIPTIONS'] = '<a href="' . ICMS_URL . '/notifications.php">' . _CO_LIBRARY_PUBLICATION_UPDATE_YOUR_SUBSCRIPTIONS . '</a>';

        // Global notification
        // $category, $item_id, $events, $extra_tags=array(), $user_list=array(), $module_id=null, $omit_user_id=null
        $notification_handler->triggerEvent('global', 0, 'publication_published', $tags, [], $module_id, 0);
    }
}
