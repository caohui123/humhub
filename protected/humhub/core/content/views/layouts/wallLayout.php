<?php

use yii\helpers\Html;

$user = $object->content->user;
$container = $object->content->container;
?>

<div class="panel panel-default wall_<?php echo $object->getUniqueId(); ?>">
    <div class="panel-body">

        <div class="media">

            <!-- start: show wall entry options -->
            <ul class="nav nav-pills preferences">
                <li class="dropdown ">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <?php echo \humhub\core\content\widgets\WallEntryControls::widget(['object' => $object]); ?>
                    </ul>
                </li>
            </ul>
            <!-- end: show wall entry options -->


            <a href="<?php echo $user->getUrl(); ?>" class="pull-left">
                <img class="media-object img-rounded user-image user-<?php echo $user->guid; ?>" alt="40x40" data-src="holder.js/40x40" style="width: 40px; height: 40px;"
                     src="<?php echo $user->getProfileImage()->getUrl(); ?>"
                     width="40" height="40"/>
            </a>

            <!-- Show space image, if you are outside from a space -->
            <?php if (!Yii::$app->controller instanceof \humhub\core\content\components\ContentContainerController && $object->content->container instanceof \humhub\core\space\models\Space): ?>
                <a href="<?php echo $object->content->container->getUrl(); ?>"
                   class="pull-left">
                    <img class="media-object img-rounded img-space pull-left" data-src="holder.js/20x20" alt="20x20"
                         style="width: 20px; height: 20px;"
                         src="<?php echo $object->content->container->getProfileImage()->getUrl(); ?>">
                </a>
            <?php endif; ?>


            <div class="media-body">
                <!-- show username with link and creation time-->
                <h4 class="media-heading"><a href="<?php echo $user->getUrl(); ?>"><?php echo Html::encode($user->displayName); ?></a>
                    <small>
                        <?php echo \humhub\widgets\TimeAgo::widget(['timestamp' => $object->content->created_at]); ?>

                        <?php if ($object->content->created_at !== $object->content->updated_at && $object->content->updated_at != ''): ?>
                            (<?php echo Yii::t('app', 'Updated :timeago', array(':timeago' => \humhub\widgets\TimeAgo::widget(['timestamp' => $object->content->updated_at]))); ?>)
                        <?php endif; ?>

                        <!-- show space name -->
                        <?php if (!Yii::$app->controller instanceof ContentContainerController && $container instanceof Space): ?>
                            <?php echo Yii::t('app', 'in'); ?> <strong><a href="<?php echo $container->getUrl(); ?>"><?php echo Html::encode($container->name); ?></a></strong>
                        <?php endif; ?>

                        <?php echo \humhub\core\content\widgets\WallEntryLabels::widget(['object' => $object]); ?>

                    </small>
                </h4>
                <h5><?php echo Html::encode($user->profile->title); ?></h5>

            </div>
            <hr/>

            <div class="content" id="wall_content_<?php echo $object->getUniqueId(); ?>">
                <?php echo $content; ?>
            </div>

            <?php echo \humhub\core\content\widgets\WallEntryAddons::widget(['object' => $object]); ?>
        </div>


    </div>

</div>