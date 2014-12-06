<?php

return array(
  '0' => [
      'class' => 'UserGroup',
      'permissions' => [
        /* Toevoegen huiswerk via the homepage */
        'add-homework'

      ]
    ],
  '1' => [
    'class' => 'ModeratorGroup',
    'inherit' => '0',
    'permissions' => [
      /* Wijzigen van huiswerk van alle gebruikers */
        'edit-homework',
        'delete-homework',
        /* Toegang tot het dashboard */

      ]
    ],
  '2' => [
    'class' => 'AdminGroup',
    'inherit' => '1',
    'permissions' => [
      'admin'
    ]
  ]
);
