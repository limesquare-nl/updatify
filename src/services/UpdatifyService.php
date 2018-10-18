<?php
/**
 * Updatify plugin for Craft CMS 3.x
 *
 * Sends e-mail notifications on Craft and plugin updates
 *
 * @link      https://limesquare.nl
 * @copyright Copyright (c) 2018 Jurgen Krol
 */

namespace limesquare\updatify\services;

use limesquare\updatify\Updatify;

use Craft;
use craft\base\Component;

use craft\mail\Message; 
use craft\web\View;

/**
 * UpdatifyService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Jurgen Krol
 * @package   Updatify
 * @since     1.0.0
 */
class UpdatifyService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Updatify::$plugin->updatifyService->exampleService()
     *
     * @return mixed
     */
    public function sendEmail()
    {
    
        
        
   //     $updates = \Craft::$app->updates->check();
        $updates = \Craft::$app->updates->getUpdates(true);
        
        if($updates) {
        
            $plugin_settings = Updatify::getInstance()->getSettings();
            
            $settings = Craft::$app->systemSettings->getSettings('email');
            $message = new Message();
            
            
            $availableUpdates = 0;
			if(isset($updates->app->releases))
			{
			    $availableUpdates = $availableUpdates + count($updates->app->releases);
			}
			
            $availablePluginUpdates = 0;
			foreach($updates->plugins as $plugin)
			{
			    if(isset($plugin->releases))
			    {
			        $availablePluginUpdates = $availablePluginUpdates + count($plugin->releases);
			        $availableUpdates = $availableUpdates + count($plugin->releases);
			    }
			    
			}
            $variables = array(
                        'firstname' => $plugin_settings->uFirstname,
                        'lastname' => $plugin_settings->uLastname,
                        'updates' => $updates,
                        'availableUpdates' => $availableUpdates,
                        'availablePluginUpdates' => $availablePluginUpdates
                        );
            
            $oldMode = \Craft::$app->view->getTemplateMode();
            \Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);
            
            $html = Craft::$app->view->renderTemplate(
                    'updatify/_emails/notify', $variables
                );
            \Craft::$app->view->setTemplateMode($oldMode);    
            
            $message->setFrom([$settings['fromEmail'] => $settings['fromName']]);
            $message->setTo($plugin_settings->uEmail);
            
            if($updates->getHasCritical())
			{
			    $message->setSubject(\Craft::$app->sites->getCurrentSite()->name." - Voor de website is een kritische update beschikbaar");
			}
			else
			{
                $message->setSubject(\Craft::$app->sites->getCurrentSite()->name." - Voor de website zijn ".$availableUpdates." updates beschikbaar");
    		}
    			
            
            
          //  $message->setSubject('Plugin updates');
            $message->setHtmlBody($html);
        
           return Craft::$app->mailer->send($message);
        }
        
        return $this->returnJson(false);
    }
}
