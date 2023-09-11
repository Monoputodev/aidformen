<div id="oc-fullslider" class="banner owl-carousel">
	@if(count($slider)>0)
	@foreach($slider as $slider_data)
    <div class="owl-slide">
       <div class="item">
           <img src="{{ URL::to('uploads/slider') }}/{{ $slider_data->image_link }}" alt="Slider" style="max-height: 500px;">
       </div>  
   </div>
   @endforeach
   @endif
</div>

<div class="clearfix"></div>