<?php
/* Custom validation */
Validator::extend('valid_date', 'DateValidator@validDate');
Validator::extend('password_check', 'PasswordValidator@passwordCheck');
