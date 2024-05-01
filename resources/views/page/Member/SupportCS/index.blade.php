@extends('layouts.kerangkaAdmin')

@section('content')
    <section class="section">
        <div class="section-header justify-content-center">
            <h1>Support CS</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card card-large-icons" style="width: 100%">
                        <div class="card-icon bg-success text-white">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="card-body">
                            <h4>WhatsApp</h4>
                            <p>Hubungi CS melalui kontak WhatsApp berikut: (0853 5323 5600)</p>
                            <a href="https://api.whatsapp.com/send?phone=6285353235600" target="_blank" class="card-cta">Hubungi <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons" style="width: 100%">
                        <div class="card-icon bg-danger text-white">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="card-body">
                            <h4>Email</h4>
                            <p>Hubungi CS melalui alamat Email berikut: (klikost.cs@gmail.com)</p>
                            <a href="mailto:klikost.cs@gmail.com" class="card-cta">Hubungi <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
