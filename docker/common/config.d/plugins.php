<?php

return [
    'plugins' => [
        'Analytics',
        'SpamDetector',
        'Zammad' => [
            'namespace' => 'Zammad',
            'config' => [
                'url' => 'https://suporte.mapacultural.cim-amfri.sc.gov.br/assets/chat/chat-no-jquery.min.js',
                'enabled' => true,
            ]
        ],
        'AdminLoginAsUser',
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'SamplePlugin' => ['namespace' => 'SamplePlugin'],
        'MapasBlame' => [
            'namespace' => 'MapasBlame',
            'config' => [
                'request.logData.PATCH' => function ($data) {
                    return $data;
                },
            ]
        ],
    ]
];