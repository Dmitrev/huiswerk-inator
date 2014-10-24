<?php
use Validator\NewComment;
use Validator\EditComment;

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

  public function edit($id = null)
  {
    $comment = Comment::findOrFail($id);

    if( $this->hasPermission($comment) )
      return App::abort(403);

    return View::make('comment-edit')
      ->with('title', 'Je reactie bewerken')
      ->with('comment', $comment);

  }

  public function update()
  {
    $input = Input::only(['id', 'body']);

    $comment = Comment::findOrFail($input['id']);

    if( $this->hasPermission($comment) )
      return App::abort(403);

    $v = new EditComment($input);

    if( $v->fails() )
    {
      return Redirect::back()
        ->withInput()
        ->withErrors($v->errors());
    }

    $v->save($comment);

    return Redirect::route('homework', [$v->entry()->homework_id])
      ->with('success', 'Reactie is succesvol aangepast');
  }

  private function hasPermission($comment)
  {
    return ( Auth::user()->id != $comment->user_id
        || !Auth::user()->has('admin') );
  }

  public function confirmDelete($id)
  {
    $comment = Comment::getId($id);

    if( $this->hasPermission($comment) )
      return App::abort(403);


    return View::make('comment-confirm-delete')
      ->with('title', 'Reactie verwijderen')
      ->with('comment', $comment);

  }

  public function delete()
  {
    $comment = Comment::findOrFail( Input::get('comment_id') );

    if( $this->hasPermission($comment) )
      return App::abort(403);

    $redirect_url = URL::route('homework', [$comment->homework_id]);
    $comment->delete();

    return Redirect::to($redirect_url)
      ->with('success', 'Je reactie is succesvol verwijdered');


  }

}
