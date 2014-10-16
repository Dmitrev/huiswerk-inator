<?php
use Validator\NewComment;

class CommentsController extends BaseController{

  public function post()
  {

    $input = Input::only(['homework_id', 'comment']);
    $input['user_id'] = Auth::user()->id;

    $comment = new NewComment($input);

    if( $comment->fails()){
      return Redirect::back()->withInput()
        ->withErrors($comment->errors());
    }

    $comment->save();
    $entry = $comment->entry();

    # Redirect naar url/#comment-{id}
    $url = URL::route('homework', [$entry->homework_id]).'#comment-'.$entry->id;
    return Redirect::to( $url )
      ->with('success', 'Reactie is succesvol geplaatst');
  }

}
