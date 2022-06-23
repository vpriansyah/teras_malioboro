@include('pedagang.partials.navbar')
@section('content')
    @extends('pedagang.layouts.footer')

    <section id="pilihan" class="overview-block-ptb grey-bg iq-blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-title">
                        <h2 class="">Saran Aduan</h2>
                        <hr class="mx-auto" style="width: 20%">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
                        data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1"
                        data-items-mobile-sm="1" data-margin="30">
                        @foreach ($saran as $s)
                            <div class="item">
                                <div class="iq-blog-box">
                                    <div class="iq-blog-detail">
                                        <div class="blog-title">
                                            <h5 class="iq-tw-6 iq-mb-10"></h5>
                                        </div>
                                        <div class="blog-content">
                                            <p><b>{{ $s->nama }}</b></p>
                                        </div>
                                        <div class="iq-blog-meta">
                                            <div class="blog-title">
                                                <h7 class="iq-tw-6 iq-mb-10">Kartegori</h7>
                                            </div>
                                            <p>{{ $s->id_kategori }}</p>
                                        </div>
                                        <div class="iq-blog-meta">
                                            <div class="blog-title">
                                                <h7>Saran dan Aduan</h7>
                                            </div>
                                            <p class="iq-tw-6 iq-mb-10">{{ $s->saran_aduan }}</p>
                                        </div>
                                        <div class="">
                                            <center><button class="btn btn-success" data-toggle="modal"
                                                    data-target="#feedback">Feedback</button></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="Feedback">Feedback</label>
                            <textarea type="text" style="width: 100%"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
