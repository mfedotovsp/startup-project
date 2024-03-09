<?php

use app\models\ConfirmMvp;
use app\models\ContractorTasks;
use app\models\forms\SearchForm;
use app\models\Gcps;
use app\models\Mvps;
use app\models\Problems;
use app\models\Projects;
use app\models\QuestionsConfirmMvp;
use app\models\Segments;
use app\models\StatusConfirmHypothesis;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Подтверждение MVP';
$this->registerCssFile('@web/css/confirm-mvp-view-style.css');

/**
 * @var ContractorTasks $task
 * @var ConfirmMvp $model
 * @var Mvps $mvp
 * @var Gcps $gcp
 * @var Problems $problem
 * @var Segments $segment
 * @var Projects $project
 * @var QuestionsConfirmMvp[] $questions
 * @var SearchForm $searchForm
 */

?>

<style>
    .form-group.field-search_input_responds_mobile {
        margin-bottom: 0;
        margin-top: 5px;
    }
</style>

<div class="confirm-mvp-view">

    <div class="row">

        <div class="container-fluid container-data">

            <div class="row" style="margin: 5px 15px 0 15px; padding: 10px; border-bottom: 1px solid #ccc;">
                <div class="row">
                    <div class="col-md-8">
                    <span class="task-header">
                        Описание задания:
                    </span>
                    <span class="task-description">
                        <?= $task->getDescription() ?>
                    </span>
                    </div>
                    <div class="col-md-2">
                    <span class="task-header">
                        Статус:
                    </span>
                    <span class="task-description">
                        <?= $task->getStatusToString() ?>
                    </span>
                    </div>
                    <div class="col-md-2">
                    <span class="task-header">
                        Создано:
                    </span>
                    <span class="task-description">
                        <?= date('d.m.Y', $task->getCreatedAt()) ?>
                    </span>
                    </div>
                </div>

                <?php if ($histories = $task->histories): ?>

                    <div class="row mt-10">
                        <div class="col-md-12">
                            <span class="task-header">История изменения статусов:</span>
                        </div>

                        <?php foreach ($histories as $key => $history): ?>

                            <div class="col-md-12 font-size-14 pt-5">
                                <span class="bolder">№ <?= ($key+1) ?>. </span>
                                <span><?= date('d.m.Y H:i:s', $history->getCreatedAt()) ?> | </span>
                                <span class="text-danger"><?= ContractorTasks::statusToString($history->getOldStatus()) ?> >>> </span>
                                <span class="text-success"><?= ContractorTasks::statusToString($history->getNewStatus()) ?></span>
                                <span><?= $history->getComment() ? '( ' . $history->getComment() . ' )' : '' ?></span>
                            </div>

                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>

                <div class="row mt-10">
                    <div class="col-md-12">
                        <span class="task-header">
                            Проект:
                        </span>
                        <span class="task-description">
                            <?= $project->getProjectName() ?>
                        </span>
                        <span class="pl-5">
                            <?= Html::a(Html::img('/images/icons/icon_view.png', ['style' => ['width' => '28px', 'margin-right' => '20px', 'margin-bottom' => '5px']]),
                                ['/projects/show-all-information', 'id' => $project->getId()], [
                                    'class' => 'openAllInformationProject', 'title' => 'Смотреть описание проекта',
                                ]) ?>
                        </span>
                    </div>
                </div>

                <div class="row mt-10">
                    <div class="col-md-12">
                        <span class="task-header">
                            Сегмент:
                        </span>
                        <span class="task-description">
                            <?= $segment->getName() ?>
                        </span>
                        <span class="pl-5">
                            <?= Html::a(Html::img('/images/icons/icon_view.png', ['style' => ['width' => '28px', 'margin-right' => '20px', 'margin-bottom' => '5px']]),
                                ['/segments/show-all-information', 'id' => $segment->getId()], [
                                    'class' => 'openAllInformationSegment', 'title' => 'Смотреть описание сегмента',
                                ]) ?>
                        </span>
                    </div>
                </div>

                <div class="row mt-10">
                    <div class="col-md-12">
                        <span class="task-header">
                            Проблема:
                        </span>
                            <span class="task-description">
                            <?= $problem->getDescription() ?>
                        </span>
                    </div>
                </div>

                <div class="row mt-10">
                    <div class="col-md-12">
                        <span class="task-header">
                            Ценностное предложение (ЦП):
                        </span>
                        <span class="task-description">
                            <?= $gcp->getDescription() ?>
                        </span>
                    </div>
                </div>

                <div class="row mt-10">
                    <div class="col-md-12">
                        <span class="task-header">
                            MVP:
                        </span>
                        <span class="task-description">
                            <?= $mvp->getDescription() ?>
                        </span>
                    </div>
                </div>

                <div class="row mt-10">
                    <div class="col-md-12">
                    <span class="task-header">
                        Исходные данные подтверждения MVP
                    </span>
                    <span class="pl-5">
                        <?= Html::a(Html::img('/images/icons/icon_view.png', ['style' => ['width' => '28px', 'margin-right' => '20px', 'margin-bottom' => '5px']]),
                            ['/contractor/confirm-mvp/show-data-confirm-hypothesis', 'id' => $task->getId()], [
                                'class' => 'openDataConfirmHypothesis', 'title' => 'Смотреть исходные данные подтверждения MVP',
                            ]) ?>
                    </span>
                    </div>
                </div>
            </div>

            <div class="row row_header_data top_slide_pagination_responds">

                <div class="col-md-9" style="padding: 5px 0 0 0;">
                    <?= Html::a('Информация о респондентах и интервью' . Html::img('/images/icons/icon_report_next.png'), ['/confirm-mvp/get-instruction-step-three'],[
                        'class' => 'link_to_instruction_page open_modal_instruction_page', 'title' => 'Инструкция'
                    ]) ?>
                </div>

                <div class="col-md-3" style="padding: 0;">
                    <?php if (User::isUserContractor(Yii::$app->user->identity['username']) && $mvp->getExistConfirm() === StatusConfirmHypothesis::MISSING_OR_INCOMPLETE && in_array($task->getStatus(), [ContractorTasks::TASK_STATUS_NEW, ContractorTasks::TASK_STATUS_PROCESS, ContractorTasks::TASK_STATUS_RETURNED], true)) : ?>
                        <?=  Html::a( '<div style="display:flex; align-items: center; padding: 5px 0;"><div>' . Html::img(['@web/images/icons/add_vector.png'], ['style' => ['width' => '35px']]) . '</div><div style="padding-left: 20px;">Добавить респондента</div></div>', [
                                '/contractor/responds/get-data-create-form', 'stage' => $model->getStage() , 'id' => $model->getId(), 'taskId' => $task->getId()],
                            ['id' => 'showRespondCreateForm', 'class' => 'link_add_respond_text pull-right']
                        ) ?>
                    <?php endif; ?>
                </div>

            </div>

            <!--Заголовки для списка респондентов-->
            <div class="row" style="margin: 0; padding: 10px;">

                <div class="col-md-3 headers_data_respond_hi">
                    Фамилия, имя, отчество
                </div>

                <div class="col-md-3" style="padding: 0;">
                    <div class="headers_data_respond_hi">
                        Данные респондента
                    </div>
                    <div class="headers_data_respond_low">
                        Кто? Откуда? Чем занят?
                    </div>
                </div>

                <div class="col-md-3" style="padding: 0;">
                    <div class="headers_data_respond_hi">
                        Место проведения
                    </div>
                    <div class="headers_data_respond_low">
                        Организация, адрес
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="row headers_data_respond_hi" style="text-align: center;">
                        Интервью
                    </div>
                    <div class="row headers_data_respond_low">
                        <div class="col-md-6" style="text-align: center;">
                            План
                        </div>
                        <div class="col-md-6" style="text-align: center;">
                            Факт
                        </div>
                    </div>
                </div>

                <div class="col-md-1"></div>

            </div>

            <!--renderAjax /respond/get-query-responds-->
            <div class="content_responds_ajax"></div>

        </div>
    </div>
</div>

<div class="confirm-hypothesis-view-mobile">
    <div class="header-title-index-mobile">
        <div style="overflow: hidden; max-width: 70%;">Проект: <?= $project->getProjectName() ?></div>
        <div class="buttons-project-menu-mobile" style="position: absolute; right: 20px; top: 5px;">
            <?= Html::img('@web/images/icons/icon-four-white-squares.png', ['class' => 'open-project-menu-mobile', 'style' => ['width' => '30px']]) ?>
            <?= Html::img('@web/images/icons/icon-white-cross.png', ['class' => 'close-project-menu-mobile', 'style' => ['width' => '30px', 'display' => 'none']]) ?>
        </div>
    </div>

    <div class="project-menu-mobile">
        <div class="project_buttons_mobile flex-column">

            <?= Html::a('Презентация проекта', ['/projects/presentation-mobile', 'id' => $project->getId()], [
                'class' => 'btn btn-default',
                'style' => [
                    'display' => 'flex',
                    'width' => '96%',
                    'height' => '36px',
                    'background' => '#7F9FC5',
                    'color' => '#FFFFFF',
                    'align-items' => 'center',
                    'justify-content' => 'center',
                    'border-radius' => '0',
                    'border' => '1px solid #ffffff',
                    'font-size' => '18px',
                    'margin' => '10px 2% 5px 2%',
                ],
            ]) ?>

            <?= Html::a('Описание сегмента', ['/segments/show-all-information', 'id' => $segment->getId()], [
                'class' => 'btn btn-default openAllInformationSegment',
                'style' => [
                    'display' => 'flex',
                    'width' => '96%',
                    'height' => '36px',
                    'background' => '#7F9FC5',
                    'color' => '#FFFFFF',
                    'align-items' => 'center',
                    'justify-content' => 'center',
                    'border-radius' => '0',
                    'border' => '1px solid #ffffff',
                    'font-size' => '18px',
                    'margin' => '5px 2% 10px 2%',
                ],
            ]) ?>

            <?= Html::a('Данные подтверждения', ['/contractor/confirm-mvp/show-data-confirm-hypothesis', 'id' => $task->getId()], [
                'class' => 'btn btn-default openDataConfirmHypothesis',
                'style' => [
                    'display' => 'flex',
                    'width' => '96%',
                    'height' => '36px',
                    'background' => '#7F9FC5',
                    'color' => '#FFFFFF',
                    'align-items' => 'center',
                    'justify-content' => 'center',
                    'border-radius' => '0',
                    'border' => '1px solid #ffffff',
                    'font-size' => '18px',
                    'margin' => '5px 2% 10px 2%',
                ],
            ]) ?>

        </div>

        <div class="task-block">
            <div>
                    <span class="task-header">
                        Описание задания:
                    </span>
                <span class="task-description">
                        <?= $task->getDescription() ?>
                    </span>
            </div>
            <div>
                    <span class="task-header">
                        Статус:
                    </span>
                <span class="task-description">
                        <?= $task->getStatusToString() ?>
                    </span>
            </div>
            <div>
                    <span class="task-header">
                        Создано:
                    </span>
                <span class="task-description">
                        <?= date('d.m.Y', $task->getCreatedAt()) ?>
                    </span>
            </div>

            <?php if ($histories = $task->histories): ?>

                <div class="mt-15">
                    <div class="task-header">
                        История изменения статуса задания:
                    </div>

                    <?php foreach ($histories as $key => $history): ?>
                        <div class="mt-5">
                            <div class="task-header">№ <?= ($key+1) ?></div>
                            <div>
                                <span class="task-description">Дата и время: </span>
                                <span class="task-description">
                                    <?= date('d.m.Y H:i:s', $history->getCreatedAt()) ?>
                                </span>
                            </div>
                            <div>
                                <span class="task-description">Изменение: </span>
                                <span class="text-danger"><?= ContractorTasks::statusToString($history->getOldStatus()) ?> >>> </span>
                                <span class="text-success"><?= ContractorTasks::statusToString($history->getNewStatus()) ?></span>
                            </div>
                            <div>
                                <span class="task-description">Комментарий: </span>
                                <span class="task-description"><?= $history->getComment() ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>
    </div>

    <div class="arrow_stages_project_mobile">
        <div class="item-stage passive"></div>
        <div class="item-stage passive"></div>
        <div class="item-stage passive"></div>
        <div class="item-stage passive"></div>
        <div class="item-stage passive"></div>
        <div class="item-stage passive"></div>
        <div class="item-stage passive"></div>
        <div class="item-stage active"></div>
        <div class="item-stage passive"></div>
    </div>

    <div class="arrow_links_router_mobile">
        <div class="arrow_link_router_mobile_left"></div>
        <div class="text-stage">8/9. Подтверждение MVP</div>
        <div class="arrow_link_router_mobile_right"></div>
    </div>

    <div class="header-title-confirm-hypothesis-mobile">
        <div style="overflow: hidden; max-width: 90%;">MVP: <?= $mvp->getTitle() ?></div>
    </div>

    <div class="confirm-stage-mobile confirm-hypothesis-step-three-mobile">

        <div class="row row_header_data_generation_mobile mt-10">
            <div class="col-xs-8">
                <?php if (User::isUserContractor(Yii::$app->user->identity['username']) && !$mvp->getDeletedAt() && $mvp->getExistConfirm() === StatusConfirmHypothesis::MISSING_OR_INCOMPLETE && in_array($task->getStatus(), [ContractorTasks::TASK_STATUS_NEW, ContractorTasks::TASK_STATUS_PROCESS, ContractorTasks::TASK_STATUS_RETURNED], true)) : ?>
                    <?=  Html::a( '<div style="display:flex; align-items: center; padding: 5px 0;"><div>' . Html::img(['@web/images/icons/add_vector.png'], ['style' => ['width' => '35px']]) . '</div><div class="pl-20">Добавить респондента</div></div>', [
                            '/contractor/responds/get-data-create-form', 'stage' => $model->getStage() , 'id' => $model->getId(), 'taskId' => $task->getId()],
                        ['class' => 'link_add_respond_text show_add_respond']
                    ) ?>
                <?php endif; ?>
            </div>

            <div class="col-xs-4">

                <?= Html::a(Html::img('@web/images/icons/icon_red_info.png'),
                    Url::to('/confirm-mvp/get-instruction-step-three'),[
                        'class' => 'link_to_instruction_page_mobile open_modal_instruction_page pull-right',
                        'title' => 'Инструкция', 'style' => ['margin-left' => '10px', 'margin-top' => '5px']
                    ]) ?>

                <?= Html::a(Html::img('@web/images/icons/icon_green_search.png'), ['#'], [
                    'class' => 'link_show_search_field_mobile show_search_responds pull-right',
                    'title' => 'Поиск респондентов', 'style' => ['margin-top' => '5px']
                ]) ?>

            </div>
        </div>

        <div class="row search_block_mobile">
            <div class="col-xs-10">
                <?php $form = ActiveForm::begin([
                    'id' => 'search_responds_mobile',
                    'options' => ['class' => 'g-py-15'],
                    'errorCssClass' => 'u-has-error-v1',
                    'successCssClass' => 'u-has-success-v1-1',
                ]); ?>

                <?= $form->field($searchForm, 'search', ['template' => '{input}'])
                    ->textInput([
                        'id' => 'search_input_responds_mobile',
                        'class' => 'style_form_field_respond form-control',
                        'placeholder' => 'поиск респондента',
                        'minlength' => 5,
                        'autocomplete' => 'off'])
                    ->label(false) ?>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-xs-2 pull-right" style="margin-top: 7px;">
                <?= Html::a(Html::img('@web/images/icons/cancel_danger.png'), ['#'], ['class' => 'link_cancel_search_field_mobile show_search_responds']) ?>
            </div>
        </div>

        <div class="row add_respond_block_mobile"></div>

        <!--renderAjax /respond/get-query-responds-->
        <div class="content_responds_ajax"></div>

    </div>
</div>


<!--Модальные окна-->
<?= $this->render('modal', ['model' => $model]) ?>
<!--Подключение скриптов-->
<?php
$this->registerJsFile('@web/js/confirm_mvp_view.js');
?>
