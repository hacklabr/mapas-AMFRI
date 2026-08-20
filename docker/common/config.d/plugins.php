<?php

return [
    'plugins' => [
        'Analytics',
        'SpamDetector',
        'Zammad' => [
            'namespace' => 'Zammad',
            'config' => [
                'enabled' => true,
                'url' => 'https://suporte.mapasculturais.com.br/assets/chat/chat-no-jquery.min.js',    
                'background' => '#F66968',
                'title' => 'Duvidas? Fale conosco',
                'chatId' => 4,
                'instacacao' => 'mapacultural.cim-amfri.sc.gov.br',
                'estado' => 'Santa Catarina'
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