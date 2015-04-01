<?php
/**
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl2.html)
 * @author     Adrian Schlegel <adrian.schlegel@liip.ch>
 *
 */

if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(dirname(__FILE__).'/lib/recaptchalib.php');

class helper_plugin_recaptcha extends DokuWiki_Plugin {

    /**
     * Check if the reCAPTCHA should be used. Always check this before using the methods below.
     *
     * @return bool true when the reCAPTCHA should be used
     */
    function isEnabled(){
        if(!$this->getConf('forusers') && $_SERVER['REMOTE_USER']) return false;
        return true;
    }

    /**
     * check the validity of the recaptcha
     *
     * @return obj (@see ReCaptchaResponse)
     */
    function check() {
        // Check the recaptcha answer and only submit if correct
        $resp = recaptcha_check_answer ($this->getConf('privatekey'),
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);

        return $resp;
    }


    /**
     * return the html code for the recaptcha block
     * @param  boolean $use_ssl
     * @return string 
     */
    function getHTML($use_ssl = false) {
        return recaptcha_get_html($this->getConf('publickey'), null, $use_ssl);
    }
}
