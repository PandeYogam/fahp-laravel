<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Coment as ModelsComment;

class Comment extends Component
{
    public $body, $body2, $post;
    public $coment_id, $edit_comment_id;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.post.comment', [
            'comments' => ModelsComment::with('user', 'children')
                ->where('post_id', $this->post->id)
                ->whereNull('coment_id')->get(),
            'total_comments' => ModelsComment::where('post_id', $this->post->id)->count(),
        ]);
    }

    public function store()
    {
        $this->validate(['body' => 'required']);
        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->body = NULL;
            // session()->flash('success', 'komentar berhasil dibuat');
            // return redirect()->to('/posts/' . $this->post->slug);
        } else {
            session()->flash('danger', 'komentar gagal dibuat');
            return redirect('/posts/{post:slug}');
        }
    }

    public function selectEdit($id)
    {
        $comment = ModelsComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
        $this->coment_id = NULL;
        // dd($comment);
    }

    public function change()
    {
        $this->validate(['body2' => 'required']);
        $comment = ModelsComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2,
            // tambahin untuk edited disini
            // 'edited' => 1
        ]);

        if ($comment) {
            $this->emit('comment_store', $this->edit_comment_id);
            $this->body = NULL;
            $this->edit_comment_id = NULL;

            // session()->flash('success', 'komentar berhasil dibuat');
            // return redirect()->to('/posts/' . $this->post->slug);
        } else {
            session()->flash('danger', 'komentar gagal diubah');
            return redirect('/posts/{post:slug}');
        }
    }

    public function selectReply($coment_id)
    {
        $this->coment_id = $coment_id;
        $this->edit_comment_id = NULL;
        $this->body2 = NULL;
        // $comment = ModelsComment::find($id);
        // dd($comment);
    }

    public function reply()
    {
        $this->validate(['body2' => 'required']);
        $comment = ModelsComment::find($this->coment_id);
        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body2,
            'coment_id' => $comment->coment_id ? $comment->coment_id : $comment->id,
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->body2 = NULL;
        } else {
            session()->flash('danger', 'komentar gagal dibuat');
            return redirect('/posts/{post:slug}');
        }
    }

    public function delete($id)
    {
        $comment = ModelsComment::where('id', $id)->delete();

        if ($comment) {
            return NULL;
        } else {
            session()->flash('danger', 'komentar gagal dihapus');
            return redirect('/posts/{post:slug}');
        }
    }
}
