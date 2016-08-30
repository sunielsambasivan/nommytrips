<?php
/***
* custom fields for taxonomies
* using tax-meta-class plugin
**/

/**
Field(s) for Cities
**/

if (is_admin()){

$prefix = 'nt_';

/* 
 * configure meta box
 */
$config = array(
  'id' => 'location_info',                    // meta box id, unique per meta box
  'title' => 'Location Information',          // meta box title
  'pages' => array('city'),                   // taxonomy name, accept categories, post_tag and custom taxonomies
  'context' => 'normal',                      // where the meta box appear: normal (default), advanced, side; optional
  'fields' => array(),                        // list of meta fields (can be added by field arrays)
  'local_images' => true,                     // Use local or hosted images (meta box images for add/remove)
  'use_with_theme' => false                   //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$metabox =  new Tax_Meta_Class( $config );

$metabox->addSelect( 
  $prefix . 'state-prov', 
  array(
    '' => 'Choose',
    'AL' => 'Alabama',
    'AK' => 'Alaska',
    'AZ' => 'Arizona',
    'AR' => 'Arkansas',
    'CA' => 'California',
    'CO' => 'Colorado',
    'CT' => 'Connecticut',
    'DE' => 'Delaware',
    'DC' => 'District Of Columbia',
    'FL' => 'Florida',
    'GA' => 'Georgia',
    'HI' => 'Hawaii',
    'ID' => 'Idaho',
    'IL' => 'Illinois',
    'IN' => 'Indiana',
    'IA' => 'Iowa',
    'KS' => 'Kansas',
    'KY' => 'Kentucky',
    'LA' => 'Louisiana',
    'ME' => 'Maine',
    'MD' => 'Maryland',
    'MA' => 'Massachusetts',
    'MI' => 'Michigan',
    'MN' => 'Minnesota',
    'MS' => 'Mississippi',
    'MO' => 'Missouri',
    'MT' => 'Montana',
    'NE' => 'Nebraska',
    'NV' => 'Nevada',
    'NH' => 'New Hampshire',
    'NJ' => 'New Jersey',
    'NM' => 'New Mexico',
    'NY' => 'New York',
    'NC' => 'North Carolina',
    'ND' => 'North Dakota',
    'OH' => 'Ohio',
    'OK' => 'Oklahoma',
    'OR' => 'Oregon',
    'PA' => 'Pennsylvania',
    'RI' => 'Rhode Island',
    'SC' => 'South Carolina',
    'SD' => 'South Dakota',
    'TN' => 'Tennessee',
    'TX' => 'Texas',
    'UT' => 'Utah',
    'VT' => 'Vermont',
    'VA' => 'Virginia',
    'WA' => 'Washington',
    'WV' => 'West Virginia',
    'WI' => 'Wisconsin',
    'WY' => 'Wyoming',
    'AS' => 'American Samoa',
    'GU' => 'Guam',
    'MP' => 'Northern Mariana Islands',
    'PR' => 'Puerto Rico',
    'UM' => 'United States Minor Outlying Islands',
    'VI' => 'Virgin Islands',
    'AB' => 'Alberta',
    'BC' => 'British Columbia',
    'MB' => 'Manitoba',
    'NB' => 'New Brunswick',
    'NL' => 'Newfoundland and Labrador',
    'NS' => 'Nova Scotia',
    'ON' => 'Ontario',
    'PE' => 'Prince Edward Island',
    'QC' => 'Quebec',
    'SK' => 'Saskatchewan',
    'NT' => 'Northwest Territories',
    'NU' => 'Nunavut',
    'YT' => 'Yukon'
  ),
  array('name'=> __('State/Province ','tax-meta'), 'std'=> array('')
  )
);

$metabox->addText(
  $prefix . 'map_info',
  array('name'=> __(
    'Google Maps ',
    'tax-meta'
  ),
  'desc' => 'Mapping info')
);

$metabox->addFile(
  $prefix . 'city_img',
  array('name'=> __(
    'City Image ',
    'tax-meta'
  ),
  'desc' => 'The image for the city')
);

$metabox->addCheckbox(
  $prefix . 'feat_city',
  array('name'=> __(
    'Featured City ',
    'tax-meta'
  ),
  'desc' => 'Featured city (y/n) (Shows up on home page)')
);

$metabox->Finish();

}