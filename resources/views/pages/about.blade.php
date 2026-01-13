@extends('layouts.main')

@section('title', 'About - Daily Life Stories')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h1 class="display-4 fw-bold text-center mb-5">About Daily Life Stories</h1>

            <div class="card shadow-sm mb-5">
                <div class="card-body p-5">
                    <p style="font-size: 1.1rem; line-height: 1.9;">
                        Welcome to <strong>Daily Life Stories</strong> – a space where everyday moments 
                        become meaningful narratives. We believe that life's most beautiful stories are 
                        found in the ordinary: a perfect cup of morning coffee, a heartfelt conversation 
                        with a friend, the small victories of parenthood, and the joy of trying something new.
                    </p>

                    <p style="font-size: 1.1rem; line-height: 1.9;">
                        This blog is a celebration of the real, the raw, and the relatable. Whether you're 
                        here for lifestyle inspiration, parenting tips, travel stories, or just a reminder 
                        that you're not alone in this beautiful chaos called life – you're in the right place.
                    </p>

                    <p style="font-size: 1.1rem; line-height: 1.9;">
                        Our stories cover topics like:
                    </p>

                    <ul style="font-size: 1.1rem; line-height: 1.9;">
                        <li><strong>Lifestyle:</strong> Daily routines, self-care, and finding balance</li>
                        <li><strong>Fashion:</strong> Personal style and wardrobe inspiration</li>
                        <li><strong>Food:</strong> Recipes, cooking adventures, and food experiences</li>
                        <li><strong>Parenting:</strong> The joys and challenges of raising kids</li>
                        <li><strong>Travel:</strong> Adventures near and far</li>
                        <li><strong>Relationships:</strong> Love, friendship, and connection</li>
                        <li><strong>Culture:</strong> Books, art, and the things that inspire us</li>
                    </ul>

                    <p style="font-size: 1.1rem; line-height: 1.9;">
                        Thank you for being here and for sharing in these stories. We hope you find 
                        inspiration, comfort, and maybe even a few laughs along the way.
                    </p>

                    <p class="text-center mt-5">
                        <strong>With love,<br>The Daily Life Stories Team</strong>
                    </p>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                    Explore Our Stories →
                </a>
            </div>

        </div>
    </div>
</div>

@endsection