<?php

return array(

  /* Validation for subjects */
  'subject' => [
      'name' => ['required', 'max:255'],
      'abbreviation' => ['required','max:3']
    ],

  'homework' => [
          'title' => 'required',
          'subject_id' => 'required|exists:subjects,id',
          'content' => 'required',
          'deadline_submit' => 'required'
      ],


);
