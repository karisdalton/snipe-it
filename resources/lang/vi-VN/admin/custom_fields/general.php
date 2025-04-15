<?php

return [
    'custom_fields'		        => 'Trường tùy chỉnh',
    'manage'                    => 'Manage',
    'field'		                => 'Cánh đồng',
    'about_fieldsets_title'		=> 'Giới thiệu về các trường',
    'about_fieldsets_text'		=> 'Các trường cho phép bạn tạo các nhóm trường tuỳ chỉnh thường xuyên được sử dụng lại cho các mô hình tài sản cụ thể.',
    'custom_format'             => 'Định dạng tuỳ chỉnh...',
    'encrypt_field'      	        => 'Mã hóa giá trị của trường này trong cơ sở dữ liệu',
    'encrypt_field_help'      => 'CẢNH BÁO: Mã hóa một trường làm cho nó không thể tìm kiếm được.',
    'encrypted'      	        => 'Mã hóa',
    'fieldset'      	        => 'Fieldset',
    'qty_fields'      	      => 'Các trường Số lượng',
    'fieldsets'      	        => 'Các trường',
    'fieldset_name'           => 'Tên trường',
    'field_name'              => 'Tên trường',
    'field_values'            => 'Giá trị trường',
    'field_values_help'       => 'Thêm các tùy chọn có thể chọn, một trong mỗi dòng. Các dòng trống khác dòng đầu tiên sẽ bị bỏ qua.',
    'field_element'           => 'Phần tử Mẫu',
    'field_element_short'     => 'Thành phần',
    'field_format'            => 'định dạng',
    'field_custom_format'     => 'Định dạng Tuỳ chỉnh',
    'field_custom_format_help'     => 'Trường này cho phép bạn sử dụng biểu thức regex để xác thực. Nó sẽ bắt đầu bằng "regex:" - ví dụ: để xác thực rằng giá trị trường tùy chỉnh chứa IMEI hợp lệ (15 chữ số), bạn sẽ dùng <code>regex:/^[0-9]{15}$/</code>.',
    'required'   		          => 'Cần thiết',
    'req'   		              => 'Req.',
    'used_by_models'   		    => 'Được sử dụng theo mô hình',
    'order'   		            => 'Gọi món',
    'create_fieldset'         => 'New Fieldset',
    'update_fieldset'         => 'Update Fieldset',
    'fieldset_does_not_exist'   => 'Fieldset :id does not exist',
    'fieldset_updated'         => 'Fieldset updated',
    'create_fieldset_title' => 'Create a new fieldset',
    'create_field'            => 'Trường tùy chỉnh mới',
    'create_field_title' => 'Create a new custom field',
    'value_encrypted'      	        => 'Giá trị của trường này được mã hóa trong cơ sở dữ liệu. Chỉ những người dùng quản trị mới có thể xem được giá trị được giải mã',
    'show_in_email'     => 'Bao gồm giá trị của trường này trong email thanh toán được gửi tới người dùng? Các trường được mã hóa không thể được bao gồm trong email',
    'show_in_email_short' => 'Include in emails',
    'help_text' => 'Help Text',
    'help_text_description' => 'This is optional text that will appear below the form elements while editing an asset to provide context on the field.',
    'about_custom_fields_title' => 'About Custom Fields',
    'about_custom_fields_text' => 'Custom fields allow you to add arbitrary attributes to assets.',
    'add_field_to_fieldset' => 'Add Field to Fieldset',
    'make_optional' => 'Required - click to make optional',
    'make_required' => 'Optional - click to make required',
    'reorder' => 'Reorder',
    'db_field' => 'DB Field',
    'db_convert_warning' => 'WARNING. This field is in the custom fields table as <code>:db_column</code> but should be <code>:expected</code>.',
    'is_unique' => 'This value must be unique across all assets',
    'unique' => 'Duy nhất',
    'display_in_user_view' => 'Allow the checked out user to view these values in their View Assigned Assets page',
    'display_in_user_view_table' => 'Visible to User',
    'auto_add_to_fieldsets' => 'Automatically add this to every new fieldset',
    'add_to_preexisting_fieldsets' => 'Add to any existing fieldsets',
    'show_in_listview' => 'Show in list views by default. Authorized users will still be able to show/hide via the column selector',
    'show_in_listview_short' => 'Show in lists',
    'show_in_requestable_list_short' => 'Show in requestable assets list',
    'show_in_requestable_list' => 'Show value in requestable assets list. Encrypted fields will not be shown',
    'encrypted_options' => 'This field is encrypted, so some display options will not be available.',
    'display_checkin' => 'Display in checkin forms',
    'display_checkout' => 'Display in checkout forms',
    'display_audit' => 'Display in audit forms',

];
