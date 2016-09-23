<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;

class CommentsController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      // $this->middleware('guest', ['except' => 'logout']);
  }

  /**
	 * Fill the data
	 * @return Comment
	*/
	private function fill($id = NULL, Request $request)
	{
		if ($id)
			$comment = Comment::find($id);
		else
			$comment = new Comment;

		$comment->post_id = $request->input('post_id');
		$comment->user_id = $request->input('user_id');
		$comment->text = $request->input('text');
		$comment->save();

		return $comment;
	}

	public function get()
	{
		return response()->json(Comment::all());
	}

	public function getByPost($postId)
	{
		return Comment::where('post_id', $postId)->get();
	}

	public function store(Request $request)
	{
		$comment = $this->fill(NULL, $request);

		return 'Registro criado com sucesso!';
	}

	public function update($id)
	{
		$comment = $this->fill($id);

		return 'Registro atualizado com sucesso!';
	}

	public function delete($id)
	{
		$comment = Comment::find($id);
		$comment->destroy();

		return 'Registro apagado com sucesso!';
	}
}
