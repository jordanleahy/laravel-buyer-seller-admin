<?php
class AdminImagesController extends AdminController {
    /**
     * Image Model
     * @var Image
     */
    protected $image;


    /**
     * Inject the models.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        parent::__construct();
        $this->image = $image;
    }

    /**
     * Remove image.
     *
     * @param $image
     * @return Response
     */
    public function getDelete($image)
    {
        header('Content-Type: application/json');
        echo json_encode($image);
        die;
    }
}
