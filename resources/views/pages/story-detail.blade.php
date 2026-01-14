@extends('layouts.main')

@section('title', $story->title . ' - Daily Life Stories')

@section('content')

<article class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- HEADER: Center Aligned --}}
            <div class="text-center mb-5">
                <span class="category-badge mb-3 d-inline-block" style="color: {{ $story->category->color }}; border-color: {{ $story->category->color }}">
                    {{ $story->category->name }}
                </span>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">{{ $story->title }}</h1>

                <div class="d-flex justify-content-center align-items-center text-muted small text-uppercase tracking-widest">
                    <span>{{ $story->created_at->format('F d, Y') }}</span>
                    <span class="mx-3">&bull;</span>
                    <span>{{ $story->views }} pembaca</span>
                </div>
            </div>

            {{-- FEATURED IMAGE: Full Width Rounded --}}
            <div class="mb-5">
                <img src="{{ asset('images/stories/' . $story->featured_image) }}"
                     class="img-fluid rounded-4 shadow-sm w-100"
                     style="max-height: 550px; object-fit: cover;"
                     alt="{{ $story->title }}">
                @if($story->image_caption) {{-- Opsional jika kamu punya field caption --}}
                    <p class="text-center text-muted mt-3 small fst-italic">{{ $story->image_caption }}</p>
                @endif
            </div>

            {{-- CONTENT SECTION --}}
            <div class="story-wrapper">
                {{-- EXCERPT: Sebagai intro yang lebih besar --}}
                <p class="lead mb-5 fw-medium text-dark" style="font-size: 1.4rem; line-height: 1.8; font-family: 'Inter', sans-serif; opacity: 0.8;">
                    {{ $story->excerpt }}
                </p>

                {{-- MAIN CONTENT --}}
                <div class="story-content mb-5" style="font-size: 1.15rem; line-height: 2; color: #333;">
                    {!! nl2br(e($story->content)) !!}
                </div>
            </div>
            <hr class="my-5">

            {{-- List Komentar --}}
            <div class="comments-section">
                <h5 class="fw-bold mb-4">Komentar ({{ $story->comments ? $story->comments->count() : 0 }})</h5>

                @foreach($story->comments as $comment)
                <div class="mb-3 d-flex">
                    <div class="flex-grow-1 border-bottom pb-3">
                        <span class="fw-bold small">{{ $comment->user->name }}</span>
                        <span class="text-muted small ms-2">{{ $comment->created_at->diffForHumans() }}</span>
                        <p class="mt-2 small text-secondary">{{ $comment->body }}</p>
                    </div>
                </div>
                @endforeach

                {{-- Form Tambah Komentar --}}
                @auth
                <form action="{{ route('comments.store', $story->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <textarea name="body" class="form-control bg-light border-0" rows="3" placeholder="Tulis komentar kamu..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm px-4">Kirim Komentar</button>
                </form>
                @else
                <p class="small text-muted mt-4">Silahkan <a href="{{ route('login') }}">login</a> untuk ikut berkomentar.</p>
                @endauth
            </div>
            {{-- tombol like --}}
            <div class="d-flex align-items-center mb-4">
                <button id="btn-like" data-id="{{ $story->id }}" class="btn border-0 p-0 me-2" style="background: none; outline: none shadow: none;">
                    @auth
                        @if($story->isLikedBy(auth()->user()))
                            <i id="like-icon" class="bi bi-heart-fill text-danger fs-4"></i>
                        @else
                            <i id="like-icon" class="bi bi-heart fs-4 text-secondary"></i>
                        @endif
                    @else
                        <i class="bi bi-heart fs-4 text-secondary"></i>
                    @endauth
                </button>
                <span id="like-count" class="fw-bold small text-muted">
                    {{ $story->likes()->count() }} orang menyukai ini
                </span>
            </div>
            {{-- TAGS: Minimalist style --}}
            @if($story->tags->count() > 0)
            <div class="mt-5 pt-4 border-top">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span class="text-muted small me-2 text-uppercase">Topik:</span>
                    @foreach($story->tags as $tag)
                        <span class="badge rounded-pill bg-light text-dark px-3 py-2 border">#{{ $tag->tag }}</span>
                    @endforeach
                </div>
            </div>
            @endif

           {{-- SHARE & ACTIONS --}}
           <div class="d-flex justify-content-between align-items-center border-top border-bottom py-4 my-5">
               <div>
                   <span class="small text-muted text-uppercase d-block mb-3 tracking-widest" style="font-size: 0.7rem;">Bagikan cerita:</span>
                   <div class="share-links d-flex gap-4">
                      {{-- WhatsApp --}}
                      <a href="https://wa.me/?text={{ $story->title }} {{ url()->current() }}"
                         target="_blank" class="share-icon-link" title="Share ke WhatsApp">
                          <i class="bi bi-whatsapp"></i>
                      </a>

                      {{-- Pinterest (Sangat cocok untuk web estetik seperti ini) --}}
                      <a href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}&media={{ asset('images/stories/' . $story->featured_image) }}&description={{ $story->title }}"
                         target="_blank" class="share-icon-link" title="Save to Pinterest">
                         <i class="bi bi-pinterest"></i>
                      </a>

                     {{-- Instagram (Instagram tidak punya direct share link, biasanya diarahkan ke profil atau copy link) --}}
                     <a href="https://www.instagram.com/"
                        target="_blank" class="share-icon-link" title="Follow us on Instagram">
                        <i class="bi bi-instagram"></i>
                     </a>

                     {{-- Tambahan: Copy Link (Sangat berguna) --}}
                     <a href="javascript:void(0)" onclick="copyToClipboard()" class="share-icon-link" title="Salin Tautan">
                        <i class="bi bi-link-45deg"></i>
                     </a>
               </div>
           </div>

           <a href="{{ route('home') }}" class="btn-read-more">
              &larr; Kembali ke Home
           </a>
       </div>

       {{-- SCRIPT COPY LINK --}}
       <script>
       function copyToClipboard() {
          navigator.clipboard.writeText(window.location.href);
          alert("Tautan berhasil disalin!");
       }
       </script>

       <style>
        .share-icon-link {
            color: #6c757d; /* Warna abu-abu default */
            font-size: 1.4rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .share-icon-link:hover {
            transform: translateY(-3px);
        }

        /* Warna khusus saat hover sesuai brand */
        .share-icon-link:hover .bi-whatsapp { color: #25D366; }
        .share-icon-link:hover .bi-pinterest { color: #E60023; }
        .share-icon-link:hover .bi-instagram { color: #E4405F; }
        .share-icon-link:hover .bi-link-45deg { color: var(--primary-color); }

        .tracking-widest {
            letter-spacing: 0.2em;
        }
    </style>
    {{-- RELATED STORIES: Dibuat lebih ringkas --}}
    @if($relatedStories->count() > 0)
    <div class="related-section pt-5 mt-5">
        <h4 class="text-center mb-5" style="font-family: 'Playfair Display', serif;">Cerita Lainnya yang Mungkin Kamu Suka</h4>
        <div class="row g-4">
            @foreach($relatedStories as $related)
            <div class="col-md-4">
                <article class="card h-100 border-0 bg-transparent">
                    <a href="{{ route('story.show', $related->slug) }}" class="rounded-4 overflow-hidden mb-3 d-block">
                        <img src="{{ asset('images/stories/' . $related->featured_image) }}"
                             class="card-img-top" alt="{{ $related->title }}" style="height: 200px; object-fit: cover;">
                    </a>
                    <div class="card-body p-0">
                        <h6 class="fw-bold mb-2">
                            <a href="{{ route('story.show', $related->slug) }}" class="text-decoration-none text-dark">{{ $related->title }}</a>
                        </h6>
                        <p class="small text-muted">{{ Str::limit($related->excerpt, 70) }}</p>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</article>

<style>
    /* Styling khusus agar artikel nyaman dibaca */
    .story-content p {
        margin-bottom: 2rem;
    }
    .tracking-widest {
        letter-spacing: 0.15em;
    }
    /* Dropcap (Huruf pertama besar) - Opsional untuk gaya majalah */
    .story-content::first-letter {
        float: left;
        font-size: 4.5rem;
        line-height: 1;
        font-family: 'Playfair Display', serif;
        margin-right: 0.75rem;
        color: var(--primary-color);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const likeBtn = document.getElementById('btn-like');
    const likeIcon = document.getElementById('like-icon');
    const likeCount = document.getElementById('like-count');

    if (likeBtn) {
        likeBtn.addEventListener('click', function (e) {
            e.preventDefault();

            const storyId = this.getAttribute('data-id');

            // Kirim permintaan ke server menggunakan Fetch API
            fetch(`/story/${storyId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF Token wajib untuk keamanan Laravel
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.status === 401) {
                    // Jika user belum login, arahkan ke halaman login
                    window.location.href = '{{ route("login") }}';
                    return;
                }
                return response.json();
            })
            .then(data => {
                if (data) {
                    // 1. Update Ikon (Toggle Class)
                    if (data.isLiked) {
                        likeIcon.classList.replace('bi-heart', 'bi-heart-fill');
                        likeIcon.classList.add('text-danger');
                        likeIcon.classList.remove('text-secondary');
                    } else {
                        likeIcon.classList.replace('bi-heart-fill', 'bi-heart');
                        likeIcon.classList.remove('text-danger');
                        likeIcon.classList.add('text-secondary');
                    }

                    // 2. Update Angka Like secara dinamis
                    likeCount.innerText = `${data.count} orang menyukai ini`;
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
</script>

@endsection
