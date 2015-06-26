<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\core\content\widgets;

/**
 * Edit Link for Wall Entries
 *
 * This widget will attached to the WallEntryControlsWidget and displays
 * the "Edit" Link to the Content Objects.
 *
 * @package humhub.modules_core.wall.widgets
 * @since 0.10
 */
class EditLink extends \yii\base\Widget
{

    /**
     * @var \humhub\core\content\components\activerecords\Content
     */
    public $content = null;

    /**
     * Executes the widget.
     */
    public function run()
    {
        if ($this->content->wallEditRoute != "" && $this->content->content->canWrite()) {
            return $this->render('editLink', array(
                        'id' => $this->content->content->object_id,
                        'content' => $this->content,
                        'editRoute' => $this->content->wallEditRoute
            ));
        }
    }

}

?>