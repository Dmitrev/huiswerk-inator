<?php
/* Custom validation */
Validator::extend('valid_date', 'DateValidator@validDate');
Validator::extend('password_check', 'PasswordValidator@passwordCheck');
Validator::extend('after_date', 'DateValidator@afterDate');
Validator::extend('before_date', 'DateValidator@beforeDate');
