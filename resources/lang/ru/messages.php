<?php
return [
    'admin' => [
        'news' => [
            'create' => [
                'success' => 'Новость была добавлена',
                'fail' => 'Ошибка добавления'
            ],
            'edit' => [
                'success' => 'Новость была обновлена',
                'fail' => 'Ошибка обновления'
            ]
        ]
    ],
    'guest' => [
        'order' => [
            'edit' => [
                'success' => 'Заказ был обновлен'
            ],
            'destroy' => [
                'success' => 'Заказ был удален'
            ]
        ],
        'feedback' => [
            'edit' => [
                'success' => 'Отзыв был обновлен'
            ],
            'destroy' => [
                'success' => 'Отзыв был удален'
            ]
        ],
        'order_create' => [
            'success' => 'Заказ успешно отправлен'
        ],
        'feedback_create' => [
            'success' => 'Ваш отзыв успешно отправлен'
        ]
    ]
];
