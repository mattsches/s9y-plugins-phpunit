<?php

global $serendipity;

require_once S9Y_INCLUDE_PATH . 'lang/serendipity_lang_en.inc.php';
require_once S9Y_INCLUDE_PATH . 'include/functions_config.inc.php';
require_once S9Y_INCLUDE_PATH . 'include/functions_permalinks.inc.php';
require_once S9Y_INCLUDE_PATH . 'include/plugin_api.inc.php';
require_once S9Y_INCLUDE_PATH . 'include/db/db.inc.php';
require_once S9Y_INCLUDE_PATH . 'include/db/' . DB_TYPE . '.inc.php';

serendipity_initPermalinks();

$serendipity['versionInstalled']  = '1.7';
$serendipity['dbName']            = DB_DBNAME;
$serendipity['dbPrefix']          = 's9y_';
$serendipity['dbHost']            = DB_HOST;
$serendipity['dbUser']            = DB_USER;
$serendipity['dbPass']            = DB_PASSWD;
$serendipity['dbType']            = DB_TYPE;
$serendipity['dbPersistent']      = false;
$serendipity['dbCharset']         = 'utf8';
$serendipity['production'] = false;
$serendipity['lang'] = 'en';
$serendipity['charset'] = 'UTF-8/';
$serendipity['defaultTemplate'] = 'bulletproof';
$serendipity['serendipityHTTPPath'] = '/';
$serendipity['baseUrl'] = 'http://s9y.local/';
$serendipity['authorid'] = '1';
$serendipity['authorid'] = '1';
$serendipity['no_create'] = false;

/**
 * PluginTest
 */
class PluginTest extends PHPUnit_Framework_TestCase
{
    /**
     * Set up
     */
    public function setUp()
    {
        if (php_sapi_name() !== PHP_SAPI) {
            die('not allowed');
        }
        global $serendipity;
        copy(S9Y_INCLUDE_PATH . 'tests/plugins/' . TEST_DB, S9Y_INCLUDE_PATH . 'tests/plugins/s9y_' . TEST_DB);
        $dbfile = S9Y_INCLUDE_PATH . 'tests/plugins/s9y_' . TEST_DB;
        $serendipity['dbConn'] = new PDO('sqlite:' . $dbfile);
        $serendipity['production'] = true;
        serendipity_db_connect();
    }

    /**
     * Tear down
     */
    public function tearDown()
    {
        unlink(S9Y_INCLUDE_PATH . 'tests/plugins/s9y_' . TEST_DB);
    }
}
