@extends('index')
@section('header')
    {!! AcrFile::css() !!}
@stop
@section('acr_index')

    <div class="container" style="width: 100%;">
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-9863574640622060"
             data-ad-slot="7704625701"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div class="col-md-7">
            <div class="alert alert-info">Fotoğrafları <strong>"Dosyaları Seç"</strong> butonundan seçin ve yükleme işlemini bitirin ardından <strong>"Arşivle ve İndir" </strong> butonuna basarak bilgisayarrınıza kaydedin.</div>
            <!-- e-okul-resim -->

            <a href="/acr/eoimg/arsivle/indir?acr_file_id={{$acr_file_id}}" style="float: right" class="btn btn-warning btn-lg">Arşivle ve İndir</a>
            <div style="margin-left: auto; margin-right: auto;"> {!! AcrFile::form() !!}</div>
        </div>
        <div class="col-md-5">
            <!-- e-okul-sağ -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:600px"
                 data-ad-client="ca-pub-9863574640622060"
                 data-ad-slot="1771317334"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
@stop
@section('footer')
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    {!! AcrFile::js($acr_file_id,0,1) !!}
@stop