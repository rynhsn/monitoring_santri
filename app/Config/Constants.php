<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR') || define('HOUR', 3600);
defined('DAY') || define('DAY', 86400);
defined('WEEK') || define('WEEK', 604800);
defined('MONTH') || define('MONTH', 2_592_000);
defined('YEAR') || define('YEAR', 31_536_000);
defined('DECADE') || define('DECADE', 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS') || define('EXIT_SUCCESS', 0);        // no errors
defined('EXIT_ERROR') || define('EXIT_ERROR', 1);          // generic error
defined('EXIT_CONFIG') || define('EXIT_CONFIG', 3);         // configuration error
defined('EXIT_UNKNOWN_FILE') || define('EXIT_UNKNOWN_FILE', 4);   // file not found
defined('EXIT_UNKNOWN_CLASS') || define('EXIT_UNKNOWN_CLASS', 5);  // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') || define('EXIT_USER_INPUT', 7);     // invalid user input
defined('EXIT_DATABASE') || define('EXIT_DATABASE', 8);       // database error
defined('EXIT__AUTO_MIN') || define('EXIT__AUTO_MIN', 9);      // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') || define('EXIT__AUTO_MAX', 125);    // highest automatically-assigned error code

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_LOW instead.
 */
define('EVENT_PRIORITY_LOW', 200);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_NORMAL instead.
 */
define('EVENT_PRIORITY_NORMAL', 100);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_HIGH instead.
 */
define('EVENT_PRIORITY_HIGH', 10);

const COLOR = ['danger', 'warning', 'success', 'info', 'primary'];
const IS_VALID_COLOR = ['danger', 'success'];
const JENIS_KELAMIN = ['L' => 'Laki-laki', 'P' => 'Perempuan'];

const NAMA_SURAH = [
    1 => "Al-Fatihah",
    2 => "Al-Baqarah",
    3 => "Aal-E-Imran",
    4 => "An-Nisa",
    5 => "Al-Maidah",
    6 => "Al-An'am",
    7 => "Al-A'raf",
    8 => "Al-Anfal",
    9 => "At-Tawbah",
    10 => "Yunus",
    11 => "Hud",
    12 => "Yusuf",
    13 => "Ar-Ra'd",
    14 => "Ibrahim",
    15 => "Al-Hijr",
    16 => "An-Nahl",
    17 => "Al-Isra",
    18 => "Al-Kahf",
    19 => "Maryam",
    20 => "Ta-Ha",
    21 => "Al-Anbiya",
    22 => "Al-Hajj",
    23 => "Al-Mu'minun",
    24 => "An-Nur",
    25 => "Al-Furqan",
    26 => "Ash-Shu'ara",
    27 => "An-Naml",
    28 => "Al-Qasas",
    29 => "Al-Ankabut",
    30 => "Ar-Rum",
    31 => "Luqman",
    32 => "As-Sajda",
    33 => "Al-Ahzab",
    34 => "Saba",
    35 => "Fatir",
    36 => "Ya-Sin",
    37 => "As-Saffat",
    38 => "Sad",
    39 => "Az-Zumar",
    40 => "Ghafir",
    41 => "Fussilat",
    42 => "Ash-Shura",
    43 => "Az-Zukhruf",
    44 => "Ad-Dukhan",
    45 => "Al-Jathiya",
    46 => "Al-Ahqaf",
    47 => "Muhammad",
    48 => "Al-Fath",
    49 => "Al-Hujurat",
    50 => "Qaf",
    51 => "Adh-Dhariyat",
    52 => "At-Tur",
    53 => "An-Najm",
    54 => "Al-Qamar",
    55 => "Ar-Rahman",
    56 => "Al-Waqi'a",
    57 => "Al-Hadid",
    58 => "Al-Mujadila",
    59 => "Al-Hashr",
    60 => "Al-Mumtahina",
    61 => "As-Saff",
    62 => "Al-Jumu'a",
    63 => "Al-Munafiqun",
    64 => "At-Taghabun",
    65 => "At-Talaq",
    66 => "At-Tahrim",
    67 => "Al-Mulk",
    68 => "Al-Qalam",
    69 => "Al-Haaqqa",
    70 => "Al-Ma'arij",
    71 => "Nuh",
    72 => "Al-Jinn",
    73 => "Al-Muzzammil",
    74 => "Al-Muddathir",
    75 => "Al-Qiyama",
    76 => "Al-Insan",
    77 => "Al-Mursalat",
    78 => "An-Naba",
    79 => "An-Nazi'at",
    80 => "Abasa",
    81 => "At-Takwir",
    82 => "Al-Infitar",
    83 => "Al-Mutaffifin",
    84 => "Al-Inshiqaq",
    85 => "Al-Buruj",
    86 => "At-Tariq",
    87 => "Al-Ala",
    88 => "Al-Ghashiya",
    89 => "Al-Fajr",
    90 => "Al-Balad",
    91 => "Ash-Shams",
    92 => "Al-Lail",
    93 => "Adh-Dhuha",
    94 => "Ash-Sharh",
    95 => "At-Tin",
    96 => "Al-Alaq",
    97 => "Al-Qadr",
    98 => "Al-Bayyina",
    99 => "Az-Zalzalah",
    100 => "Al-Adiyat",
    101 => "Al-Qaria",
    102 => "At-Takathur",
    103 => "Al-Asr",
    104 => "Al-Humaza",
    105 => "Al-Fil",
    106 => "Quraish",
    107 => "Al-Ma'un",
    108 => "Al-Kawthar",
    109 => "Al-Kafirun",
    110 => "An-Nasr",
    111 => "Al-Masad",
    112 => "Al-Ikhlas",
    113 => "Al-Falaq",
    114 => "An-Nas",
];
