<?php

return [
    /*
     * Namespaces used by the generator.
     */
    'namespace' => [
        /*
         * Base namespace/directory to create the new file.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make User
         * Output: App\DataTables\UserDataTable
         * With Model: App\User (default model)
         * Export filename: users_timestamp
         */
        'base' => 'DataTables',

        /*
         * Base namespace/directory where your model's are located.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make Post --model
         * Output: App\DataTables\PostDataTable
         * With Model: App\Post
         * Export filename: posts_timestamp
         */
        'model' => '',
    ],

    /*
     * Set Custom stub folder
     */
    //'stub' => '/resources/custom_stub',

    /*
     * PDF generator to be used when converting the table to pdf.
     * Available generators: excel, snappy
     * Snappy package: barryvdh/laravel-snappy
     * Excel package: maatwebsite/excel
     */
    'pdf_generator' => 'snappy',

    /*
     * Snappy PDF options.
     */
    'snappy' => [
        'options' => [
            'no-outline'    => true,
            'margin-left'   => '0',
            'margin-right'  => '0',
            'margin-top'    => '10mm',
            'margin-bottom' => '10mm',
        ],
        'orientation' => 'landscape',
    ],

    /*
     * Default html builder parameters.
     */
    'parameters' => [
        'dom'     => 'Bfrtip',
        'order'   => [[0, 'asc']],
        'buttons' => [
            'create',
            'export',
            'print',
            'reset',
            'reload',
        ],
        'language' => [
            'buttons' => [
                'create' => 'Novo',
                'export' => 'Exportar',
                'print' => 'Imprimir',
                'reload' => 'Recarregar',
            ],
            'sEmptyTable' => 'Nenhum registro encontrado',
            'sInfo' => 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
            'sInfoEmpty' => 'Mostrando 0 até 0 de 0 registros',
            'sInfoFiltered' => '(Filtrados de _MAX_ registros)',
            'sInfoPostFix' => '',
            'sInfoThousands' => '.',
            'sLengthMenu' => '_MENU_  Resultados por página',
            'sLoadingRecords' => 'Carregando...',
            'sProcessing' => 'Processando...',
            'sZeroRecords' => 'Nenhum registro encontrado',
            'sSearch' => 'Pesquisar',
            'oPaginate' => [
                'sNext' => '<i class="fas fa-angle-right"></i><span class="sr-only">Next</span>',
                'sPrevious' => '<i class="fas fa-angle-left"></i><span class="sr-only">Previous</span>',
                'sFirst' => '<i class="fas fa-angle-left"></i><i class="fas fa-angle-left"></i>',
                'sLast' => '<i class="fas fa-angle-right"></i><<i class="fas fa-angle-right"></i><',
            ],
            'oAria' => [
                'sSortAscending' => ': Ordenar colunas de forma ascendente',
                'sSortDescending' => ': Ordenar colunas de forma descendente',
            ]
        ],
    ],
];
