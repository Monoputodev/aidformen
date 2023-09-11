<h2 class="section-heading center">
    Our <span>Networks and Partners</span>
</h2>
<div id="partner-slider" class="partner owl-carousel">

    <style>
        .partner-img {
            margin: 0px auto;
        }
    </style>
    @if(count($partner)>0)
    @foreach($partner as $partner_data)
    <div class="partner">
        <div class="item">
            <img src="{{ URL::to('uploads/partner') }}/{{ $partner_data->image_link }}" alt="partner"
              class="partner-img">
        </div>
    </div>
    @endforeach
    @endif
</div>

<div class="clearfix"></div>