<?php

return array(

  /* Validation for subjects */
  'subject' => [
      'name' => ['required', 'max:255'],
      'state' => 'boolean'
    ],

  'homework' => [
          'title' => 'required',
          'subject_id' => 'required|exists:subjects,id',
          'content' => 'required',
          'deadline_submit' => 'required'
      ],


);
