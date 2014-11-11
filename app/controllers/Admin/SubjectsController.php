<?php namespace Admin;
use Subject;
class SubjectsController extends BaseController{

  public function index() {

    $subjects = Subject::paginate(10);

    return $this->makeView('index', [

      'heading' => 'Overzicht van alle vakken',
      'resource' => 'subject',
      'entries' => $subjects,

      'cols' => [
        [
          'heading' => 'ID',
          'source' => 'id'
        ],

        [
            'heading' => 'naam',
            'source' => 'name',
            'link' => true
        ]
      ]
    ]);

  }

  public function create() {
    //Showing form to create new entry
  }

  public function store() {
    //Validate entry, on success store to database
  }

  public function show($id) {
    //Show a single entry
  }

  public function edit($id) {
    //Edit an entry
  }

  public function update($id) {
    //Update an entry
  }

  public function destroy($id) {
    //Destroy an entry
  }

}
