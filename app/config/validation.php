<?php

return array(

  /* Validation for subjects */
  'subject' => [
      'name' => ['required', 'max:255'],
      'abbreviation' => ['required','max:3']
    ],


);
