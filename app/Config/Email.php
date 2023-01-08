<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /**
     * @var string
     */
    public $fromEmail = "isra19backup@gmail.com";
    // public $fromEmail = "isra2@isra-km.my.id";
    // public $fromEmail = "johnabbruzi1980@gmail.com";

    /**
     * @var string
     */
    public $fromName = "Isra Khairul Mutaqim";

    /**
     * @var string
     */
    public $recipients;

    /**
     * The "user agent"
     *
     * @var string
     */
    public $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     *
     * @var string
     */
    public $protocol = 'smtp';

    /**
     * The server path to Sendmail.
     *
     * @var string
     */
    public $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Address
     *
     * @var string
     */
    // public $SMTPHost ='smtp-relay.sendinblue.com';
    // public $SMTPHost ='mail.isra-km.my.id';
    public $SMTPHost ='in-v3.mailjet.com';

    /**
     * SMTP Username
     *
     * @var string
     */
    // public $SMTPUser = 'isra19khhh@gmail.com';
    // public $SMTPUser = 'isra2@isra-km.my.id';
    public $SMTPUser = 'f5b2f5227fa772e38ed8d8dfd0a7d226';

    /**
     * SMTP Password
     *
     * @var string
     */
    // public $SMTPPass = 'M0CqGdbrwYaPj2nT';
    // public $SMTPPass = '098jantek123';
    public $SMTPPass = '978a0c1a314f34a8b93bf11335b59639';

    /**
     * SMTP Port
     *
     * @var int
     */
    // public $SMTPPort = 25;
    public $SMTPPort = 587;

    /**
     * SMTP Timeout (in seconds)
     *
     * @var int
     */
    public $SMTPTimeout = 60;

    /**
     * Enable persistent SMTP connections
     *
     * @var bool
     */
    public $SMTPKeepAlive = false;

    /**
     * SMTP Encryption. Either tls or ssl
     *
     * @var string
     */
    public $SMTPCrypto = 'tls';

    /**
     * Enable word-wrap
     *
     * @var bool
     */
    public $wordWrap = true;

    /**
     * Character count to wrap at
     *
     * @var int
     */
    public $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     *
     * @var string
     */
    public $mailType = 'html';

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     *
     * @var string
     */
    public $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     *
     * @var bool
     */
    public $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     *
     * @var int
     */
    public $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     *
     * @var string
     */
    public $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     *
     * @var string
     */
    public $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     *
     * @var bool
     */
    public $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     *
     * @var int
     */
    public $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     *
     * @var bool
     */
    public $DSN = false;
}
