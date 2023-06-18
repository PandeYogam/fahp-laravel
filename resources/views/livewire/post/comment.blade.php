<div>
  <h5 class=" mb-3">{{ $total_comments }} comments</h5>
  @auth  
    <form wire:submit.prevent="store">
      <div class="mb-3"> 
        <textarea wire:model.defer="body" rows="2" class="form-control @error('body') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
          @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <div class="d-grid mb-4">
        <button type="submit" class=" btn btn-primary">Submit</button>
      </div>
    </form>
    @if (session('success'))
    <div class=" bg-success text-white">
      <div class="container">{{ session('success') }}</div>
    </div>
    @endif
    @if (session('danger'))
      <div class=" bg-danger text-white">
        <div class="container">{{ session('danger') }}</div>
      </div>
    @endif
  @endauth

  @guest
    <div class="alert alert-primary" role="alert">
      Login dahulu untuk berkomentar <a href="/login">Login</a>
    </div>
  @endguest

  @foreach ($comments as $item)
  <div class=" mb-3" id="comment-{{ $item->id }}">
    <div class="d-flex align-items-start">
        {{-- commentParent --}}
        <img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-account-circle_89831.png" alt="" class=" img-fluid rounded-circle me-2 pt-2" width="40">
        <div>
          <div> 
              <span>{{ $item->user->name }}</span>
              <span> || </span>
              <span>{{ $item->created_at->diffForHumans() }}</span>
          </div>
          <div>
              {{ $item->body }}
          </div>

          {{-- feature --}}
          <div class="d-flex mt-2">
            {{-- <div class=" pe-0 align-items-center">2 
              <i class="bi bi-heart-fill"></i>
            </div> --}}
            @auth
              {{-- <div class=" pe-2"><a href="" class="">Like</a></div> --}}

              {{-- <button type="button" class="btn btn-link pe-0 py-0" @if($item->user->id == Auth::user()->id) disabled @endif>Like</button> --}}

              @if (isset($item->hasLike) && !empty($item->hasLike))
                <button wire:click="like({{ $item->id }})" class="btn btn-sm btn-danger">
                  <i class="bi bi-heart-fill"></i>
                  ({{ $item->totalLikes() }})
                </button>
              @else
                <button wire:click="like({{ $item->id }})" class="btn btn-sm btn-dark">
                  <i class="bi bi-heart-fill"></i>
                  ({{ $item->totalLikes() }})
                </button>
              @endif

              <button type="button" class="btn btn-link pe-0 py-0 text-decoration-none text-dark" wire:click="selectReply({{ $item->id }})">Balas</button>
              @if ($item->user->id == Auth::user()->id)
              <button type="button" class="btn btn-link pe-0 py-0 text-decoration-none text-dark" wire:click="selectEdit({{ $item->id }})">Edit</button>
              <button type="button" class="btn btn-link pe-0 py-0 text-decoration-none text-dark" wire:click="delete({{ $item->id }})">Hapus</button>
              @endif
            @endauth
          </div>

          {{-- Balas --}}

          @if(isset($coment_id) && $coment_id == $item->id) 
          <form wire:submit.prevent="reply" class="mt-3">
            <div class="mb-3"> 
              <textarea wire:model.defer="body2" rows="2" class="form-control @error('body2') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
              @error('body2')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-grid">
              <button type="submit" class=" btn btn-warning">submit</button>
            </div>
          </form>  
          @endif

          {{-- Edit --}}
          @if(isset($edit_comment_id) && $edit_comment_id == $item->id) 
          <form wire:submit.prevent="change" class="mt-3">
            <div class="mb-3"> 
              <textarea wire:model.defer="body2" rows="2" class="form-control @error('body2') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
              @error('body2')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-grid">
              <button type="submit" class=" btn btn-warning">Edit</button>
            </div>
          </form>
          @endif
          
        </div>
    </div>

    {{-- children Comment --}}

    @if ($item->children)
      @foreach ($item->children as $item2)
        <div class="d-flex align-items-start ms-5 mt-2">
          <img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-account-circle_89831.png" alt="" class=" img-fluid rounded-circle me-2 pt-2" width="40">
          <div>
            <div>
                <span>{{ $item2->user->name }}</span>
                <span> || </span>
                <span>{{ $item2->created_at->diffForHumans() }}</span>
            </div>
            <div>
              {{ $item2->body }}
            </div>

            {{-- fitur --}}
            <div class="d-flex flex-row mt-2">
              @auth

              @if ($item2->hasLike())
                <button wire:click="like({{ $item2->id }})" class="btn btn-sm btn-danger">
                  <i class="bi bi-heart-fill"></i>
                  ({{ $item2->totalLikes() }})
                </button>
              @else
                <button wire:click="like({{ $item2->id }})" class="btn btn-sm btn-dark">
                  <i class="bi bi-heart-fill"></i>
                  ({{ $item2->totalLikes() }})
                </button>
              @endif

              <button type="button" class="btn btn-link pe-0 py-0" @if($item2->user->id == Auth::user()->id) disabled @endif>Like</button>
              <button type="button" class="btn btn-link pe-0 py-0" wire:click="selectReply({{ $item2->id }})">balas</button>
              @if ($item2->user->id == Auth::user()->id)
              <button type="button" class="btn btn-link pe-0 py-0" wire:click="selectEdit({{ $item2->id }})">edit</button>
              <button type="button" class="btn btn-link pe-0 py-0" wire:click="delete({{ $item2->id }})">Hapus</button>
              @endif
              @endauth
            </div>

            {{-- balas --}}
            @if(isset($coment_id) && $coment_id == $item2->id) 
            <form wire:submit.prevent="reply" class="mt-3">
              <div class="mb-3"> 
                <textarea wire:model.defer="body2" rows="2" class="form-control @error('body2') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
                @error('body2')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="d-grid">
                <button type="submit" class=" btn btn-warning">submit</button>
              </div>
            </form>  
            @endif

            {{-- Edit --}}
            @if(isset($edit_comment_id) && $edit_comment_id == $item2->id) 
            <form wire:submit.prevent="change" class="mt-3">
              <div class="mb-3"> 
                <textarea wire:model.defer="body2" rows="2" class="form-control @error('body2') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
                @error('body2')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="d-grid">
                <button type="submit" class=" btn btn-warning">Edit</button>
              </div>
            </form>
            @endif

          </div>
        </div>
        
      @endforeach
    @endif

    <hr>
  </div>
  @endforeach
</div>
