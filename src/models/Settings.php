<?php
/**
 * Updatify plugin for Craft CMS 3.x
 *
 * Sends e-mail notifications on Craft and plugin updates
 *
 * @link      https://limesquare.nl
 * @copyright Copyright (c) 2018 Jurgen Krol
 */

namespace limesquare\updatify\models;

use limesquare\updatify\Updatify;

use Craft;
use craft\base\Model;

/**
 * Updatify Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Jurgen Krol
 * @package   Updatify
 * @since     1.0.0
 */
class Settings extends Model
{
    public $uEmail = '';
    public $uFirstname = '';
    public $uLastname = '';

    public function rules()
    {
        return [
            [['uEmail', 'uFirstname', 'uLastname'], 'required'],
        ];
    }
}

