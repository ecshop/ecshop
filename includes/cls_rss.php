<?php

if (! defined('IN_ECS')) {
    exit('Hacking attempt');
}

/* ----------------------------------------------------------------------- */
// @package RSSBuilder
// @category FLP
/* ----------------------------------------------------------------------- */
/* ----------------------------------------------------------------------- */
// Abstract class for getting ini preferences
// -------------------------------------------------
// Tested with WAMP (XP-SP1/1.3.24/4.0.12/4.3.0)
// Last change: 2003-05-30
// -------------------------------------------------
// @desc Abstract class for the RSS classes
// @access protected
// @author Michael Wimmer <flaimo@gmx.net>
// @copyright Michael Wimmer
// @link http://www.flaimo.com/
// @global array $GLOBALS['_TICKER_ini_settings']
// @abstract
// @package RSSBuilder
// @category FLP
// @version 1.001
/* ----------------------------------------------------------------------- */

/* ----------------------------------------------------------------------- */
// Class for creating a RSS file
// -------------------------------------------------
// Tested with WAMP (XP-SP1/1.3.24/4.0.12/4.3.0)
// Last change: 2003-05-30
// -------------------------------------------------
// @desc Class for creating a RSS file
// @access public
// @author Michael Wimmer <flaimo@gmx.net>
// @copyright Michael Wimmer
// @link http://www.flaimo.com/
// @example rss_sample_script.php Sample script
// @package RSSBuilder
// @category FLP
// @version 1.001
/* ----------------------------------------------------------------------- */

class RSSBuilder
{
    /* ----------------------------------------------------------------------- */
    /* V A R I A B L E S
    /*-----------------------------------------------------------------------*/

    // -------------------------------------------------
    // encoding of the XML file
    // -------------------------------------------------
    // @desc encoding of the XML file
    // @var string
    // @access private
    // -------------------------------------------------
    public $encoding;

    // -------------------------------------------------
    // URL where the RSS document will be made available
    // -------------------------------------------------
    // @desc URL where the RSS document will be made available
    // @var string
    // @access private
    // -------------------------------------------------
    public $about;

    // -------------------------------------------------
    // title of the rss stream
    // -------------------------------------------------
    // @desc title of the rss stream
    // @var string
    // @access private
    // -------------------------------------------------
    public $title;

    // -------------------------------------------------
    // description of the rss stream
    // -------------------------------------------------
    // @desc description of the rss stream
    // @var string
    // @access private
    // -------------------------------------------------
    public $description;

    // -------------------------------------------------
    // publisher of the rss stream (person, an organization, or a service)
    // -------------------------------------------------
    // @desc publisher of the rss stream
    // @var string
    // @access private
    // -------------------------------------------------
    public $publisher;

    // -------------------------------------------------
    // creator of the rss stream (person, an organization, or a service)
    // -------------------------------------------------
    // @desc creator of the rss stream
    // @var string
    // @access private
    // -------------------------------------------------
    public $creator;

    // -------------------------------------------------
    // creation date of the file (format: 2003-05-29T00:03:07+0200)
    // -------------------------------------------------
    // @desc creation date of the file (format: 2003-05-29T00:03:07+0200)
    // @var string
    // @access private
    // -------------------------------------------------
    public $date;

    // -------------------------------------------------
    // iso format language
    // -------------------------------------------------
    // @desc iso format language
    // @var string
    // @access private
    // -------------------------------------------------
    public $language;

    // -------------------------------------------------
    // copyrights for the rss stream
    // -------------------------------------------------
    // @desc copyrights for the rss stream
    // @var string
    // @access private
    // -------------------------------------------------
    public $rights;

    // -------------------------------------------------
    // URL to an small image
    // -------------------------------------------------
    // @desc URL to an small image
    // @var string
    // @access private
    // -------------------------------------------------
    public $image_link;

    // -------------------------------------------------
    // spatial location (a place name or geographic coordinates), temporal period (a period label, date, or date range) or jurisdiction (such as a named administrative entity)
    // -------------------------------------------------
    // @desc spatial location (a place name or geographic coordinates), temporal period (a period label, date, or date range) or jurisdiction (such as a named administrative entity)
    // @var string
    // @access private
    // -------------------------------------------------
    public $coverage;

    // -------------------------------------------------
    // person, an organization, or a service
    // -------------------------------------------------
    // @desc person, an organization, or a service
    // @var string
    // @access private
    // -------------------------------------------------
    public $contributor;

    // -------------------------------------------------
    // 'hourly' | 'daily' | 'weekly' | 'monthly' | 'yearly'
    // -------------------------------------------------
    // @desc 'hourly' | 'daily' | 'weekly' | 'monthly' | 'yearly'
    // @var string
    // @access private
    // -------------------------------------------------
    public $period;

    // -------------------------------------------------
    // every X hours/days/weeks/...
    // -------------------------------------------------
    // @desc every X hours/days/weeks/...
    // @var int
    // @access private
    // -------------------------------------------------
    public $frequency;

    // -------------------------------------------------
    // date (format: 2003-05-29T00:03:07+0200)
    // -------------------------------------------------
    // Defines a base date to be used in concert with updatePeriod and
    // updateFrequency to calculate the publishing schedule.
    // -------------------------------------------------
    // @desc base date to calculate from (format: 2003-05-29T00:03:07+0200)
    // @var string
    // @access private
    // -------------------------------------------------
    public $base;

    // -------------------------------------------------
    // category (rss 2.0)
    // -------------------------------------------------
    // @desc category (rss 2.0)
    // @var string
    // @access private
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public $category;

    // -------------------------------------------------
    // caching time in minutes (rss 2.0)
    // -------------------------------------------------
    // @desc caching time in minutes (rss 2.0)
    // @var int
    // @access private
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public $cache;

    // -------------------------------------------------
    // array wich all the rss items
    // -------------------------------------------------
    // @desc array wich all the rss items
    // @var array
    // @access private
    // -------------------------------------------------
    public $items = [];

    // -------------------------------------------------
    // compiled outputstring
    // -------------------------------------------------
    // @desc compiled outputstring
    // @var string
    // @access private
    // -------------------------------------------------
    public $output;

    // -------------------------------------------------
    // use DC data
    // -------------------------------------------------
    // @desc use DC data
    // @var boolean
    // @access private
    // -------------------------------------------------
    public $use_dc_data = false;

    // -------------------------------------------------
    // use SY data
    // -------------------------------------------------
    // @desc use SY data
    // @var boolean
    // @access private
    // -------------------------------------------------
    public $use_sy_data = false;

    /* ----------------------- */
    /* C O N S T R U C T O R */
    /* ----------------------- */

    // -------------------------------------------------
    // Constructor
    // -------------------------------------------------
    // @desc Constructor
    // @param (string) $encoding  encoding of the xml file
    // @param (string) $about  URL where the RSS document will be made available
    // @param (string) $title
    // @param (string) $description
    // @param (string) $image_link  URL
    // @return (void)
    // @uses setEncoding(), setAbout(), setTitle(), setDescription(), setImageLink(), setCategory(), setCache()
    // @access private
    // -------------------------------------------------
    public function __construct(
        $encoding = '',
        $about = '',
        $title = '',
        $description = '',
        $image_link = '',
        $category = '',
        $cache = ''
    ) {
        $this->setEncoding($encoding);
        $this->setAbout($about);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setImageLink($image_link);
        $this->setCategory($category);
        $this->setCache($cache);
    } // end constructor

    /* ----------------------------------------------------------------------- */
    /* F U N C T I O N S */
    /* ----------------------------------------------------------------------- */

    // -------------------------------------------------
    // add additional DC data
    // -------------------------------------------------
    // @desc add additional DC data
    // @param (string) $publisher person, an organization, or a service
    // @param (string) $creator person, an organization, or a service
    // @param (string) $date  format: 2003-05-29T00:03:07+0200
    // @param (string) $language  iso-format
    // @param (string) $rights  copyright information
    // @param (string) $coverage  spatial location (a place name or geographic coordinates), temporal period (a period label, date, or date range) or jurisdiction (such as a named administrative entity)
    // @param (string) $contributor  person, an organization, or a service
    // @return (void)
    // @uses setPublisher(), setCreator(), setDate(), setLanguage(), setRights(), setCoverage(), setContributor()
    // @access public
    // -------------------------------------------------
    public function addDCdata(
        $publisher = '',
        $creator = '',
        $date = '',
        $language = '',
        $rights = '',
        $coverage = '',
        $contributor = ''
    ) {
        $this->setPublisher($publisher);
        $this->setCreator($creator);
        $this->setDate($date);
        $this->setLanguage($language);
        $this->setRights($rights);
        $this->setCoverage($coverage);
        $this->setContributor($contributor);
        $this->use_dc_data = (bool) true;
    } // end function

    // -------------------------------------------------
    // add additional SY data
    // -------------------------------------------------
    // @desc add additional DC data
    // @param (string) $period  'hourly' | 'daily' | 'weekly' | 'monthly' | 'yearly'
    // @param (int) $frequency  every x hours/days/weeks/...
    // @param (string) $base  format: 2003-05-29T00:03:07+0200
    // @return (void)
    // @uses setPeriod(), setFrequency(), setBase()
    // @access public
    // -------------------------------------------------
    public function addSYdata($period = '', $frequency = '', $base = '')
    {
        $this->setPeriod($period);
        $this->setFrequency($frequency);
        $this->setBase($base);
        $this->use_sy_data = (bool) true;
    } // end function

    // -------------------------------------------------
    // Checks if a given string is a valid iso-language-code
    // -------------------------------------------------
    // @desc Checks if a given string is a valid iso-language-code
    // @param (string) $code  String that should validated
    // @return (boolean) $isvalid  If string is valid or not
    // @access public
    // @static
    // -------------------------------------------------
    public function isValidLanguageCode($code = '')
    {
        return (bool) ((preg_match('(^([a-zA-Z]{2})$)', $code) > 0) ? true : false);
    } // end function

    // -------------------------------------------------
    // Sets $encoding variable
    // -------------------------------------------------
    // @desc Sets $encoding variable
    // @param (string) $encoding  encoding of the xml file
    // @return (void)
    // @access private
    // @see $encoding
    // -------------------------------------------------
    public function setEncoding($encoding = '')
    {
        if (! isset($this->encoding)) {
            $this->encoding = (string) ((strlen(trim($encoding)) > 0) ? trim($encoding) : 'UTF-8');
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $about variable
    // -------------------------------------------------
    // @desc Sets $about variable
    // @param (string) $about
    // @return (void)
    // @access private
    // @see $about
    // -------------------------------------------------
    public function setAbout($about = '')
    {
        if (! isset($this->about) && strlen(trim($about)) > 0) {
            $this->about = (string) trim($about);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $title variable
    // -------------------------------------------------
    // @desc Sets $title variable
    // @param (string) $title
    // @return (void)
    // @access private
    // @see $title
    // -------------------------------------------------
    public function setTitle($title = '')
    {
        if (! isset($this->title) && strlen(trim($title)) > 0) {
            $this->title = (string) trim($title);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $description variable
    // -------------------------------------------------
    // @desc Sets $description variable
    // @param (string) $description
    // @return (void)
    // @access private
    // @see $description
    // -------------------------------------------------
    public function setDescription($description = '')
    {
        if (! isset($this->description) && strlen(trim($description)) > 0) {
            $this->description = (string) trim($description);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $publisher variable
    // -------------------------------------------------
    // @desc Sets $publisher variable
    // @param (string) $publisher
    // @return (void)
    // @access private
    // @see $publisher
    // -------------------------------------------------
    public function setPublisher($publisher = '')
    {
        if (! isset($this->publisher) && strlen(trim($publisher)) > 0) {
            $this->publisher = (string) trim($publisher);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $creator variable
    // -------------------------------------------------
    // @desc Sets $creator variable
    // @param (string) $creator
    // @return (void)
    // @access private
    // @see $creator
    // -------------------------------------------------
    public function setCreator($creator = '')
    {
        if (! isset($this->creator) && strlen(trim($creator)) > 0) {
            $this->creator = (string) trim($creator);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $date variable
    // -------------------------------------------------
    // @desc Sets $date variable
    // @param (string) $date  format: 2003-05-29T00:03:07+0200
    // @return (void)
    // @access private
    // @see $date
    // -------------------------------------------------
    public function setDate($date = '')
    {
        if (! isset($this->date) && strlen(trim($date)) > 0) {
            $this->date = (string) trim($date);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $language variable
    // -------------------------------------------------
    // @desc Sets $language variable
    // @param (string) $language
    // @return (void)
    // @access private
    // @see $language
    // @uses isValidLanguageCode()
    // -------------------------------------------------
    public function setLanguage($language = '')
    {
        if (! isset($this->language) && $this->isValidLanguageCode($language) === true) {
            $this->language = (string) trim($language);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $rights variable
    // -------------------------------------------------
    // @desc Sets $rights variable
    // @param (string) $rights
    // @return (void)
    // @access private
    // @see $rights
    // -------------------------------------------------
    public function setRights($rights = '')
    {
        if (! isset($this->rights) && strlen(trim($rights)) > 0) {
            $this->rights = (string) trim($rights);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $coverage variable
    // -------------------------------------------------
    // @desc Sets $coverage variable
    // @param (string) $coverage
    // @return (void)
    // @access private
    // @see $coverage
    // -------------------------------------------------
    public function setCoverage($coverage = '')
    {
        if (! isset($this->coverage) && strlen(trim($coverage)) > 0) {
            $this->coverage = (string) trim($coverage);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $contributor variable
    // -------------------------------------------------
    // @desc Sets $contributor variable
    // @param (string) $contributor
    // @return (void)
    // @access private
    // @see $contributor
    // -------------------------------------------------
    public function setContributor($contributor = '')
    {
        if (! isset($this->contributor) && strlen(trim($contributor)) > 0) {
            $this->contributor = (string) trim($contributor);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $image_link variable
    // -------------------------------------------------
    // @desc Sets $image_link variable
    // @param (string) $image_link
    // @return (void)
    // @access private
    // @see $image_link
    // -------------------------------------------------
    public function setImageLink($image_link = '')
    {
        if (! isset($this->image_link) && strlen(trim($image_link)) > 0) {
            $this->image_link = (string) trim($image_link);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $period variable
    // -------------------------------------------------
    // @desc Sets $period variable
    // @param (string) $period  'hourly' | 'daily' | 'weekly' | 'monthly' | 'yearly'
    // @return (void)
    // @access private
    // @see $period
    // -------------------------------------------------
    public function setPeriod($period = '')
    {
        if (! isset($this->period) && strlen(trim($period)) > 0) {
            switch ($period) {
                case 'hourly':
                case 'daily':
                case 'weekly':
                case 'monthly':
                case 'yearly':
                    $this->period = (string) trim($period);
                    break;
                default:
                    $this->period = (string) '';
                    break;
            } // end switch
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $frequency variable
    // -------------------------------------------------
    // @desc Sets $frequency variable
    // @param (int) $frequency
    // @return (void)
    // @access private
    // @see $frequency
    // -------------------------------------------------
    public function setFrequency($frequency = '')
    {
        if (! isset($this->frequency) && strlen(trim($frequency)) > 0) {
            $this->frequency = (int) $frequency;
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $base variable
    // -------------------------------------------------
    // @desc Sets $base variable
    // @param (string) $base
    // @return (void)
    // @access private
    // @see $base
    // -------------------------------------------------
    public function setBase($base = '')
    {
        if (! isset($this->base) && strlen(trim($base)) > 0) {
            $this->base = (string) trim($base);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $category variable
    // -------------------------------------------------
    // @desc Sets $category variable
    // @param (string) $category
    // @return (void)
    // @access private
    // @see $category
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function setCategory($category = '')
    {
        if (strlen(trim($category)) > 0) {
            $this->category = (string) trim($category);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $cache variable
    // -------------------------------------------------
    // @desc Sets $cache variable
    // @param (int) $cache
    // @return (void)
    // @access private
    // @see $cache
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function setCache($cache = '')
    {
        if (strlen(trim($cache)) > 0) {
            $this->cache = (int) $cache;
        } // end if
    } // end function

    // -------------------------------------------------
    // Returns $encoding variable
    // -------------------------------------------------
    // @desc Returns $encoding variable
    // @return (string) $encoding
    // @access public
    // @see $image_link
    // -------------------------------------------------
    public function getEncoding()
    {
        return (string) $this->encoding;
    } // end function

    // -------------------------------------------------
    // Returns $about variable
    // -------------------------------------------------
    // @desc Returns $about variable
    // @return (string) $about
    // @access public
    // @see $about
    // -------------------------------------------------
    public function getAbout()
    {
        return (string) $this->about;
    } // end function

    // -------------------------------------------------
    // Returns $title variable
    // -------------------------------------------------
    // @desc Returns $title variable
    // @return (string) $title
    // @access public
    // @see $title
    // -------------------------------------------------
    public function getTitle()
    {
        return (string) $this->title;
    } // end function

    // -------------------------------------------------
    // Returns $description variable
    // -------------------------------------------------
    // @desc Returns $description variable
    // @return (string) $description
    // @access public
    // @see $description
    // -------------------------------------------------
    public function getDescription()
    {
        return (string) $this->description;
    } // end function

    // -------------------------------------------------
    // Returns $publisher variable
    // -------------------------------------------------
    // @desc Returns $publisher variable
    // @return (string) $publisher
    // @access public
    // @see $publisher
    // -------------------------------------------------
    public function getPublisher()
    {
        return (string) $this->publisher;
    } // end function

    // -------------------------------------------------
    // Returns $creator variable
    // -------------------------------------------------
    // @desc Returns $creator variable
    // @return (string) $creator
    // @access public
    // @see $creator
    // -------------------------------------------------
    public function getCreator()
    {
        return (string) $this->creator;
    } // end function

    // -------------------------------------------------
    // Returns $date variable
    // -------------------------------------------------
    // @desc Returns $date variable
    // @return (string) $date
    // @access public
    // @see $date
    // -------------------------------------------------
    public function getDate()
    {
        return (string) $this->date;
    } // end function

    // -------------------------------------------------
    // Returns $language variable
    // -------------------------------------------------
    // @desc Returns $language variable
    // @return (string) $language
    // @access public
    // @see $language
    // -------------------------------------------------
    public function getLanguage()
    {
        return (string) $this->language;
    } // end function

    // -------------------------------------------------
    // Returns $rights variable
    // -------------------------------------------------
    // @desc Returns $rights variable
    // @return (string) $rights
    // @access public
    // @see $rights
    // -------------------------------------------------
    public function getRights()
    {
        return (string) $this->rights;
    } // end function

    // -------------------------------------------------
    // Returns $coverage variable
    // -------------------------------------------------
    // @desc Returns $coverage variable
    // @return (string) $coverage
    // @access public
    // @see $coverage
    // -------------------------------------------------
    public function getCoverage()
    {
        return (string) $this->coverage;
    } // end function

    // -------------------------------------------------
    // Returns $contributor variable
    // -------------------------------------------------
    // @desc Returns $contributor variable
    // @return (string) $contributor
    // @access public
    // @see $contributor
    // -------------------------------------------------
    public function getContributor()
    {
        return (string) $this->contributor;
    } // end function

    // -------------------------------------------------
    // Returns $image_link variable
    // -------------------------------------------------
    // @desc Returns $image_link variable
    // @return (string) $image_link
    // @access public
    // @see $image_link
    // -------------------------------------------------
    public function getImageLink()
    {
        return (string) $this->image_link;
    } // end function

    // -------------------------------------------------
    // Returns $period variable
    // -------------------------------------------------
    // @desc Returns $period variable
    // @return (string) $period
    // @access public
    // @see $period
    // -------------------------------------------------
    public function getPeriod()
    {
        return (string) $this->period;
    } // end function

    // -------------------------------------------------
    // Returns $frequency variable
    // -------------------------------------------------
    // @desc Returns $frequency variable
    // @return (string) $frequency
    // @access public
    // @see $frequency
    // -------------------------------------------------
    public function getFrequency()
    {
        return (int) $this->frequency;
    } // end function

    // -------------------------------------------------
    // Returns $base variable
    // -------------------------------------------------
    // @desc Returns $base variable
    // @return (string) $base
    // @access public
    // @see $base
    // -------------------------------------------------
    public function getBase()
    {
        return (string) $this->base;
    } // end function

    // -------------------------------------------------
    // Returns $category variable
    // -------------------------------------------------
    // @desc Returns $category variable
    // @return (string) $category
    // @access public
    // @see $category
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function getCategory()
    {
        return (string) $this->category;
    } // end function

    // -------------------------------------------------
    // Returns $cache variable
    // -------------------------------------------------
    // @desc Returns $cache variable
    // @return (int) $cache
    // @access public
    // @see $cache
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function getCache()
    {
        return (int) $this->cache;
    } // end function

    // -------------------------------------------------
    // Adds another rss item to the object
    // -------------------------------------------------
    // @desc Adds another rss item to the object
    // @param (string) $about  URL
    // @param (string) $title
    // @param (string) $link  URL
    // @param (string) $description (optional)
    // @param (string) $subject  some sort of category (optional dc value - only shows up if DC data has been set before)
    // @param (string) $date  format: 2003-05-29T00:03:07+0200 (optional dc value - only shows up if DC data has been set before)
    // @return (void)
    // @access public
    // @see $items
    // @uses RSSItem
    // -------------------------------------------------
    public function addItem(
        $about = '',
        $title = '',
        $link = '',
        $description = '',
        $subject = '',
        $date = '',
        $author = '',
        $comments = ''
    ) {
        $item = new RSSItem(
            $about,
            $title,
            $link,
            $description,
            $subject,
            $date,
            $author = '',
            $comments = ''
        );
        $this->items[] = $item;
    } // end function

    // -------------------------------------------------
    // Deletes a rss item from the array
    // -------------------------------------------------
    // @desc Deletes a rss item from the array
    // @param (int) $id  id of the element in the $items array
    // @return (boolean) true if item was deleted
    // @access public
    // @see $items
    // -------------------------------------------------
    public function deleteItem($id = -1)
    {
        if (array_key_exists($id, $this->items)) {
            unset($this->items[$id]);

            return (bool) true;
        } else {
            return (bool) false;
        } // end if
    } // end function

    // -------------------------------------------------
    // Returns an array with all the keys of the $items array
    // -------------------------------------------------
    // @desc Returns an array with all the keys of the $items array
    // @return (array) array with all the keys of the $items array
    // @access public
    // @see $items
    // -------------------------------------------------
    public function getItemList()
    {
        return (array) array_keys($this->items);
    } // end function

    // -------------------------------------------------
    // Returns the $items array
    // -------------------------------------------------
    // @desc Returns the $items array
    // @return (array) $items
    // @access public
    // -------------------------------------------------
    public function getItems()
    {
        return (array) $this->items;
    } // end function

    // -------------------------------------------------
    // Returns a single rss item by ID
    // -------------------------------------------------
    // @desc Returns a single rss item by ID
    // @param (int) $id  id of the element in the $items array
    // @return (mixed) RSSItem or false
    // @access public
    // @see RSSItem
    // -------------------------------------------------
    public function getItem($id = -1)
    {
        if (array_key_exists($id, $this->items)) {
            return (object) $this->items[$id];
        } else {
            return (bool) false;
        } // end if
    } // end function

    // -------------------------------------------------
    // creates the output based on the 0.91 rss version
    // -------------------------------------------------
    // @desc creates the output based on the 0.91 rss version
    // @return (void)
    // @access private
    // @see $output
    // -------------------------------------------------
    public function createOutputV090()
    {
        // not implemented
        $this->createOutputV100();
    } // end function

    // -------------------------------------------------
    // creates the output based on the 0.91 rss version
    // -------------------------------------------------
    // @desc creates the output based on the 0.91 rss version
    // @return (void)
    // @access private
    // @see $output
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function createOutputV091()
    {
        $this->output = (string) '<!DOCTYPE rss SYSTEM "http://my.netscape.com/publish/formats/rss-0.91.dtd">'."\n";
        $this->output .= (string) '<rss version="0.91">'."\n";
        $this->output .= (string) '<channel>'."\n";

        if (strlen($this->rights) > 0) {
            $this->output .= (string) '<copyright>'.$this->rights.'</copyright>'."\n";
        } // end if

        if (strlen($this->date) > 0) {
            $this->output .= (string) '<pubDate>'.$this->date.'</pubDate>'."\n";
            $this->output .= (string) '<lastBuildDate>'.$this->date.'</lastBuildDate>'."\n";
        } // end if

        if (strlen($this->about) > 0) {
            $this->output .= (string) '<docs>'.$this->about.'</docs>'."\n";
        } // end if

        if (strlen($this->description) > 0) {
            $this->output .= (string) '<description>'.$this->description.'</description>'."\n";
        } // end if

        if (strlen($this->about) > 0) {
            $this->output .= (string) '<link>'.$this->about.'</link>'."\n";
        } // end if

        if (strlen($this->title) > 0) {
            $this->output .= (string) '<title>'.$this->title.'</title>'."\n";
        } // end if

        if (strlen($this->image_link) > 0) {
            $this->output .= (string) '<image>'."\n";
            $this->output .= (string) '<title>'.$this->title.'</title>'."\n";
            $this->output .= (string) '<url>'.$this->image_link.'</url>'."\n";
            $this->output .= (string) '<link>'.$this->about.'</link>'."\n";
            if (strlen($this->description) > 0) {
                $this->output .= (string) '<description>'.$this->description.'</description>'."\n";
            } // end if
            $this->output .= (string) '</image>'."\n";
        } // end if

        if (strlen($this->publisher) > 0) {
            $this->output .= (string) '<managingEditor>'.$this->publisher.'</managingEditor>'."\n";
        } // end if

        if (strlen($this->creator) > 0) {
            $this->output .= (string) '<webMaster>'.$this->creator.'</webMaster>'."\n";
        } // end if

        if (strlen($this->language) > 0) {
            $this->output .= (string) '<language>'.$this->language.'</language>'."\n";
        } // end if

        if (count($this->getItemList()) > 0) {
            foreach ($this->getItemList() as $id) {
                $item = &$this->items[$id];

                if (strlen($item->getTitle()) > 0 && strlen($item->getLink()) > 0) {
                    $this->output .= (string) '<item>'."\n";
                    $this->output .= (string) '<title>'.$item->getTitle().'</title>'."\n";
                    $this->output .= (string) '<link>'.$item->getLink().'</link>'."\n";
                    if (strlen($item->getDescription()) > 0) {
                        $this->output .= (string) '<description>'.$item->getDescription().'</description>'."\n";
                    } // end if
                    $this->output .= (string) '</item>'."\n";
                } // end if
            } // end foreach
        } // end if

        $this->output .= (string) '</channel>'."\n";
        $this->output .= (string) '</rss>'."\n";
    } // end function

    // -------------------------------------------------
    // creates the output based on the 1.0 rss version
    // -------------------------------------------------
    // @desc creates the output based on the 1.0 rss version
    // @return (void)
    // @access private
    // @see $output
    // -------------------------------------------------
    public function createOutputV100()
    {
        $this->output = (string) '<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" ';

        if ($this->use_dc_data === true) {
            $this->output .= (string) 'xmlns:dc="http://purl.org/dc/elements/1.1/" ';
        } // end if

        if ($this->use_sy_data === true) {
            $this->output .= (string) 'xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" ';
        } // end if

        $this->output .= (string) 'xmlns="http://purl.org/rss/1.0/">'."\n";

        if (strlen($this->about) > 0) {
            $this->output .= (string) '<channel rdf:about="'.$this->about.'">'."\n";
        } else {
            $this->output .= (string) '<channel>'."\n";
        } // end if

        if (strlen($this->title) > 0) {
            $this->output .= (string) '<title>'.$this->title.'</title>'."\n";
        } // end if

        if (strlen($this->about) > 0) {
            $this->output .= (string) '<link>'.$this->about.'</link>'."\n";
        } // end if

        if (strlen($this->description) > 0) {
            $this->output .= (string) '<description>'.$this->description.'</description>'."\n";
        } // end if

        // additional dc data
        if (strlen($this->publisher) > 0) {
            $this->output .= (string) '<dc:publisher>'.$this->publisher.'</dc:publisher>'."\n";
        } // end if

        if (strlen($this->creator) > 0) {
            $this->output .= (string) '<dc:creator>'.$this->creator.'</dc:creator>'."\n";
        } // end if

        if (strlen($this->date) > 0) {
            $this->output .= (string) '<dc:date>'.$this->date.'</dc:date>'."\n";
        } // end if

        if (strlen($this->language) > 0) {
            $this->output .= (string) '<dc:language>'.$this->language.'</dc:language>'."\n";
        } // end if

        if (strlen($this->rights) > 0) {
            $this->output .= (string) '<dc:rights>'.$this->rights.'</dc:rights>'."\n";
        } // end if

        if (strlen($this->coverage) > 0) {
            $this->output .= (string) '<dc:coverage>'.$this->coverage.'</dc:coverage>'."\n";
        } // end if

        if (strlen($this->contributor) > 0) {
            $this->output .= (string) '<dc:contributor>'.$this->contributor.'</dc:contributor>'."\n";
        } // end if

        // additional SY data
        if (strlen($this->period) > 0) {
            $this->output .= (string) '<sy:updatePeriod>'.$this->period.'</sy:updatePeriod>'."\n";
        } // end if

        if (strlen($this->frequency) > 0) {
            $this->output .= (string) '<sy:updateFrequency>'.$this->frequency.'</sy:updateFrequency>'."\n";
        } // end if

        if (strlen($this->base) > 0) {
            $this->output .= (string) '<sy:updateBase>'.$this->base.'</sy:updateBase>'."\n";
        } // end if

        if (strlen($this->image_link) > 0) {
            $this->output .= (string) '<image rdf:resource="'.$this->image_link.'" />'."\n";
        } // end if

        if (strlen($this->image_link) > 0) {
            $this->output .= (string) '<image rdf:about="'.$this->image_link.'">'."\n";
            $this->output .= (string) '<title>'.$this->title.'</title>'."\n";
            $this->output .= (string) '<url>'.$this->image_link.'</url>'."\n";
            $this->output .= (string) '<link>'.$this->about.'</link>'."\n";
            if (strlen($this->description) > 0) {
                $this->output .= (string) '<description>'.$this->description.'</description>'."\n";
            } // end if
            $this->output .= (string) '</image>'."\n";
        } // end if

        if (count($this->getItemList()) > 0) {
            $this->output .= (string) '<items><rdf:Seq>'."\n";
            foreach ($this->getItemList() as $id) {
                $item = &$this->items[$id];
                if (strlen($item->getAbout()) > 0) {
                    $this->output .= (string) ' <rdf:li resource="'.$item->getAbout().'" />'."\n";
                } // end if
            } // end foreach
            $this->output .= (string) '</rdf:Seq></items>'."\n";
        } // end if
        $this->output .= (string) '</channel>'."\n";

        if (count($this->getItemList()) > 0) {
            foreach ($this->getItemList() as $id) {
                $item = &$this->items[$id];

                if (strlen($item->getTitle()) > 0 && strlen($item->getLink()) > 0) {
                    if (strlen($item->getAbout()) > 0) {
                        $this->output .= (string) '<item rdf:about="'.$item->getAbout().'">'."\n";
                    } else {
                        $this->output .= (string) '<item>'."\n";
                    } // end if

                    $this->output .= (string) '<title>'.$item->getTitle().'</title>'."\n";
                    $this->output .= (string) '<link>'.$item->getLink().'</link>'."\n";

                    if (strlen($item->getDescription()) > 0) {
                        $this->output .= (string) '<description>'.$item->getDescription().'</description>'."\n";
                    } // end if

                    if ($this->use_dc_data === true && strlen($item->getSubject()) > 0) {
                        $this->output .= (string) '<dc:subject>'.$item->getSubject().'</dc:subject>'."\n";
                    } // end if

                    if ($this->use_dc_data === true && strlen($item->getDate()) > 0) {
                        $this->output .= (string) '<dc:date>'.$item->getDate().'</dc:date>'."\n";
                    } // end if

                    $this->output .= (string) '</item>'."\n";
                } // end if
            } // end foreach
        } // end if

        $this->output .= (string) '</rdf:RDF>';
    } // end function

    // -------------------------------------------------
    // creates the output based on the 2.0 rss draft
    // -------------------------------------------------
    // @desc creates the output based on the 0.91 rss draft
    // @return (void)
    // @access private
    // @see $output
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function createOutputV200()
    {
        // not implemented
        $this->createOutputV100();
        // ---------------------
        $this->output = (string) '<rss version="2.0">'."\n";
        $this->output .= (string) '<channel>'."\n";

        if (strlen($this->rights) > 0) {
            $this->output .= (string) '<copyright>'.$this->rights.'</copyright>'."\n";
        } // end if

        if (strlen($this->date) > 0) {
            $this->output .= (string) '<pubDate>'.$this->date.'</pubDate>'."\n";
            // xuanyan 2007.5.8 edit
            // $this->output .= (string) '<lastBuildDate>' .$this->date . '</lastBuildDate>' . "\n";
        } // end if

        if (strlen($this->about) > 0) {
            $this->output .= (string) '<docs>'.$this->about.'</docs>'."\n";
        } // end if

        if (strlen($this->description) > 0) {
            $this->output .= (string) '<description>'.$this->description.'</description>'."\n";
        } // end if

        if (strlen($this->about) > 0) {
            $this->output .= (string) '<link>'.$this->about.'</link>'."\n";
        } // end if

        if (strlen($this->title) > 0) {
            $this->output .= (string) '<title>'.$this->title.'</title>'."\n";
        } // end if

        if (strlen($this->image_link) > 0) {
            $this->output .= (string) '<image>'."\n";
            $this->output .= (string) '<title>'.$this->title.'</title>'."\n";
            $this->output .= (string) '<url>'.$this->image_link.'</url>'."\n";
            $this->output .= (string) '<link>'.$this->about.'</link>'."\n";
            if (strlen($this->description) > 0) {
                $this->output .= (string) '<description>'.$this->description.'</description>'."\n";
            } // end if
            $this->output .= (string) '</image>'."\n";
        } // end if

        if (strlen($this->publisher) > 0) {
            $this->output .= (string) '<managingEditor>'.$this->publisher.'</managingEditor>'."\n";
        } // end if

        if (strlen($this->creator) > 0) {
            // xuanyan 2007.5.8 edit
            // $this->output .= (string) '<webMaster>' . $this->creator . '</webMaster>' . "\n";
            $this->output .= (string) '<generator>'.$this->creator.'</generator>'."\n";
        } // end if

        if (strlen($this->language) > 0) {
            $this->output .= (string) '<language>'.$this->language.'</language>'."\n";
        } // end if

        if (strlen($this->category) > 0) {
            $this->output .= (string) '<category>'.$this->category.'</category>'."\n";
        } // end if

        if (strlen($this->cache) > 0) {
            $this->output .= (string) '<ttl>'.$this->cache.'</ttl>'."\n";
        } // end if

        if (count($this->getItemList()) > 0) {
            foreach ($this->getItemList() as $id) {
                $item = &$this->items[$id];

                if (strlen($item->getTitle()) > 0 && strlen($item->getLink()) > 0) {
                    $this->output .= (string) '<item>'."\n";
                    $this->output .= (string) '<title>'.$item->getTitle().'</title>'."\n";
                    $this->output .= (string) '<link>'.$item->getLink().'</link>'."\n";

                    if (strlen($item->getDescription()) > 0) {
                        $this->output .= (string) '<description>'.$item->getDescription().'</description>'."\n";
                    } // end if

                    if ($this->use_dc_data === true && strlen($item->getSubject()) > 0) {
                        $this->output .= (string) '<category>'.$item->getSubject().'</category>'."\n";
                    } // end if

                    if ($this->use_dc_data === true && strlen($item->getDate()) > 0) {
                        $this->output .= (string) '<pubDate>'.$item->getDate().'</pubDate>'."\n";
                    } // end if

                    if (strlen($item->getAbout()) > 0) {
                        $this->output .= (string) '<guid>'.$item->getAbout().'</guid>'."\n";
                    } // end if

                    if (strlen($item->getAuthor()) > 0) {
                        $this->output .= (string) '<author>'.$item->getAuthor().'</author>'."\n";
                    } // end if

                    if (strlen($item->getComments()) > 0) {
                        $this->output .= (string) '<comments>'.$item->getComments().'</comments>'."\n";
                    } // end if

                    $this->output .= (string) '</item>'."\n";
                } // end if
            } // end foreach
        } // end if

        $this->output .= (string) '</channel>'."\n";
        $this->output .= (string) '</rss>'."\n";
    } // end function

    // -------------------------------------------------
    // creates the output
    // -------------------------------------------------
    // @desc creates the output
    // @return (void)
    // @access private
    // @uses createOutputV100()
    // -------------------------------------------------
    public function createOutput($version = '')
    {
        if (strlen(trim($version)) === 0) {
            $version = (string) '1.0';
        } // end if

        switch ($version) {
            case '0.9':
                $this->createOutputV090();
                break;
            case '0.91':
                $this->createOutputV091();
                break;
            case '2.00':
                $this->createOutputV200();
                break;
            case '1.0':
            default:
                $this->createOutputV100();
                break;
        } // end switch
    } // end function

    // -------------------------------------------------
    // echos the output
    // -------------------------------------------------
    // use this function if you want to directly output the rss stream
    // -------------------------------------------------
    // @desc echos the output
    // @return (void)
    // @access public
    // @uses createOutput()
    // -------------------------------------------------
    public function outputRSS($version = '')
    {
        if (! isset($this->output)) {
            $this->createOutput($version);
        } // end if
        //        header('Content-Disposition: inline; filename=rss_' . str_replace(' ', '', $this->title) . '.xml');
        $this->output = '<'.'?xml version="1.0" encoding="'.$this->encoding.'"?'.'>'."\n".
            '<!--  RSS generated by ECSHOP (http://www.ecshop.com) ['.date('Y-m-d H:i:s').']  -->'."\n".$this->output;
        echo $this->output;
    } // end function

    // -------------------------------------------------
    // returns the output
    // -------------------------------------------------
    // use this function if you want to have the output stream as a string (for example to write it in a cache file)
    // -------------------------------------------------
    // @desc returns the output
    // @return (void)
    // @access public
    // @uses createOutput()
    // -------------------------------------------------
    public function getRSSOutput($version = '')
    {
        if (! isset($this->output)) {
            $this->createOutput($version);
        } // end if

        return (string) '<'.'?xml version="1.0" encoding="'.$this->encoding.'"?'.'>'."\n".
            '<!--  RSS generated by '.APP_NAME.' '.APP_VERSION.' ['.date('Y-m-d H:i:s').']  --> '."\n".$this->output;
    } // end function
} // end class RSSBuilder

// ---------------------------------------------------------------------------

/* ----------------------------------------------------------------------- */
// single rss item object
// -------------------------------------------------
// Tested with WAMP (XP-SP1/1.3.24/4.0.12/4.3.0)
// Last change: 2003-05-30
// -------------------------------------------------
// @desc single rss item object
// @access private
// @author Michael Wimmer <flaimo@gmx.net>
// @copyright Michael Wimmer
// @link http://www.flaimo.com/
// @package RSSBuilder
// @category FLP
// @version 1.001
/* ----------------------------------------------------------------------- */

class RSSItem
{
    /* ----------------------------------------------------------------------- */
    /* V A R I A B L E S */
    /* ----------------------------------------------------------------------- */

    // -------------------------------------------------
    // URL
    // -------------------------------------------------
    // @desc URL
    // @var string
    // @access private
    // -------------------------------------------------
    public $about;

    // -------------------------------------------------
    // headline
    // -------------------------------------------------
    // @desc headline
    // @var string
    // @access private
    // -------------------------------------------------
    public $title;

    // -------------------------------------------------
    // URL to the full item
    // -------------------------------------------------
    // @desc URL to the full item
    // @var string
    // @access private
    // -------------------------------------------------
    public $link;

    // -------------------------------------------------
    // optional description
    // -------------------------------------------------
    // @desc optional description
    // @var string
    // @access private
    // -------------------------------------------------
    public $description;

    // -------------------------------------------------
    // optional subject (category)
    // -------------------------------------------------
    // @desc optional subject (category)
    // @var string
    // @access private
    // -------------------------------------------------
    public $subject;

    // -------------------------------------------------
    // optional date
    // -------------------------------------------------
    // @desc optional date
    // @var string
    // @access private
    // -------------------------------------------------
    public $date;

    // -------------------------------------------------
    // author of item
    // -------------------------------------------------
    // @desc author of item
    // @var string
    // @access private
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public $author;

    // -------------------------------------------------
    // url to comments page (rss 2.0)
    // -------------------------------------------------
    // @desc url to comments page (rss 2.0)
    // @var string
    // @access private
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public $comments;

    /* ----------------------- */
    /* C O N S T R U C T O R */
    /* ----------------------- */

    // -------------------------------------------------
    // Constructor
    // -------------------------------------------------
    // @desc Constructor
    // @param (string) $about  URL
    // @param (string) $title
    // @param (string) $link  URL
    // @param (string) $description (optional)
    // @param (string) $subject  some sort of category (optional)
    // @param (string) $date  format: 2003-05-29T00:03:07+0200 (optional)
    // @return (void)
    // @uses setAbout(), setTitle(), setLink(), setDescription(), setSubject(), setDate(), setAuthor(), setComments()
    // @access private
    // -------------------------------------------------
    public function __construct(
        $about = '',
        $title = '',
        $link = '',
        $description = '',
        $subject = '',
        $date = '',
        $author = '',
        $comments = ''
    ) {
        $this->setAbout($about);
        $this->setTitle($title);
        $this->setLink($link);
        $this->setDescription($description);
        $this->setSubject($subject);
        $this->setDate($date);
        $this->setAuthor($author);
        $this->setComments($comments);
    } // end constructor

    // -------------------------------------------------
    // Sets $about variable
    // -------------------------------------------------
    // @desc Sets $about variable
    // @param (string) $about
    // @return (void)
    // @access private
    // @see $about
    // -------------------------------------------------
    public function setAbout($about = '')
    {
        if (! isset($this->about) && strlen(trim($about)) > 0) {
            $this->about = (string) trim($about);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $title variable
    // -------------------------------------------------
    // @desc Sets $title variable
    // @param (string) $title
    // @return (void)
    // @access private
    // @see $title
    // -------------------------------------------------
    public function setTitle($title = '')
    {
        if (! isset($this->title) && strlen(trim($title)) > 0) {
            $this->title = (string) trim($title);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $link variable
    // -------------------------------------------------
    // @desc Sets $link variable
    // @param (string) $link
    // @return (void)
    // @access private
    // @see $link
    // -------------------------------------------------
    public function setLink($link = '')
    {
        if (! isset($this->link) && strlen(trim($link)) > 0) {
            $this->link = (string) trim($link);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $description variable
    // -------------------------------------------------
    // @desc Sets $description variable
    // @param (string) $description
    // @return (void)
    // @access private
    // @see $description
    // -------------------------------------------------
    public function setDescription($description = '')
    {
        if (! isset($this->description) && strlen(trim($description)) > 0) {
            $this->description = (string) trim($description);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $subject variable
    // -------------------------------------------------
    // @desc Sets $subject variable
    // @param (string) $subject
    // @return (void)
    // @access private
    // @see $subject
    // -------------------------------------------------
    public function setSubject($subject = '')
    {
        if (! isset($this->subject) && strlen(trim($subject)) > 0) {
            $this->subject = (string) trim($subject);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $date variable
    // -------------------------------------------------
    // @desc Sets $date variable
    // @param (string) $date
    // @return (void)
    // @access private
    // @see $date
    // -------------------------------------------------
    public function setDate($date = '')
    {
        if (! isset($this->date) && strlen(trim($date)) > 0) {
            $this->date = (string) trim($date);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $author variable
    // -------------------------------------------------
    // @desc Sets $author variable
    // @param (string) $author
    // @return (void)
    // @access private
    // @see $author
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function setAuthor($author = '')
    {
        if (! isset($this->author) && strlen(trim($author)) > 0) {
            $this->author = (string) trim($author);
        } // end if
    } // end function

    // -------------------------------------------------
    // Sets $comments variable
    // -------------------------------------------------
    // @desc Sets $comments variable
    // @param (string) $comments
    // @return (void)
    // @access private
    // @see $comments
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function setComments($comments = '')
    {
        if (! isset($this->comments) && strlen(trim($comments)) > 0) {
            $this->comments = (string) trim($comments);
        } // end if
    } // end function

    // -------------------------------------------------
    // Returns $about variable
    // -------------------------------------------------
    // @desc Returns $about variable
    // @return (string) $about
    // @access public
    // @see $about
    // -------------------------------------------------
    public function getAbout()
    {
        return (string) $this->about;
    } // end function

    // -------------------------------------------------
    // Returns $title variable
    // -------------------------------------------------
    // @desc Returns $title variable
    // @return (string) $title
    // @access public
    // @see $title
    // -------------------------------------------------
    public function getTitle()
    {
        return (string) $this->title;
    } // end function

    // -------------------------------------------------
    // Returns $link variable
    // -------------------------------------------------
    // @desc Returns $link variable
    // @return (string) $link
    // @access public
    // @see $link
    // -------------------------------------------------
    public function getLink()
    {
        return (string) $this->link;
    } // end function

    // -------------------------------------------------
    // Returns $description variable
    // -------------------------------------------------
    // @desc Returns $description variable
    // @return (string) $description
    // @access public
    // @see $description
    // -------------------------------------------------
    public function getDescription()
    {
        return (string) $this->description;
    } // end function

    // -------------------------------------------------
    // Returns $subject variable
    // -------------------------------------------------
    // @desc Returns $subject variable
    // @return (string) $subject
    // @access public
    // @see $subject
    // -------------------------------------------------
    public function getSubject()
    {
        return (string) $this->subject;
    } // end function

    // -------------------------------------------------
    // Returns $date variable
    // -------------------------------------------------
    // @desc Returns $date variable
    // @return (string) $date
    // @access public
    // @see $date
    // -------------------------------------------------
    public function getDate()
    {
        return (string) $this->date;
    } // end function

    // -------------------------------------------------
    // Returns $author variable
    // -------------------------------------------------
    // @desc Returns $author variable
    // @return (string) $author
    // @access public
    // @see $author
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function getAuthor()
    {
        return (string) $this->author;
    } // end function

    // -------------------------------------------------
    // Returns $comments variable
    // -------------------------------------------------
    // @desc Returns $comments variable
    // @return (string) $comments
    // @access public
    // @see $comments
    // @since 1.001 - 2003/05/30
    // -------------------------------------------------
    public function getComments()
    {
        return (string) $this->comments;
    } // end function
} // end class RSSItem
