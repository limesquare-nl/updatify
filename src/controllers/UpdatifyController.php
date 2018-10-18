<?php
/**
 * Updatify plugin for Craft CMS 3.x
 *
 * Sends e-mail notifications on Craft and plugin updates
 *
 * @link      https://limesquare.nl
 * @copyright Copyright (c) 2018 Jurgen Krol
 */

namespace limesquare\updatify\controllers;

use limesquare\updatify\Updatify;

use Craft;
use craft\web\Controller;

//use craft\mail\Message; 

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Jurgen Krol
 * @package   Updatify
 * @since     1.0.0
 */
class UpdatifyController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
   // protected $allowAnonymous = ['update'];
    protected $allowAnonymous = true;

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/updatify/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the DefaultController actionIndex() method';

        return $result;
    }

}
