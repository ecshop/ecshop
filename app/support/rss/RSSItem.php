<?php

namespace app\support\rss;

class RSSItem
{
    /*-----------------------------------------------------------------------*/
    /* V A R I A B L E S */
    /*-----------------------------------------------------------------------*/

    //-------------------------------------------------
    // URL
    //-------------------------------------------------
    // @desc URL
    // @var string
    // @access private
    //-------------------------------------------------
    public $about;

    //-------------------------------------------------
    // headline
    //-------------------------------------------------
    // @desc headline
    // @var string
    // @access private
    //-------------------------------------------------
    public $title;

    //-------------------------------------------------
    // URL to the full item
    //-------------------------------------------------
    // @desc URL to the full item
    // @var string
    // @access private
    //-------------------------------------------------
    public $link;

    //-------------------------------------------------
    // optional description
    //-------------------------------------------------
    // @desc optional description
    // @var string
    // @access private
    //-------------------------------------------------
    public $description;

    //-------------------------------------------------
    // optional subject (category)
    //-------------------------------------------------
    // @desc optional subject (category)
    // @var string
    // @access private
    //-------------------------------------------------
    public $subject;

    //-------------------------------------------------
    // optional date
    //-------------------------------------------------
    // @desc optional date
    // @var string
    // @access private
    //-------------------------------------------------
    public $date;

    //-------------------------------------------------
    // author of item
    //-------------------------------------------------
    // @desc author of item
    // @var string
    // @access private
    // @since 1.001 - 2003/05/30
    //-------------------------------------------------
    public $author;

    //-------------------------------------------------
    // url to comments page (rss 2.0)
    //-------------------------------------------------
    // @desc url to comments page (rss 2.0)
    // @var string
    // @access private
    // @since 1.001 - 2003/05/30
    //-------------------------------------------------
    public $comments;

    /*-----------------------*/
    /* C O N S T R U C T O R */
    /*-----------------------*/

    //-------------------------------------------------
    // Constructor
    //-------------------------------------------------
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
    //-------------------------------------------------
    public function __construct(
        $about = '',
        $title = '',
        $link = '',
        $description = '',
        $subject = '',
        $date = '',
        $author = '',
        $comments = ''
    )
    {
        $this->setAbout($about);
        $this->setTitle($title);
        $this->setLink($link);
        $this->setDescription($description);
        $this->setSubject($subject);
        $this->setDate($date);
        $this->setAuthor($author);
        $this->setComments($comments);
    } // end constructor

    //-------------------------------------------------
    // Sets $about variable
    //-------------------------------------------------
    // @desc Sets $about variable
    // @param (string) $about
    // @return (void)
    // @access private
    // @see $about
    //-------------------------------------------------
    public function setAbout($about = '')
    {
        if (!isset($this->about) && strlen(trim($about)) > 0) {
            $this->about = (string)trim($about);
        } // end if
    } // end function

    //-------------------------------------------------
    // Sets $title variable
    //-------------------------------------------------
    // @desc Sets $title variable
    // @param (string) $title
    // @return (void)
    // @access private
    // @see $title
    //-------------------------------------------------
    public function setTitle($title = '')
    {
        if (!isset($this->title) && strlen(trim($title)) > 0) {
            $this->title = (string)trim($title);
        } // end if
    } // end function

    //-------------------------------------------------
    // Sets $link variable
    //-------------------------------------------------
    // @desc Sets $link variable
    // @param (string) $link
    // @return (void)
    // @access private
    // @see $link
    //-------------------------------------------------
    public function setLink($link = '')
    {
        if (!isset($this->link) && strlen(trim($link)) > 0) {
            $this->link = (string)trim($link);
        } // end if
    } // end function

    //-------------------------------------------------
    // Sets $description variable
    //-------------------------------------------------
    // @desc Sets $description variable
    // @param (string) $description
    // @return (void)
    // @access private
    // @see $description
    //-------------------------------------------------
    public function setDescription($description = '')
    {
        if (!isset($this->description) && strlen(trim($description)) > 0) {
            $this->description = (string)trim($description);
        } // end if
    } // end function

    //-------------------------------------------------
    // Sets $subject variable
    //-------------------------------------------------
    // @desc Sets $subject variable
    // @param (string) $subject
    // @return (void)
    // @access private
    // @see $subject
    //-------------------------------------------------
    public function setSubject($subject = '')
    {
        if (!isset($this->subject) && strlen(trim($subject)) > 0) {
            $this->subject = (string)trim($subject);
        } // end if
    } // end function

    //-------------------------------------------------
    // Sets $date variable
    //-------------------------------------------------
    // @desc Sets $date variable
    // @param (string) $date
    // @return (void)
    // @access private
    // @see $date
    //-------------------------------------------------
    public function setDate($date = '')
    {
        if (!isset($this->date) && strlen(trim($date)) > 0) {
            $this->date = (string)trim($date);
        } // end if
    } // end function

    //-------------------------------------------------
    // Sets $author variable
    //-------------------------------------------------
    // @desc Sets $author variable
    // @param (string) $author
    // @return (void)
    // @access private
    // @see $author
    // @since 1.001 - 2003/05/30
    //-------------------------------------------------
    public function setAuthor($author = '')
    {
        if (!isset($this->author) && strlen(trim($author)) > 0) {
            $this->author = (string)trim($author);
        } // end if
    } // end function

    //-------------------------------------------------
    // Sets $comments variable
    //-------------------------------------------------
    // @desc Sets $comments variable
    // @param (string) $comments
    // @return (void)
    // @access private
    // @see $comments
    // @since 1.001 - 2003/05/30
    //-------------------------------------------------
    public function setComments($comments = '')
    {
        if (!isset($this->comments) && strlen(trim($comments)) > 0) {
            $this->comments = (string)trim($comments);
        } // end if
    } // end function

    //-------------------------------------------------
    // Returns $about variable
    //-------------------------------------------------
    // @desc Returns $about variable
    // @return (string) $about
    // @access public
    // @see $about
    //-------------------------------------------------
    public function getAbout()
    {
        return (string)$this->about;
    } // end function

    //-------------------------------------------------
    // Returns $title variable
    //-------------------------------------------------
    // @desc Returns $title variable
    // @return (string) $title
    // @access public
    // @see $title
    //-------------------------------------------------
    public function getTitle()
    {
        return (string)$this->title;
    } // end function

    //-------------------------------------------------
    // Returns $link variable
    //-------------------------------------------------
    // @desc Returns $link variable
    // @return (string) $link
    // @access public
    // @see $link
    //-------------------------------------------------
    public function getLink()
    {
        return (string)$this->link;
    } // end function

    //-------------------------------------------------
    // Returns $description variable
    //-------------------------------------------------
    // @desc Returns $description variable
    // @return (string) $description
    // @access public
    // @see $description
    //-------------------------------------------------
    public function getDescription()
    {
        return (string)$this->description;
    } // end function

    //-------------------------------------------------
    // Returns $subject variable
    //-------------------------------------------------
    // @desc Returns $subject variable
    // @return (string) $subject
    // @access public
    // @see $subject
    //-------------------------------------------------
    public function getSubject()
    {
        return (string)$this->subject;
    } // end function

    //-------------------------------------------------
    // Returns $date variable
    //-------------------------------------------------
    // @desc Returns $date variable
    // @return (string) $date
    // @access public
    // @see $date
    //-------------------------------------------------
    public function getDate()
    {
        return (string)$this->date;
    } // end function

    //-------------------------------------------------
    // Returns $author variable
    //-------------------------------------------------
    // @desc Returns $author variable
    // @return (string) $author
    // @access public
    // @see $author
    // @since 1.001 - 2003/05/30
    //-------------------------------------------------
    public function getAuthor()
    {
        return (string)$this->author;
    } // end function

    //-------------------------------------------------
    // Returns $comments variable
    //-------------------------------------------------
    // @desc Returns $comments variable
    // @return (string) $comments
    // @access public
    // @see $comments
    // @since 1.001 - 2003/05/30
    //-------------------------------------------------
    public function getComments()
    {
        return (string)$this->comments;
    } // end function
}
