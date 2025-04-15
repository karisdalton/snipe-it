<?php

return [
    'custom_fields'		        => 'Prilagođena polja',
    'manage'                    => 'Manage',
    'field'		                => 'Polje',
    'about_fieldsets_title'		=> 'O karticama Fieldsets',
    'about_fieldsets_text'		=> 'Fieldsets allow you to create groups of custom fields that are frequently re-used for specific asset model types.',
    'custom_format'             => 'Custom Regex format...',
    'encrypt_field'      	        => 'Šifriranje vrijednosti ovog polja u bazi podataka',
    'encrypt_field_help'      => 'UPOZORENJE: Šifriranje polja čini ga nedokučivim.',
    'encrypted'      	        => 'kodiran',
    'fieldset'      	        => 'Fieldset',
    'qty_fields'      	      => 'Broj polja',
    'fieldsets'      	        => 'Fieldsets',
    'fieldset_name'           => 'Naziv polja',
    'field_name'              => 'Naziv polja',
    'field_values'            => 'Vrijednosti polja',
    'field_values_help'       => 'Dodajte opcije koje se mogu odabrati, jednu po retku. Prazne linije osim prvog retka zanemaruju se.',
    'field_element'           => 'Obrazac elementa',
    'field_element_short'     => 'Element',
    'field_format'            => 'Format',
    'field_custom_format'     => 'Prilagođeni format',
    'field_custom_format_help'     => 'Ovo polje omogućuje vam upotrebu regex izraza za provjeru valjanosti. Trebalo bi početi s "regex:" - primjerice, da biste potvrdili da prilagođena vrijednost polja sadrži važeći IMEI (15 numeričkih znamenki), upotrijebite <code>regex: / ^ [0-9]{15} $ / </code>.',
    'required'   		          => 'Potreban',
    'req'   		              => 'Req.',
    'used_by_models'   		    => 'Koristi se po modelu',
    'order'   		            => 'Narudžba',
    'create_fieldset'         => 'Novi Fieldset',
    'update_fieldset'         => 'Update Fieldset',
    'fieldset_does_not_exist'   => 'Fieldset :id does not exist',
    'fieldset_updated'         => 'Fieldset updated',
    'create_fieldset_title' => 'Create a new fieldset',
    'create_field'            => 'Novi prilagođeni polje',
    'create_field_title' => 'Create a new custom field',
    'value_encrypted'      	        => 'Vrijednost ovog polja je šifrirana u bazi podataka. Samo administratori administratora moći će vidjeti dešifriranu vrijednost',
    'show_in_email'     => 'Prikazati vrijednost ovog polja u checkout e-mailovima koji se šalju korisnicima? Enkriptirana polja se ne mogu prikazati u e-mailovima',
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
    'unique' => 'Unique',
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
