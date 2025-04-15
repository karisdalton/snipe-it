<?php

return [

    'undeployable' 		 => '<strong>Внимание: </strong> Этот актив в настоящее время помечен как не подлежащий установке. Если этот статус изменился, пожалуйста обновите статус актива.',
    'does_not_exist' 	 => 'Актив не существует.',
    'does_not_exist_var' => 'Актив с тегом :asset_tag не найден.',
    'no_tag' 	         => 'Тег актива не предоставлен.',
    'does_not_exist_or_not_requestable' => 'Этот актив не существует или не подлежит запросу.',
    'assoc_users'	 	 => 'Этот актив в настоящее время привязан к пользователю и не может быть удален. Пожалуйста сначала снимите привязку, и затем попробуйте удалить снова. ',
    'warning_audit_date_mismatch' 	=> 'Дата следующего аудита этого актива (:next_audit_date) не может быть раньше последней даты аудита (:last_audit_date). Пожалуйста, обновите следующую дату аудита.',
    'labels_generated'   => 'Этикетки успешно сгенерированы.',
    'error_generating_labels' => 'Ошибка при создании этикеток.',
    'no_assets_selected' => 'Активы не выбраны.',

    'create' => [
        'error'   		=> 'Актив не был создан, пожалуйста попробуйте снова. :(',
        'success' 		=> 'Актив успешно создан. :)',
        'success_linked' => 'Актив с тегом :tag успешно создан. <strong><a href=":link" style="color: white;">Нажмите для просмотра</a></strong>.',
        'multi_success_linked' => 'Актив с номером :links успешно создан.|:count активов успешно созданы. :links.',
        'partial_failure' => 'Актив не может быть создан. Причина: :failures|:count активов не могут быть созданы. Причины: :failures',
    ],

    'update' => [
        'error'   			=> 'Актив не был изменен, пожалуйста попробуйте снова',
        'success' 			=> 'Актив успешно изменен.',
        'encrypted_warning' => 'Актив обновлен успешно, но зашифрованные пользовательские поля не были из-за разрешений',
        'nothing_updated'	=>  'Поля не выбраны, нечего обновлять.',
        'no_assets_selected'  =>  'Никакие ресурсы не были выбраны, поэтому ничего не обновлялось.',
        'assets_do_not_exist_or_are_invalid' => 'Выбранные медиафайлы не могут быть обновлены.',
    ],

    'restore' => [
        'error'   		=> 'Актив не был восстановлен, повторите попытку',
        'success' 		=> 'Актив успешно восстановлен.',
        'bulk_success' 		=> 'Актив успешно восстановлен.',
        'nothing_updated'   => 'Ни один из активов не выбран, поэтому ничего не восстановлено.', 
    ],

    'audit' => [
        'error'   		=> 'Аудит активов не удался: :error ',
        'success' 		=> 'Аудит успешно выполнен.',
    ],


    'deletefile' => [
        'error'   => 'Не удалось удалить файл. Повторите попытку.',
        'success' => 'Файл успешно удален.',
    ],

    'upload' => [
        'error'   => 'Не удалось загрузить файл(ы). Повторите попытку.',
        'success' => 'Файл(ы) успешно загружены.',
        'nofiles' => 'Не выбрано ни одного файла для загрузки или файл, который вы пытаетесь загрузить, слишком большой',
        'invalidfiles' => 'Один или несколько ваших файлов слишком большого размера или имеют неподдерживаемый формат. Разрешены только следующие форматы файлов:  png, gif, jpg, doc, docx, pdf, txt.',
    ],

    'import' => [
        'import_button'         => 'Процесс Импорта',
        'error'                 => 'Некоторые элементы не были импортированы корректно.',
        'errorDetail'           => 'Следующие элементы не были импортированы из за ошибок.',
        'success'               => 'Ваш файл был импортирован',
        'file_delete_success'   => 'Ваш файл был успешно удален',
        'file_delete_error'      => 'Невозможно удалить файл',
        'file_missing' => 'Выбранный файл отсутствует',
        'file_already_deleted' => 'Выбранный файл уже удален',
        'header_row_has_malformed_characters' => 'Один или несколько атрибутов в строке заголовка содержат неправильно сформированные символы UTF-8',
        'content_row_has_malformed_characters' => 'Один или несколько атрибутов в первой строке содержимого содержат неправильно сформированные символы UTF-8',
        'transliterate_failure' => 'Транслитерация из :encoding в UTF-8 не удалась из-за недопустимых символов во входных данных'
    ],


    'delete' => [
        'confirm'   	=> 'Вы уверены что хотите удалить этот актив?',
        'error'   		=> 'При удалении актива возникла проблема. Пожалуйста попробуйте снова.',
        'assigned_to_error' => '{1}Инвентарный номер: :asset_tag выдан в данный момент. Верните это устройство перед удалением. [2,*]Инвентарные номера: :asset_tag выданы в данный момент. Верните эти устройства перед удалением.',
        'nothing_updated'   => 'Ни один из активов не выбран, поэтому ничего не удалено.',
        'success' 		=> 'Актив был успешно удален.',
    ],

    'checkout' => [
        'error'   		=> 'Актив не был привязан, пожалуйста попробуйте снова',
        'success' 		=> 'Актив успешно привязан.',
        'user_does_not_exist' => 'Этот пользователь является недопустимым. Пожалуйста, попробуйте еще раз.',
        'not_available' => 'Данный актив недоступен к выдаче!',
        'no_assets_selected' => 'Вы должны выбрать хотя бы один актив из списка',
    ],

    'multi-checkout' => [
        'error'   => 'Актив не был выдан, пожалуйста попробуйте снова|Активы не были выданы, пожалуйста попробуйте снова',
        'success' => 'Актив успешно выдан.|Активы успешно выданы.',
    ],

    'checkin' => [
        'error'   		=> 'Актив не был отвязан, пожалуйста попробуйте снова',
        'success' 		=> 'Актив успешно отвязан.',
        'user_does_not_exist' => 'Этот пользователь является недопустимым. Пожалуйста, попробуйте еще раз.',
        'already_checked_in'  => 'Этот актив уже привязан.',

    ],

    'requests' => [
        'error'   		=> 'Request was not successful, please try again.',
        'success' 		=> 'Request successfully submitted.',
        'canceled'      => 'Request successfully canceled.',
        'cancel'        => 'Отменить запрос предмета',
    ],

];
