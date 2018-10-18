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
 * UpdatifyModel Model
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
class UpdatifyModel extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some model attribute
     *
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
