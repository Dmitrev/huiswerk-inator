<?php
$key = 'prev-page-home';
$data = Session::get($key);
$default = URL::route('home');

if( !Session::has($key) )
{
  $url = $default;
}
else
{
  if(
    !is_array($data) ||
    !array_key_exists( 'weeks', $data) ||
    !array_key_exists( 'newer', $data )
  )
  {
    $url = $default;
  }
  else
  {
    if( is_numeric($data['weeks']) && !$data['newer'] )
    {
      $url = URL::route('home-older', [$data['weeks']]);
    }
    else if( is_numeric($data['weeks']) && $data['newer']  )
    {
      $url = URL::route('home-newer', [$data['weeks']]);
    }
    else{
      $url = $default;
    }

  }
}
?>
@include('common.back', ['url' => $url])
