<?php
use \Mockery\CountValidator\Exception;
use Util\Upload;
class UploadController extends BaseController{

    private $file;
    private $filename = 'file';
    private $data = NULL;
    private $validator_rules = 'image';

    private $code = array(
        'empty_file' => array(
            'code' => 1,
            'message' => 'No files recieved'
        ),

        'invalid_type' => array(
            'code' => 2,
            'message' => 'File is not an image'
        ),
        'upload_failed' => array(
            'code' => 3,
            'message' => 'something went wrong during the upload process'
        )
    );

    public function upload()
    {
        /* No data has been sent */
        if ($this->emptyFile())
            return $this->error( 'empty_file' );

        $this->file = Input::file( $this->filename );

        if ( !$this->isImageFile() )
        {
            return $this->error('invalid_type');
        }


        if( !$this->uploaded() )
        {
            return $this->error('upload_failed');
        }


        return $this->success();
    }

    private function emptyFile()
    {
        return !Input::hasFile( $this->filename);
    }

    private function isImageFile()
    {
        $rules = array(
            $this->filename => $this->validator_rules
        );

        // Now pass the input and rules into the validator
        $validator = Validator::make(Input::all(), $rules);

        // Check to see if validation fails or passes
        return $validator->passes();
    }

    public function uploaded()
    {
        $uploader = new Upload();
        $uploader->setFile( $this->file );

        $this->data = $uploader->upload();

        if( !is_null($this->data))
            return true;

        return false;
    }

    private function error( $code )
    {
        if( !array_key_exists($code, $this->code) )
        {
            throw new Exception( "Error code not defined" );
        }

        $error = $this->code[$code];

        return Response::json([
            'error' => 1,
            'code' => $error['code'],
            'message' => $error['message']
        ]);
    }


    private function success()
    {
        return Response::json([
            'error' => 0,
            'link' => $this->data['data']['link']
        ]);
    }

}