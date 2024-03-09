<?php

use app\models\User;
use yii\helpers\Html;

$this->registerCssFile('@web/css/methodological-guide-style.css');

?>

<?php if (!User::isUserAdmin(Yii::$app->user->identity['username'])) : ?>

    <div class="methodological-guide">

        <div class="container-list">

            <div class="simple-block">
                <p>
                    <span>Задача:</span>
                    Подтвердить или опровергнуть выдвинутые гипотезы ценностных предложений.
                </p>
                <p>
                    <span>Результат:</span>
                    Получение результата о подтверждении выдвинутых гипотез ценностных предложений и  внесение его в форму на платформе Spaccel.ru.
                </p>
            </div>

            <br>

            <p>
                Теперь вы знаете проблемы представителей выбранных вами и подтвержденных актуальных сегментов, и вы хорошо осведомлены с какими
                проблемами и потребностями им приходится сталкиваться. Подготовьте презентацию Вашего ценностного предложения, как будто это
                уже продукт. По результатам презентации спросите респондентов, что заинтересовало в вашем предложении, что недостаточно
                проработано, чего нужно добавить.
            </p>

            <p>
                <span class="bold">Цель этапа</span> &#8212; выяснить интерес представителя сегмента к ценностному предложению и попытаться оценить это интерес
                по шкале от «было бы любопытно посмотреть на такой продукт» до «я очень хочу приобрести», «где и когда я могу его приобрести».
            </p>

        </div>

        <h3 class="header-text"><span>Шаг 3. Заполнение анкетных данных</span></h3>

        <div class="container-list">

            <p>
                После проведения презентации необходимо задать подготовленные заранее вопросы. Не стоит навязываться с предложением отвечать
                на вопросы, если респонденты сами инициативно выражают свое отношение. Однако нужно добиться получение реакции на ключевые
                вопросы, которые вы заготовили. Во время диалога нужно быть готовым зафиксировать те аспекты, которых вы не ожидали, и выяснять
                подробности, связанные с ними.
            </p>

            <p>Возможно, вы получите запрос на создание продукта, если сделать доработки.</p>

            <p>
                Поговорите с максимально возможным числом потенциальных клиентов, чтобы проверить, действительно ли они пытаются выполнить ЗАДАЧИ,
                которые вы описали на Канве предлагаемой ценности. Выясните, являются ли эти ЗАДАЧИ для них жизненно важными или незначительными?
                Выясните, действительно ли они испытывают те МИНУСЫ, которые, по вашему мнению, они должны испытывать. Являются ли эти МИНУСЫ
                сильными или слабыми? Проверьте, действительно ли они ценят ПЛЮСЫ, которые, по вашему мнению, они должны ценить.
            </p>

            <p>
                По результатам тестирования необходимо заполнить соответствующие формы и сделать вывод о прохождении или провале теста.
                Если тест провален, вернитесь на этап назад и повторите процедуру до положительного решения.
            </p>

        </div>

    </div>

<?php else : ?>

    <div class="methodological-guide">

        <h3 class="header-text"><span>Этап 6. Подтверждение гипотез ценностных предложений</span></h3>

        <div class="container-list">

            <h3><span class="bold">Шаг 3. Заполнение анкетных данных</span></h3>

            <div class="simple-block">
                <p>
                    <span>Задача:</span>
                    Проверить на соответствие рекомендациям и формату заполненную форму <span>Информация о респондентах и интервью.</span>
                </p>
                <p>
                    <span>Результат:</span>
                    Информация проверена. При необходимости сформированы замечания о необходимости произвести корректировки.
                </p>
            </div>

            <div class="bold">Рекомендации:</div>
            <div class="container-text">
                <ul>
                    <li class="pl-15">По возможности выяснить - являются ли представители списка интервьюируемых представителей сегмента таковыми;</li>
                    <li class="pl-15">Опираясь на здравый смысл проверить наличие одинаковых ответов (слово в слово) и указать на формальность или фиктивность проведенного интервью;</li>
                    <li class="pl-15">Проверить наличие вывода о значимости предлагаемого Ценностного предложения при внесении информации в форму Результаты интервью.</li>
                </ul>
            </div>

            <h4><span class="bold"><u>Информация, полученная Проектантом:</u></span></h4>

            <p>
                После проведения презентации необходимо задать подготовленные заранее вопросы. Не стоит навязываться с предложением отвечать
                на вопросы, если респонденты сами инициативно выражают свое отношение. Однако нужно добиться получение реакции на ключевые
                вопросы, которые вы заготовили. Во время диалога нужно быть готовым зафиксировать те аспекты, которых вы не ожидали, и выяснять
                подробности, связанные с ними.
            </p>

            <p>Возможно, вы получите запрос на создание продукта, если сделать доработки.</p>

            <p>
                Поговорите с максимально возможным числом потенциальных клиентов, чтобы проверить, действительно ли они пытаются выполнить ЗАДАЧИ,
                которые вы описали на Канве предлагаемой ценности. Выясните, являются ли эти ЗАДАЧИ для них жизненно важными или незначительными?
                Выясните, действительно ли они испытывают те МИНУСЫ, которые, по вашему мнению, они должны испытывать. Являются ли эти МИНУСЫ
                сильными или слабыми? Проверьте, действительно ли они ценят ПЛЮСЫ, которые, по вашему мнению, они должны ценить.
            </p>

            <p>
                По результатам тестирования необходимо заполнить соответствующие формы и сделать вывод о прохождении или провале теста.
                Если тест провален, вернитесь на этап назад и повторите процедуру до положительного решения.
            </p>

        </div>

    </div>

<?php endif; ?>

<div class="row">
    <div class="col-md-12" style="display:flex;justify-content: center;">
        <?= Html::button('Закрыть', [
            'onclick' => 'return $(".modal_instruction_page").modal("hide");',
            'class' => 'btn btn-default',
            'style' => [
                'display' => 'flex',
                'align-items' => 'center',
                'justify-content' => 'center',
                'background' => '#F5A4A4',
                'color' => '#ffffff',
                'width' => '180px',
                'height' => '40px',
                'font-size' => '16px',
                'text-transform' => 'uppercase',
                'font-weight' => '700',
                'padding-top' => '9px',
                'border-radius' => '8px',
                'margin-top' => '28px'
            ]
        ]) ?>
    </div>
</div>
