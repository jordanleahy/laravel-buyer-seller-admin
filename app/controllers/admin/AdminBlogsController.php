<?php
use Illuminate\Database\Eloquent\Model;
class AdminBlogsController extends AdminController {


    /**
     * Post Model
     * @var Post
     */
    protected $post;

    /**
     * Inject the models.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        parent::__construct();
        $this->post = $post;
    }

    /**
     * Show a list of all the blog posts.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/blogs/title.blog_management');

        // Grab all the blog posts
        $posts = $this->post;

        // Show the page
        return View::make('admin/blogs/index', compact('posts', 'title'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Title
        $title = Lang::get('admin/blogs/title.create_a_new_blog');
		$categories = Category::all();
        // Show the page
        return View::make('admin/blogs/create_edit', compact('title', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3',
        	'file' => 'image|max:3000',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new blog post
            $user = Auth::user();

            if (Input::get('visible')) {
                $this->post->visible = TRUE;
            } else {
                $this->post->visible = FALSE;
            }
            // Update the blog post data
            $this->post->title            = Input::get('title');
            $this->post->slug             = Str::slug(Input::get('title'));
            $this->post->content          = Input::get('content');
            $this->post->meta_title       = Input::get('meta-title');
            $this->post->meta_description = Input::get('meta-description');
            $this->post->meta_keywords    = Input::get('meta-keywords');
            $this->post->user_id          = $user->id;

            // Was the blog post created?
            if($this->post->save())
            {
            		// Many to Many relationships after id is created
                    $categories = Input::get('category');
            		foreach ($categories as $category) {
            			$this->post->categories()->attach($category);
            			$this->post->save();
            		}
                	// Redirect to the new blog post page
                	return Redirect::to('admin/blogs/' . $this->post->id . '/edit')->with('success', Lang::get('admin/blogs/messages.create.success'));            	
            }

            // Redirect to the blog post create page
            return Redirect::to('admin/blogs/create')->with('error', Lang::get('admin/blogs/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/blogs/create')->withInput()->withErrors($validator);
	}

    /**
     * Display the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getShow($post)
	{
        // redirect to the frontend
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($post)
	{
        // Title
        $title = Lang::get('admin/blogs/title.blog_update');
        $categories = array();
		foreach (Category::all() as $category) {
			$selected = FALSE;
			foreach ($post->categories as $postCategory) {
				if ($postCategory->id === $category->id) {
					$selected = TRUE;
					break;
				}
			}
			$categories[] = array("id" => $category->id, "name"=> $category->name, "selected" => $selected);
		}
        // Show the page
        return View::make('admin/blogs/create_edit', compact('post', 'title', 'categories'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($post)
	{

        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);



        // Check if the form validates with success
        if ($validator->passes())
        {
            //How to handle checkboxes
            if (Input::get('visible')) {
                $post->visible = TRUE;
            } else {
                $post->visible = FALSE;
            }
            $post->title            = Input::get('title');
            $post->slug             = Str::slug(Input::get('title'));
            $post->content          = Input::get('content');
            $post->meta_title       = Input::get('meta-title');
            $post->meta_description = Input::get('meta-description');
            $post->meta_keywords    = Input::get('meta-keywords');
            $categories = Input::get('category');
            $post->categories()->sync($categories);
            // Was the blog post updated?
            if($post->save())
            {
                // Redirect to the new blog post page 
                return Redirect::to('admin/blogs/' . $post->id . '/edit')->with('success', Lang::get('admin/blogs/messages.update.success'));
            }
            // Redirect to the blogs post management page
            return Redirect::to('admin/blogs/' . $post->id . '/edit')->with('error', Lang::get('admin/blogs/messages.update.error'));
        }
        // Form validation failed
        return Redirect::to('admin/blogs/' . $post->id . '/edit')->withInput()->withErrors($validator);
	}
	
	/**
	 * Edit the images associated with a post 
	 */
	public function postImages($post)
	{
		$input = Input::all();
		$imagecount = count($post->images) + 1;
		$rules = array(
				'file' => 'image|max:3000',
		);
		$validation = Validator::make($input, $rules);
		if ($validation->fails())
		{
			return Response::make($validation->errors->first(), 400);
		}
		$file = Input::file('file');
		$extension = $file->getClientOriginalExtension();
		$directory = public_path() . '/uploads/'.$post->id;
		$filename = 'upload.original'. $imagecount . "." . $extension;
		$upload_success = Input::file('file')->move($directory, $filename);
		if( $upload_success ) {
			$image = new Image;			
			$image->filename = $filename;			
			if ($image->save()) {
				$image->posts()->attach($post);
				$image->save();
        		return Response::json('success', 200);
			}
        }
        return Response::json('error', 400);
	}
	
	
	public function postCover($post)
	{
		$input = Input::all();
		$imagecount = count($post->images) + 1;
		$rules = array(
				'file' => 'image|max:3000',
		);
		$validation = Validator::make($input, $rules);
		if ($validation->fails())
		{
			return Response::make($validation->errors->first(), 400);
		}
		$file = Input::file('file');
		$extension = $file->getClientOriginalExtension();
		$directory = public_path() . '/uploads/'.$post->id;
		$filename = 'cover.original'. $imagecount . "." . $extension;
		$upload_success = Input::file('file')->move($directory, $filename);
		if( $upload_success ) {
			$image = new Image;
			$image->filename = $filename;
			$image->filepath = $directory;
			$image->save();
			$post->cover()->associate($image);
			if ($post->save()) {
				return Response::json('success', 200);
			}
		}
	
		return Response::json('error', 400);
	
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function getDelete($post)
    {
        // Title
        $title = Lang::get('admin/blogs/title.blog_delete');

        // Show the page
        return View::make('admin/blogs/delete', compact('post', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete($post)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $post->id;
            $post->delete();

            // Was the blog post deleted?
            $post = Post::find($id);
            if(empty($post))
            {
                // Redirect to the blog posts management page
                return Redirect::to('admin/blogs')->with('success', Lang::get('admin/blogs/messages.delete.success'));
            }
        }
        // There was a problem deleting the blog post
        return Redirect::to('admin/blogs')->with('error', Lang::get('admin/blogs/messages.delete.error'));
    }

    /**
     * Show a list of all the blog posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $posts = Post::select(array('posts.id', 'posts.title', 'posts.id as comments', 'posts.created_at'));

        return Datatables::of($posts)

        ->edit_column('comments', '{{ DB::table(\'comments\')->where(\'post_id\', \'=\', $id)->count() }}')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/blogs/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>
                <a href="{{{ URL::to(\'admin/blogs/\' . $id . \'/delete\' ) }}}" class="btn btn-xs btn-danger iframe">{{{ Lang::get(\'button.delete\') }}}</a>
            ')

        ->remove_column('id')

        ->make();
    }

}